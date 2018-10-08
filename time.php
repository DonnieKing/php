<?php
    $pagestartime=microtime();

    header("content-type:text/html;charset=utf-8");
    error_reporting(E_ALL & ~E_NOTICE);  //表示提示除去 E_NOTICE 之外的所有错误信息
    //time()返回当前时间的unix时间戳
    echo "创建日期是：".date("Y-m-d h:i:sa", time())."<br>";
    //mktime()返回指定时间的unix时间戳，有参数
    echo "创建的日期是：".date("y-m-d h:i:sa",mktime(k1,55,33,10,2,2019))."<br>";

        //PHP strtotime() 函数用于把人类可读的字符串转换为 Unix 时间
    $d = strtotime(tomorrow);
    echo date("y-m-d h-i-sa",$d)."<br>";
    $m = strtotime("+10 months");
    echo date("y-m-d h-i-sa",$m)."<br>";
    $a = strtotime("next saturday");
    echo date("y-m-d h-i-sa",$a)."<br>";

    $b = strtotime("1 January 2019 ");
    $c = time();
    $sub = ceil(($b-$c)/60/60/24);
    echo "距离2019.1.1还有".$sub."天"."<br>";

    echo microtime()."<br>";
    $pageendtime = microtime();  //返回当前 Unix 时间戳的微秒数：
    $starttime = explode(" ", $pagestartime); //explode() 函数把字符串打散为数组;第1个为执行时间，第二个为unix时间戳
    echo time()."<br>";
    $endtime = explode(" ",$pageendtime);
    $totaltime = $endtime[0]-$starttime[0]+$endtime[1]-$starttime[1];
    $timecost = sprintf("%s",$totaltime);
    echo "页面运行时间：".$timecost;
?>