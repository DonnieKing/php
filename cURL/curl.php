<?php

    $key = "5f9024fae08b52ffd59d41fbf64419e6";

    $historyUrl = "http://api.juheapi.com/japi/toh?key={$key}&v=1.0&month=10&day=28";

    $historyJson = https_request($historyUrl);  //封装 https 请求( GET/POST )

    $historyArr = json_decode($historyJson,true);

    echo "<pre>";
     print_r($historyArr['result']);    //如果结果存在result下的data中，如下：print_r($jokeArr['result']['data']);
    echo "</pre>";

//封装 https 请求( GET/POST )
    function https_request($url,$data=null)
    {
        $ch = curl_init();

        //设置传输选项
        curl_setopt($ch,CURLOPT_URL,$url);//设置请求URL

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//以文件流的形式返回

        if(!empty($data))
        {
            curl_setopt($ch,CURLOPT_POST,1);//模拟POST请求
            curl_setopt($ch,CURKOPT_POSTFIELDS,$data);//设置POST提交的数据
        }

        //执行请求并返回结果
        $outopt = curl_exec($ch);

        //关闭curl
        curl_close($ch);

        return $outopt;

    }



?>