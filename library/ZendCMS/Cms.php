<?php

class ZendCMS_Cms
{
    public static function cmsStaticMethod()
    {
        $debug = array();
        $debug['hostname'] = $_SERVER['HTTP_HOST'];
        $debug['useragent'] = $_SERVER['HTTP_USER_AGENT'];
        $debug['Ip'] = $_SERVER['REMOTE_ADDR'];
        $debug['User'] = $_ENV['USER'];

        return $debug;

    }
}