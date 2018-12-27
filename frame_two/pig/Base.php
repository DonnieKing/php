<?php
/**
 * 框架基础类：
 * 1、调试模式
 * 2、自动加载
 * 3.启动框架
 */

namespace pig;



class Base
{
    protected $config = [];

    protected $queryStr = '';

    public function __construct($config,$queryStr='')
    {
        $this->config = $config;
        $this->queryStr = $queryStr;
    }

    //设置调试模式
    public function setDebug()
    {
        if($this->config['app']['debug'])
        {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        }
        else
        {
            ini_set('display_errors','Off');
            ini_set('log_errors','On');
        }
    }

    //自动加载
    public function loader($class)
    {
        // app\admin\controller\Stu      app/admin/controller/Stu.php
        //new Stu()
        // $class = app\admin\controller\Stu
        //  /app/admin/controller/Stu.php
        $path = ROOT_PATH.str_replace('\\','/',$class).'.php';

        //如果没有指定的控制器类文件,则默认回到首页
        if(!file_exists($path))
        {
            header('Location: /');
        }

        require $path;
    }

    //启动框架
    Public function run()
    {
        //设置调试模式
        $this->setDebug();

        //自动加载
        spl_autoload_register([$this,'loader']);

        //请求分发
        (new Route($this->config['route']))->parse($this->queryStr)->dispatch();
    }
}

