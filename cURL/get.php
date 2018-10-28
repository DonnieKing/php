<?php
 //cURL 是一种功能强大的库，它可以模拟浏览器来
//传输数据，可用来编写网页爬虫，可动态获取各种
//接口数据。比如天气、航班、笑话等等。几乎所有
//网络上的资源都可以用 cURL 访问和获取。

//PHP cURL 使用步骤
// 初始化cURL：curl_init()
// 设置传输选项：curl_setopt()
// 执行并获取结果：curl_exec()
// 关闭cURL：curl_close()

 $ch = curl_init();
 $url="http://www.baidu.com";

    // CURLOPT_URL   设置请求URL地址
    curl_setopt($ch,CURLOPT_URL,$url);  //向服务器发送请求 curl_setopt()   设置传输选项

    echo curl_exec($ch);   //接收服务器发送数据    curl_exec()          执行并获取结果
    curl_close();


?>