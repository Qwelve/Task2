<?php
namespace Qwelve\N2\Models;

class UserInfo
{
    private $ip;
    private $browser;
    private $system;

    public function getIp(){
        return $this->ip;
    }
    public function setIp($value){
        $this->ip = $value;
    }

    public function getBrowser(){
        return $this->browser;
    }
    public function setBrowser($value){
        $this->browser = $value;
    }

    public function getSystem(){
        return $this->system;
    }
    public function setSystem($value){
        $this->system = $value;
    }
}
