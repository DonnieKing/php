<?php
//封装创建文件方法和删除文件方法

/**
   * PHP的 file_exists = is_dir + is_file
    它既可以判断文件是否存在，又可以判断目录是否存在。但这样一个全面的函数执行效率非常低，所以结论是：
    如果要判断目录是否存在，请用独立函数 is_dir(directory)
    如果要判断文件是否存在，请用独立函数 is_file(filepath)
    is_file 只判断文件是否存在；
    file_exists 判断文件是否存在或者是目录是否存在；
    is_dir 判断目录是否存在；
    查看手册，虽然这两个函数的结果都会被缓存，但是is_file却快了N倍。
    还有一个值得注意的：
    文件存在的情况下，is_file比file_exists要快N倍；
    文件不存在的情况下，is_file比file_exists要慢；
 */

/**
 * 文件创建操作
 * @param $filename //需要创建的文件名
 * @rerurn string  //提示信息
 */
function create_file($filename)
{
    //检查文件是否存在，不存在则创建
    if(file_exists($filename))
    {
        return '文件已存在';
    }
    //检查目录是否存在，不存在则创建
    if(!file_exists(dirname($filename)))
    {
        mkdir(dirname($filename),0777,true);
    }
    //创建文件并判断
    if(touch($filename))
    {
        return '文件创建成功';
    }
    return '文件创建失败';
}
//var_dump(create_file('text6.txt'));
//var_dump(create_file('text/text.txt'));


/**
 * 文件删除操作
 * @param $filename //需要删除的文件名
 * @rerurn string 提示信息
 */
 function del_file($filename)
 {
     if(!file_exists($filename) && !is_writable($filename))
     {
         return '此文件不可删除';
     }
     if(unlink($filename))
     {
         return '文件删除成功';
     }
     return '文件删除失败！';
 }

//echo del_file('text');



/**
 * 文件复制操作
 * @param $filename //需要复制的文件名
 * @param $dest   // 目标目录或文件夹
 * @rerurn string 提示信息
 */
 function copy_file($filename,$dest)
 {
     //查询文件是否存在并查询是否可写
     if(!file_exists($filename) && !is_writable($filename))
     {
         return '此文件不可复制';
     }
     //查询目录是否存在
     if(!is_dir($dest))
     {
         mkdir($dest,0777,true);
     }
     //拼接要拷贝到的目录和文件名
     $destname = $dest . "/" . basename($filename);
     //查询目标目录是否有此文件
     if(file_exists($destname))
     {
         return '该目录下此文件已存在';
     }
     //查询并验证
     if(copy($filename,$destname))
     {
         return '文件复制成功';
     }
     return '文件复制失败';
 }

// echo copy_file('text6.txt','text1');


/**
 * 文件重命名操作
 * @param $oldname //需要重命名的文件名
 * @param $newname //目标文件名
 * @reurn string   //提示信息
 * // rename 修改文件名 还可以进行文件的剪切操作
 */
 function rename_file($oldname,$newname)
 {
     //查询文件是否存在并查询是否可写
     if(!file_exists($oldname) && !is_writable($oldname))
     {
         return '此文件不可重命名';
     }
     //获取当前文件的目录
     $path = dirname($oldname);
     //拼接重命名之后的路径以及文件名
     $destname = $path."/".$newname;
     //判断重命名的文件名是否存在
     if(file_exists($destname))
     {
         return '此文件名已存在';
     }
     //重命名操作并验证
     if(rename($oldname,$newname))
     {
         return '文件重命名成功';
     }
     return '文件重命名失败';
 }

// echo rename_file('text5.txt','text/text5.txt');



/**
 * 文件剪切操作
 * @param $filename  //需要剪切的文件
 * @param $dest      //目标目录
 * @return string    //提示信息
 * is_file — 判断给定文件名是否为一个正常的文件
 */
