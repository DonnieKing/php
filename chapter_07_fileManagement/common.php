<?php
/**
 * 公共提示信息
 */

function alertMes($mes,$url)
{
    //创建成功后不能直接刷新页面，会一直提交表单进入死循环状态
    echo "<script>alert('{$mes}');location.href='{$url}'</script>";
}