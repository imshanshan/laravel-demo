<?php

if (! function_exists('route_class')) {
    /**
     * 将路由转换成页面 div class 名称
     * @return string
     */
    function route_class()
    {
        return str_replace('.', '-', \Route::currentRouteName());
    }
}
?>