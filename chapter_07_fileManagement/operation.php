<?php
/**
 * 操作配置
 */
include "common.php ";

if($act == '创建文件')
{
//    var_dump($filename);
    $mes = create_file($path."/".$filename);
    alertMes($mes,$url);
}

// 判断点击操作(查看)
else if($act == 'showContent')
{
    //查询文件内容
    $content = read_file($filename);
    // 判断文件是否有内容
    if(strlen($content)) {
        // 给字符串添加高亮
        $newContent = highlight_string($content, true);
        //制作显示表格
        $str = <<<HERE
    <table width="100%" bgcolor="#ffc0cb" cellpadding="5" cellspacing="0">
    <tr>   
    <td>{$newContent}</td>
    </tr>    
</table>
HERE;

        echo $str;
    }
    else
    {
        alertMes('文件为空，请编辑后查看',$url);
    }
}

// 判断点击操作（修改）
else if($act == 'editContent')
{
    //获取文件内容
    $content = file_get_contents($filename);
    //var_dump($filename);可以接收到D:\wamp64\www\php\chapter_07_fileManagement\operation.php:45:string 'file/11.txt'
    //input里面写filename，提交到确认修改。 否则确认修改接收不到$filename
    $str = <<<HERE
<form action="index.php?act=doEdit" method="post"> 
<textarea cols=180 rows=10 name="content">{$content}</textarea>
<input type="hidden" name="filename" value="$filename"> 
<input type="submit" value="提交">
</form>
HERE;
    echo $str;
}
else if($act == 'doEdit')
{
     $content = $_REQUEST['content'];
     $filename = $_REQUEST['filename'];
     var_dump($filename);
     //进行修改并判断
    if(file_put_contents($filename,$content))
    {
        $mes = '文件修改成功';
    }
    else
    {
        $mes = '文件修改失败';
    }
    alertMes($mes,$url);
}

// 判断点击操作（重命名）
else if($act=='renameFile')
{
    $str = <<<HERE
<form action="index.php?act=doRename" method="post">
请输入要修改的名字：<input type="text" name="rename" placeholder="请输入文件名">
<input type="hidden" name="filename" value="$filename">
<input type="submit" value="提交">
</form>
HERE;
    echo $str;
}
else if($act == 'doRename')
{
    $rename = $_REQUEST['rename'];
    $mes = rename_file($filename,$path."/".$rename);
    alertMes($mes,$url);


}