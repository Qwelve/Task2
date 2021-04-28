<?php
require "vendor/autoload.php";
use Qwelve\N2\DataBase\DataBase;
use Qwelve\N2\CSV\CSVReader;
use Qwelve\N2\Models\UrlInfo;
use Qwelve\N2\Models\UserInfo;
use Qwelve\N2\Repository\UrlInfoRepositoryInterface;
use Qwelve\N2\Repository\UserInfoRepositoryIntarface;
use Qwelve\N2\Repository\MySQLUrlInfoRepository;
use Qwelve\N2\Repository\MySQLUserInfoRepository;

$csvReader = new CSVReader("userinfo.csv", ";");
$res = $csvReader->read();

$host = "localhost";
$userName = "root";
$password = "root";
$dbName = "csv";

$db = DataBase::getInstance($host, $userName, $password, $dbName);

$userInfoRepo = new MySQLUserInfoRepository($db);
$userInfoRepo->clear();
for ($i=1; $i < count($res); $i++) { 
    unset($userInfo);
    $userInfo = new UserInfo();
    $userInfo->setIp($res[$i][0]);
    $userInfo->setBrowser($res[$i][1]);
    $userInfo->setSystem($res[$i][2]);
    $userInfoRepo->save($userInfo);   
}

$csvReader->setFile("urlinfo.csv");
$res = $csvReader->read();

$urlInfoRepo = new MySQLUrlInfoRepository($db);
$urlInfoRepo->clear();
for ($i=1; $i < count($res); $i++) { 
    unset($urlInfo);
    $urlInfo = new UrlInfo();
    $urlInfo->setIp($res[$i][2]);
    $urlInfo->setTime($res[$i][1]);
    $urlInfo->setDate($res[$i][0]);
    $urlInfo->setRefererUrl($res[$i][3]);
    $urlInfo->setUrl($res[$i][4]);
    $urlInfoRepo->save($urlInfo);     
}



$query = "
SELECT DISTINCT(urlinfo.ip), userinfo.browser_name, userinfo.os_name, firstTimeUrl.ur, lastTimeUrl.uc, elapsedTime.diff
FROM urlinfo
LEFT JOIN userinfo
ON urlinfo.ip = userinfo.ip
LEFT JOIN
	(SELECT urlinfo.ip, urlinfo.url_referer as ur
    FROM urlinfo
    LEFT JOIN (SELECT ip, min(CONCAT(date, \" \", time)) as min_dt
              FROM urlinfo          
              GROUP BY ip) as firstTimeUrl
    ON firstTimeUrl.ip = urlinfo.ip
    WHERE CONCAT(urlinfo.date, \" \", urlinfo.time) = firstTimeUrl.min_dt) as firstTimeUrl
ON urlinfo.ip = firstTimeUrl.ip
LEFT JOIN
	(SELECT urlinfo.ip, urlinfo.url_current as uc
    FROM urlinfo
    LEFT JOIN (SELECT ip, max(CONCAT(date, \" \", time)) as max_dt
              FROM urlinfo          
              GROUP BY ip) as lastTimeUrl
    ON lastTimeUrl.ip = urlinfo.ip
    WHERE CONCAT(urlinfo.date, \" \", urlinfo.time) = lastTimeUrl.max_dt) as lastTimeUrl
ON urlinfo.ip = lastTimeUrl.ip
LEFT JOIN 
	(SELECT ip, TIMESTAMPDIFF(HOUR,min(CONCAT(urlinfo.date, \" \", urlinfo.time)), max(CONCAT(urlinfo.date, \" \", urlinfo.time))) as diff
        FROM urlinfo
        GROUP BY ip) as elapsedTime
ON urlinfo.ip = elapsedTime.ip";

$queryRes = $db->sendQuery($query);

?>


<table border="1">
    <tr>
        <th>
        IP-адрес
        </th>
        <th>
        браузер
        </th>
        <th>
        ОС
        </th>
        <th>
        URL с которого зашел первый раз
        </th>
        <th>
        URL на который зашел последний раз
        </th>
        <th>
        количество просмотренных уникальных URL-адресов
        </th>
        <th>
        время, прошедшее с первого до последнего входа
        </th>
    </tr>
    <?foreach($queryRes as $resRow):?>
    <tr>
        <td><?=$resRow["ip"]?></td>
        <td><?=$resRow["browser_name"]?></td>
        <td><?=$resRow["os_name"]?></td>
        <td><?=$resRow["ur"]?></td>
        <td><?=$resRow["uc"]?></td>
        <td>-</td>
        <td><?=$resRow["diff"]?></td>
    </tr>
    <?endforeach;?>
</table>