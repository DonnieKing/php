<?php
/**
 * 数组函数_数组与变量,字符串之间的转换
 * 1.list($var1,$val2...)
 * 2.extract($arr, $flag)
 * 3.compact(str1,str2...)
 * 4.explode($delimiter, $string, $limit)
 * 5.implode($glue, $arr)
 */

/**
 * 一、list($var1, $var2...) = $arr
 * 其实list()并不是数组函数,而是一个左值的语法结构,也echo 类似
 * 1. 功能: 将索引数组中的元素与指定变量进行绑定
 * 2. 功能: 变量名列表
 * 3. 返回: 与数组元素值对应的独立变量
 * 4. 场景: 将索引数组的内容转为独立变量
 * 5. 注意: 必须是索引数组,关联内容无效
 */
list($name,$school,$education) = ['小龙女','清华大学','博士'];
echo $name.'在'.$school.'上学'.',她的学历是'.$education.'<br>';
echo "{$name}的学校是{$school}，她正在读{$education} <hr>";

/**
 * 二、extract($arr,$flag)
 * 1.功能: 将关联数组转为变量
 * 2.参数: $arr(必),$flag(选)
 *
 * 2.参数: $arr(必),$flag常量参数(选),很多,要查手册,例如:EXTR_SKIP:冲突跳过
 *      EXTR_OVERWRITE: 如果有冲突，覆盖已有的变量,这是默认值;
 *      EXTR_SKIP: 如果有冲突，不覆盖已有的变量;
 *      EXTR_PREFIX_SAME: 如果有冲突，在变量名前加上前缀 prefix;
 *      EXTR_PREFIX_ALL: 给所有变量名加上前缀 prefix;
 *      EXTR_PREFIX_INVALID: 仅在非法／数字的变量名前加上前缀 prefix;
 *      EXTR_IF_EXISTS: 仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。
 *      举个例子，以下情况非常有用：定义一些有效变量，然后从 $_REQUEST 中仅导入这些已定义的变量。
 *      EXTR_PREFIX_IF_EXISTS: 仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
 *
 * 3.返回: 返回变量数量, 同时会生成与数组元素对应的变量,键名转为变量名,值为变量值
 * 4.场景: 不要对不信任的数据进行转换,例如$_POST / $_GET...用户提交数据
 */
$arr1=['id'=>'10','name'=>'杨过','sex'=>'male','salary'=>8800];
// var_export(extract($arr1));  //打印出来是4
//echo  var_export(extract($arr1),true);//打印出来也是4
extract($arr1);
echo $name.'的id是'.$id.'，他是'.$sex.',他的工资是'.$salary.'<hr>';

/**
 * 三、compact(str1,str2...)
 * 1.功能: 将变量转为数组,与extract()相反
 * 2.参数: (1)用一个或多个字符串代表变量名, (2)可以使用数组包装变量名来简化
 * 3.返回: 由变量组成的关联数组
 * 4.场景: 组装多个零散变量统一处理,例如做为一条完整记录并存储到数据库中
 */
 $name='王楚';
 $position='人生巅峰';
 $faction='中北';
 $array = compact('name','position','faction');
 echo '<pre>'.var_export($array,true).'<br>';
//推荐的简化方案: 将多个变量名打包到一个索引数组中统一发送给函数处理
$varName = ['name','faction','position'];
echo var_export(compact($varName),true), '<hr>';


/**
 * 四、explode($delimiter, $string,$limit)
 * 1.功能:将规则字符串转为数组(用一个字符串来分割另一个字符串)
 * 2.参数:$delimiter 分割字符串(必),$string被分割的字符串(必),$limit(选)返回数组元素数量
 * 3.返回:由被分割后的字符串组成的数组
 * 4.场景:大多用于人为创建一些有规律的字符串的处理,例如文件路径,邮箱,姓名等
 */
$lang = 'html,css,javascript,jquery,php,mysql';
//echo explode(',',$lang); //echo 只能打印字符串和整型  var_export() — 输出或返回一个变量的字符串表示。
echo  var_export(explode(',',$lang),true).'<br>';
//限制返回的数组元素的数量,剩下的内容全部放在最后一个元素中
echo  var_export(explode(',',$lang,4),true).'<br>';
//limit为负数,则从被生成的数组尾部删除,-2,则删除2个,其实负数是我们用得最多的场景
echo  var_export(explode(',',$lang,-2),true).'<hr>';

/**
 * 五、implode($glue, $arr)
 * 1. 功能: 将数组转为字符串 (用胶水字符$glue)
 * 2. 参数: $glue(可选),$arr(必)
 * 3. 返回: 字符串
 * 4. 场景:
 * var_export() — 输出或返回一个变量的字符串表示。
 */
$arr = ['首页','公司新闻','公司产品','联系我们'];
echo var_export(implode('|',$arr),true).'<br>';
//添加a标签,转为导航
echo var_export(
    '<a href="#">'.implode('</a>|<a href="#">',$arr).'</a>',
    true).'<hr>';

//生成一条sql添加语句: 'INSERT INTO 表名 (字段列表) VALUES (值列表)';
//1.先将要添加的记录以 关联数组的方式提供
$staff=['name'=>'DonnieKing','sex'=>'male','age'=>20,'salary'=>10000];

//2.生成语句
$sql = 'INSERT INTO staff';

//3.生成sql语句中的字段列表
 $fields = implode("`,`",array_keys($staff));
// echo $fields;
 $sql .= '(`'.$fields.'`)';
// echo $sql;
//4.生成sql语句的值列表部分
 $value = implode("','",array_values($staff));
 $sql .= " VALUES ('".$value."');";

//4.查看生成的sql语句
//INSERT INTO staff(`name`,`sex`,`age`,`salary`) VALUES ('DonnieKing','male','20','10000')
echo $sql, '<hr>';


