<?php
/**
 * 路由解析类
 */

namespace pig;


class Route
{
    protected $route = [];
    //public $route = [];

    protected $pathInfo = [];
    //public $pathInfo = [];

    protected $params = [];
    //public $params = [];

    public function __construct($route)
    {
        $this->route = $route;
    }

    //路由解析
    public function parse($queryStr = '')
    {
        //第一步：将查询字符串前后的'/'去掉，然后再按分隔符'/'拆分到数组中
        //统一处理变为小写，处理简洁
        $queryStr = trim(strtolower($queryStr),'/');
        //把字符串打散为数组
        $queryArr = explode('/',$queryStr);

        //第二步：解析出$queryStr中的内容：（模块，控制器，操作，参数）
        switch (count($queryArr))
        {
            //模块，控制器，操作，参数
            //没有参数，则使用默认的模块、控制器、操作
            case 0:
                $this->pathInfo = $this->route;
                break;
                //有一个参数，第一个参数使用自定义，后两个默认
            case 1:
                $this->pathInfo['module'] = $queryArr[0];
                break;
            //二个参数,模块和控制器自定义,操作默认
            case 2:
                $this->pathInfo['module'] = $queryArr[0];
                $this->pathInfo['controller'] = $queryArr[1];
                break;
            //三个参数, 模块/控制器/操作全部自定义
            case 3:
                $this->pathInfo['module'] = $queryArr[0];
                $this->pathInfo['controller'] = $queryArr[1];
                $this->pathInfo['action'] = $queryArr[2];
                break;
            //默认情况，对参数进行处理
            default:
                $this->pathInfo['module'] = $queryArr[0];
                $this->pathInfo['controller'] = $queryArr[1];
                $this->pathInfo['action'] = $queryArr[2];

                //从pathInfo数组的索引3开始，将剩余的参数全部当作参数处理
                $arr = array_slice($queryArr,3);
                //键值对必须成对出现,所以每次必须递增2
                for($i=0;$i < count($arr); $i+=2)
                {
                    //如果没有第二个参数,则放弃,确保键值一一对应
                    if(isset($arr[$i+1]))
                    {
                        $this->params[$arr[$i]] = $arr[$i+1];
                    }
                }
                break;
        }
                //返回当前路由实例对象,这样就可以实现链式调用,即直接用->调用另一方法,省去重复写对象
                return $this;

    }

    //请求分发
    public function dispatch()
    {
        //生成的带有命名空间的控制器类名称：app\模块\controller\控制器类
        //类名称应该与类文件所在的绝对路径一一对应，这样才可以实现自动映射，方便自动加载
        //模块名称
        $module = $this->pathInfo['module'];
        //控制器名称
        $controller = 'app\\'.$module.'\controller\\'.ucfirst($this->pathInfo['controller']);
        //操作名
        $action = $this->pathInfo['action'];

        //判断当前类中是否存在指定的操作,如果没有,就执行默认的操作方法
        if(!method_exists($controller,$action))
        {
            $action = $this->route['action'];
            echo $action;
        }

        //将用户的请求分发到指定的控制器和对应的操作方法上
        call_user_func_array([new $controller,$action],$this->params);
    }

    //获取pathinfo
    public function getPathInfo()
    {
        return $this->pathInfo;
    }
    //获取模块
    public function getModule()
    {
        return $this->pathInfo['module']?:$this->route['module'];
    }
    //获取控制器名称
    public function getController()
    {
        return 'app\\'.$this->getModule().'\controller\\'.ucfirst($this->pathInfo['controller']);
    }   
}

$queryStr = $_SERVER['QUERY_STRING'];
$config = require __DIR__.'/config.php';
$route = new Route($config['route']);
$route->parse($queryStr);
//echo '<pre>'.print_r($route->pathInfo,true).'</pre>';
//echo '<pre>'.print_r($route->params,true).'</pre>';

//加载类文件
require __DIR__.'/../app/admin/controller/Index.php';
//必须先解析，再分发
$route->dispatch();