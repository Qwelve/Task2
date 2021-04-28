<?php
namespace Qwelve\N2\Models;

class UrlInfo
{
    private $date;
    private $time;
    private $ip;
    private $refererUrl;
    private $url;

    public function getDate(){
        return $this->date;
    }
    public function setDate($value){
        $this->date = date('Y-m-d', strtotime($value));
    }

    public function getTime(){
        return $this->time;
    }
    public function setTime($value){
        $this->time = $value;
    }

    public function getIp(){
        return $this->ip;
    }
    public function setIp($value){
        $this->ip = $value;
    }

    public function getRefererUrl(){
        return $this->refererUrl;
    }
    public function setRefererUrl($value){
        $this->refererUrl = $value;
    }

    public function getUrl(){
        return $this->url;
    }
    public function setUrl($value){
        $this->url = $value;
    }
}
