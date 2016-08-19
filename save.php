<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16
 * Time: 22:54
 */
class save
{
    static function save_url($url_array)
    {
        foreach ($url_array as $value) {
            $urlArray = explode('href="', $value);
            $result = 'href="http://baike.baidu.com' . $urlArray[1];
            mysql_query("INSERT INTO `baike`(`url`) VALUES ('" . $result . "' )");
        }
        unset($url_array);
    }
}