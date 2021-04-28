<?php
namespace Qwelve\N2\Repository;

interface UserInfoRepositoryIntarface
{
    public function save(\Qwelve\N2\Models\UserInfo $userInfo);
    public function clear();
}