function cut_file($filename,$dest)
{
    //判断源文件是否为正常文件
    if(!is_file($filename))
    {
        return '此文件不可剪切';
    }
    //判断目标目录是否成功
    if(!is_dir($dest))
    {
        mkdir($dest,0777,true);
    }
    //拼接文件路径
    $destname = $dest."/".basename($filename);
    //检查目标目录下是否存在源文件同名文件
    if(is_file($destname))
    {
        return '该文件夹下已存在此文件';
    }
    //剪切操作并验证
    if(rename($filename,$destname))
    {
        return '文件剪切成功';
    }else{
        return '文件剪切失败';
    }
}
//echo cut_file('text6.txt','text1');

/**
 * 文件信息查询操作
 * @param $filename // 需要查询的文件名
 * @return array|string // 文件信息
 */
function get_file_info($filename)
{
    // 判断文件是否为正常文件并判断是否为可读文件
    if(!is_file($filename) && is_readable($filename))
    {
        return '该文件不可读取数据';
    }
    return[
        // 文件的类型查询
       'type'=>filetype($filename),
        // 文件的创建时间查询
        'ctime'=>date('Y-m-d H:i:s',filectime($filename)),
        // 文件最后的修改时间查询
        'mtime'=>date('Y-m-d H:i:s',filemtime($filename)),
        // 文件最后的访问时间查询
        'atime'=>date('Y-m-d H:i:s',fileatime($filename)),
        // 文件字节大小查询
        'size'=>trans_byte(filesize($filename))
    ];
}
//var_dump(get_file_info('text6.txt'));


/**
 * 字节转换操作
 * @param $byte // 字节大小
 * @param int $precision // 保留小数位
 * @return string
 */
function trans_byte($byte,$precision=2)
{
    $KB = 1024;
    $MB = 1024 * $KB;
    $GB = 1024 * $MB;
    $TB = 1024 * $GB;

    if($byte<$KB)
    {
        return $byte.'B';
    }else if($byte<$MB){
        return round($byte/$KB,$precision).'kB';
    }else if($byte<$GB){
        return round($byte/$MB,$precision).'MB';
    }else if($byte<$TB){
        return round($byte/$GB,$precision).'GB';
    }
}


/**
 * 文件内容读取操作
 * @param $filename // 需要读取的文件名
 * @return bool|string  // 文件内容|提示信息
 */
function read_file($filename)
{
    if(is_file($filename) && is_readable($filename))
    {
        return file_get_contents($filename);
    }
    return '该文件无法读取';
}
//echo read_file('text6.txt');



/**
 * 文件内容读取操作（数组形式返回）
 * @param $filename // 需要查询内容的文件名
 * @param bool $skip_empty_lines // 是否跳过空行
 * @return array|bool|string    文件内容|提示信息
 * 以行为单位
 * FILE_IGNORE_NEW_LINES  在数组每个元素的末尾不要添加换行符
 * FILE_SKIP_EMPTY_LINES  跳过空行

 */
