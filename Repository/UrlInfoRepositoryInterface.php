<?php
namespace Qwelve\N2\Repository;

interface UrlInfoRepositoryInterface
{
    public function save(\Qwelve\N2\Models\UrlInfo $urlInfo);
    public function clear();
}
