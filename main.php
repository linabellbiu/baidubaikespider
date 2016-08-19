<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16
 * Time: 22:43
 */
include_once 'resolve.php';
include_once 'urlMssage.php';
include_once 'save.php';

//主程序
class main
{
    function run($url)
    {
        do {
            
            //进入解析网页
            resolve::re_html($url);

            //获取最新带爬取的url
            $url = urlMssage::get_new_url();
        } while (true);
    }
}

$con = mysql_connect('localhost', 'root', '');
mysql_select_db('baidubaike', $con);
mysql_query("set names utf8");
$url = "http://baike.baidu.com/link?url=Ro5oYO_lr3Ev1WcX0v-6zleJZrxYZXjUk-RGCr-Kvzw1mUBvIMMMpUvqmQGchnB_mX3huWNj8IrhI5LNc2rryXxc9nGj0TI-yPzCUxDk1ca";
$index = new main();

//入口
$index->run($url);
