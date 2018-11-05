<?php
/**
 * 字符串中的html标签过滤与转换
 * 1. nl2br():在换行符\n前插入html换行标记<br>
 * 2. htmlspecialchars(),将代码中的单双号号,&符与<和>转为html实体字符,不解析
 *    反操作: htmlspecialchars_decode(): 与htmlspecailchars()功能相反,将实体字符进行解析还原
 * 3. htmlentities(): 将所有的html标记全部转实体,包括了htmlspecailchars中的标记,功能更强大
 *    反操作: html_entity_decode()
 * 4. strip_tags(): 过滤掉所有的html或php标记,可以设置允许保留的标记,很实用
 */

//1. nl2br()  在换行符\n前插入html换行标记<br>
$str1 = "2018年世界杯 \n 中国除了足球队没有去,其它的都去了";
echo $str1.'<br>';     //没有出现预想中的换行,因为浏览器将\n解析为一个空格
//如果想让\n产生换行的效果,可以在前面加上一个<br>标签
echo nl2br($str1).'<hr>';

//2.htmlspecialchars()  和反操作: htmlspecialchars_decode()
$str2 = '<h3>他是\'一个&nbsp;&nbsp;有"故事"的人 </h3>';
//不转义输出
echo $str2.'<br>';
//转义输出
echo htmlspecialchars($str2).'<br>';
echo '<hr>';
$str =  "&lt;h3&gt;他是'一个&amp;nbsp;&amp;nbsp;有&quot;故事&quot;的人 &lt;/h3&gt;<br>";
//转义输出
echo htmlspecialchars_decode($str);


//3. htmlentities() 和 反操作:html_entity_decode()
$str4 = "<p>中美&贸\$易战,'中国'必胜</p>";
//echo $str4.'<br>';
echo htmlentities($str4);
$str='&lt;p&gt;中美&amp;贸$易战,\'中国\'必胜&lt;/p&gt; ';
echo html_entity_decode($str);


//4.strip_tags()很实用的一个函数
$str = '<p>php是世界上<span style="background: red;font-size: 30px;">最好的</span>编程语言！</p>';
echo $str.'<br>';
//过滤掉所有的html标签
echo strip_tags($str).'<hr>';
//保留span标签
echo strip_tags($str,'<span>');