function read_file_aray($filename,$skip_empty_lines=false)  //不跳过空行
{
    // 检查文件是否为正常文件并检查文件是否可读
    if(is_file($filename)  && is_readable($filename))
    {
        //判断是否跳过空行
        if($skip_empty_lines == true)
        {
            // 查询文件内容
            return file($filename,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
        }else{
            // 查询文件内容
            return file($filename);
        }

    }
    return '该文件无法读取';
}
//var_dump(read_file_aray('text6.txt'));


/**
 * 文件写入操作
 * @param $filename // 目标文件
 * @param $data // 写入的数据
 * @param bool $clear // 是否清空目标文件内容
 * @return string       提示信息
 */
function write_file($filename,$data,$clear=false)
{
    //获取目标目录
    $dirname = dirname($filename);
    if(!file_exists($dirname))
    {
        mkdir($dirname,0777,true);
    }
    //判断数据是否为数组或对象
    if(is_array($data) || is_object($data))
    {
        $data = serialize($data);
    }
    //判断是否清空源文件内容
    if($clear == false)
    {
        //判断目标文件是否为正常文件并是否可读
        if(is_file($filename) && is_readable($filename))
        {
            //判断目标文件是否有内容
            if(filesize($filename)>0)
            {
                //获取源文件内容
                $srcData = file_get_contents($filename);
                //拼接源文件内容
                $data = $srcData.$data;
            }
        }
    }
    //写入内容并判断
    if(file_put_contents($filename,$data))
    {
        return '文件写入成功';
    }
    return '文件写入失败';
}
$data = [
    'name'=>'DonnieKing',
    'age'=>21
];
//echo write_file('text6.txt',$data);



/**
 * 文件下载操作
 * @param $filename // 需要下载的文件名
 */
function dow_file($filename)
{
    //告诉浏览器返回文件的大小
    header('Accept-Length:'.filesize($filename));
    //告诉浏览器文件作为附件处理，并告诉浏览器下载完的文件名
    header('Content-Disposition:attachment;filename='.basename($filename));
    //输出文件
    readfile($filename);
    //不结束的话会将页面中的代码也读取出来
    exit();
}
//dow_file('123.jpg');




/**
 * 单文件上传操作
 * @param $fileInfo // 上传的文件信息
 * @param string $uploadPath // 上传的指定目录
 * @param array $allowExt // 上传的文件类型
 * @param int $maxSize // 上传文件最大值
 * @return string       提示信息
 */
function upload_file($fileInfo,$uploadPath='./upload',$allowExt=['jpg','png','jpeg','gif','txt','html'],$maxSize=1000000)
{
    // 判断上传错误号
    if($fileInfo['error'] === 0)
    {
        // 获取文件后缀
        $ext = strtolower(pathinfo($fileInfo['name'],PATHINFO_EXTENSION));
        // 判断文件类型
        if(!in_array($ext,$allowExt))
        {
            return '非法文件类型';
        }
        // 判断文件大小
        if($fileInfo['size']>$maxSize)
        {
            return '超出文件上传最大值';
        }
        // 判断文件上传方式
        //is_uploaded_file — 判断文件是否是通过 HTTP POST 上传的
        if(!is_uploaded_file($fileInfo['tmp_name']))
        {
            return '非法上传';
        }
        // 判断需要移动到的目录是否存在
        if(!is_dir($uploadPath))
        {
            mkdir($uploadPath,0777,true);
        }
        // 生成唯一的文件名 uniqid 生成唯一id  microtime 返回当前unix时间戳中的微秒
        $uniName = md5(uniqid(microtime(true),true)).".".$ext;
        // 拼接路径以及文件名
        $dest = $uploadPath."/".$uniName;
        //move_uploaded_file — 将上传的文件移动到新位置
        // 将文件移动到指定目录
        if(!move_uploaded_file($fileInfo['tmp_name'],$dest))
        {
            return '文件上传失败';
        }
        return '文件上传成功';
    }
    else
    {
        switch ($fileInfo['error'])
        {
            case 1:
                $res = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
                break;
            case 2:
                $res = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
                break;
            case 3:
                $res = '文件只有部分被上传';
                break;
            case 4:
                $res = '没有文件被上传';
                break;
            case 6:
                $res = '找不到临时文件夹';
                break;
            case 7:
                $res = '文件写入失败';
                break;
        }
        return $res;
    }
}


/*————————————————————————————————目录操作方法————————————————————————————*/

/**
 * 目录创建操作
 * @param $dirName // 需要创建的目录名称
 * @return string   提示信息
 */
function create_folder($dirName)
{
    //判断是否存在相同目录或文件
    if(file_exists($dirName))
    {
        return '存在相同文件';
    }
    //创建目录并判断
    if(mkdir($dirName,0777,true))
    {
        return '目录创建成功';
    }
    return '目录创建失败！';

}
//echo create_folder('html/css');


/**
 * 目录删除操作
 * @param $path // 需要删除的目录
 * @return string   提示信息
 */
function del_folder($path)
{
    //打开目录
    $dir = opendir($path);
    //循环读取目录中的内容
    while($item = readdir($dir))
    {
        // 判断.和.. 特别文件或目录
        if($item != "." && $item != "..")
        {
            // 判断是否为真正的文件
            if(is_file($path."/".$item))
            {
                // 删除文件操作
                unlink($path."/".$item);
            }
            // 判断是否为真正的目录
            if(is_dir($path."/".$item))
            {
                // 回调方法
                $func = __FUNCTION__;
                // 使用方法
                $func($path."/".$item);
            }
        }
    }
    //关闭目录
    closedir($dir);
    //删除目录
    rmdir($path);
    return '目录删除成功';
}
//echo del_folder('html');


/**
 * 目录复制操作
 * @param $src // 源目录
 * @param $dest // 目标目录
 * @return string 提示信息
 */
function copy_dir($src,$dest)
{
    //判断需要复制的目录下是否存在相同的目录或文件
    if(!file_exists($dest))
    {
        mkdir($dest,0777,true);
    }
    else
    {
        return '该目录下存在相同文件';
    }
    // 打开目录
    $dir = opendir($src);
    // 循环读取目录中的内容
    while($item = readdir($dir))
    {
        // 判断.和.. 特别文件或目录
        if($item != "." && $item != "..")
        {
            // 判断是否为真正的文件
            if(is_file($src."/".$item))
            {
                // 复制操作
                copy($src."/".$item,$dest."/".$item);
            }
            // 判断是否为真正的目录
            if(is_dir($src."/".$item))
            {
                // 回调方法
                $func = __FUNCTION__;
                // 使用方法
                $func($src."/".$item,$dest."/".$item);
            }
        }
    }
    // 关闭目录
    closedir($dir);
    return "目录复制成功！";
}
//echo copy_dir('text1','upload/text1');


/**
 * 目录重命名操作
 * @param $oldName // 源目录名
 * @param $newName // 新目录名
 * @return string   提示信息
 */
function rename_dir($oldName, $newName)
{
    if(!file_exists($newName))
    {
        if(rename($oldName,$newName))
        {
            return '重命名成功';
        }
        else
        {
            return '重命名失败';
        }
    }
    return "已经存在该文件或目录！";
}
//echo rename_dir('upload','newUpload');



/**
 * 目录剪切操作
 * @param $src // 源目录
 * @param $dest // 目标目录
 * @return string   提示信息
 */
function cut_dir($src,$dest)
{
    // 判断是否存在目标目录
    if(is_dir($dest))
    {
        // 拼接目标理解
        $dest = $dest."/".basename($src);
        // 判断目标目录下是否存在相同目录
        if(!file_exists($dest))
        {
            // 判断并剪切操作
            if(rename($src,$dest))
            {
                return '目录剪切成功';
            }
            else
            {
                return '目录剪切失败';
            }
        }
        else
        {
            return '该目录下已存在此文件';
        }
    }
    else
    {
        return '目标不是目录';
    }
}
//echo cut_dir('text','newUpload');


/**
 * 目录读取操作
 * @param $path // 读取的目录
 * @return array    数组|失败
 */
function read_dir($path)
{
    $arr = [];
    $dir = opendir($path);
    while($item = readdir($dir))
    {
        if($item != "." && $item != "..")
        {
            if(is_file($path."/".$item))
            {
                $arr['file'][] = $item;
            }
            if(is_dir($path."/".$item))
            {
                $arr['dir'][] = $item;
            }
        }
    }
    closedir($dir);
    return $arr;
}
//var_dump(read_dir('newUpload'));


/**
 * 目录大小查询操作
 * @param $path     // 需要查询大小的目录
 * @return int      // 目录的大小
 */
function dir_size($path)
{
    $sum = 0;
    global $sum;
    $dir = opendir($path);
    while($item = readdir($dir))
    {
        if($item != "." && $item != "..")
        {
            if(is_file($path."/".$item))
            {
                $sum += filesize($path."/".$item);
            }
            if(is_dir($path."/".$item))
            {
                $func = __FUNCTION__;
                $func($path."/".$item);
            }
        }
     }
     return $sum;
}
//echo trans_byte(dir_size('newUpload'));