<?php

class Site
{
    public function show($argument)
    {
        $title = func_get_arg(0);
        $desc = func_get_arg(1);
        return 'Site::show():<br>站点名称:'.$title.'<br>站点描述:'.$desc;
    }

    public static function  add($argument)
    {
        $m = func_get_arg(0);
        $n = func_get_arg(1);
        return 'show::add():<br>'.$m.'+'.$n.'='.($m+$n);
    }
}