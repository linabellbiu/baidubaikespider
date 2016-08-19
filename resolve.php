<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16
 * Time: 22:46
 */
class resolve
{

    //获取页面的url
    static function get_url($html)
    {
        preg_match_all('/href=\"[\/\w]+.htm\">[\s\S]*?([^<>]*)<\/a>/', $html, $url_array);

        //获取到的url保存在mysql
        save::save_url($url_array[0]);
        
        //获取到的新url储存在url管理器中
        urlMssage::add_news_url($url_array[0]);
    }

    //解析页面
    static function re_html($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $html = curl_exec($ch);
        curl_close($ch);

        //记录已经爬过的url添加到url管理器中
        urlMssage::url_notes($url);
        self::get_url($html);
    }
}