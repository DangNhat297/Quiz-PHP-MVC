<?php

namespace App\Helpers;
date_default_timezone_set('Asia/Ho_Chi_Minh');
class Helper{

    public static function convertCase($str){
        return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    }

    public static function handleField($str){
        return htmlspecialchars($str);
    }

    public static function lastParam($url){
        $arr = explode("/", trim($url,'/'));
        return $arr[count($arr)-1];
    }

    public static function toDateTime($format, $time){
        $d = \DateTime::createFromFormat($format, $time);
        return date("Y-m-d H:i:s", $d->getTimestamp());
    }

    public static function randomStr($length = 5){
        $str = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890";
        $str = str_shuffle($str);
        return substr($str, 0, $length);
    }

    public static function isOpenQuiz($start, $end){
        $currentTime = date("Y-m-d H:i:s");
        if($currentTime >= $start && $currentTime <= $end) return true;
        return false;
    }

    public static function formatDate($datetime, $format){
        $date = new \DateTime($datetime);
        return $date->format($format);
    }

    public static function minuteBetween($start, $end){
        if(!$end) return 'Không xác định';
        $startTime = date_parse_from_format('Y-m-d H:i:s', $start);
        $endTime = date_parse_from_format('Y-m-d H:i:s', $end);
        $mkStart = mktime($startTime['hour'], $startTime['minute'], $startTime['second'], $startTime['month'], $startTime['day'], $startTime['year']);
        $mkEnd = mktime($endTime['hour'], $endTime['minute'], $endTime['second'], $endTime['month'], $endTime['day'], $endTime['year']);
        $distance = $mkEnd - $mkStart;
        $result = '';
        switch($distance){
            case $distance < 60:
                $result = $distance . ' giây';
                break;
            case $distance >= 60: 
                $minutes = $distance/60;
                $seconds = $distance%60;
                $result = $minutes . ' phút, ' . $seconds . ' giây';
                break;
        }
        return $result;
    }

}