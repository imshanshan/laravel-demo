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

if (! function_exists('make_excerpt')) {
    
    /**
     * 根据给定的内容生成摘要
     */
    function make_excerpt($text, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($text)));
        
        return str_limit($excerpt, $length);
    }
}
?>
