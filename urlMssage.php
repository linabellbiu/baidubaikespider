<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16
 * Time: 22:48
 */
class urlMssage
{
    static $urlPack = array();
    static $urlNotes = array();

    //添加新的url
    static function add_news_url($url_array)
    {
        foreach ($url_array as $value) {
            preg_match('/[\/\w]+.htm/', $value, $match);

            //拼接百度百科词条url地址
            $value = 'http://baike.baidu.com' . $match[0];

            //新的url保存在url包中
            if (self::$urlPack[$value] != $value) {
                self::$urlPack[$value] = $value;
            }
        }
    }

    //记录爬过的url保存在文本中
    static function url_notes($url)
    {
        $fp_puts = fopen('urlnotes.txt', 'ab');
        fputs($fp_puts, $url);
    }

    //获取新的url
    static function get_new_url()
    {
        $url = file_get_contents('urlnotes.txt');

        //取出url包中的每个url判断是否爬取过，若没被爬去返回给run($url)待爬取url
        foreach (self::$urlPack as $v_new_url) {
            if (strrpos($url, $v_new_url) === false) {
                return $v_new_url;
            }
        }
    }
}