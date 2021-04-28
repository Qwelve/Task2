<?
namespace Qwelve\N2\Repository;
use Qwelve\N2\DataBase\DataBase;

class MySQLUrlInfoRepository implements UrlInfoRepositoryInterface
{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function save(\Qwelve\N2\Models\UrlInfo $urlInfo){
        $this->db->save("INSERT INTO `urlinfo` (`ip`, `url_referer`, `url_current`, `date`, `time`) VALUES(?, ?, ?, ?, ?)",
                        [$urlInfo->getIp(), $urlInfo->getRefererUrl(), $urlInfo->getUrl(), $urlInfo->getDate(), $urlInfo->getTime()]);
    }
    public function clear(){
        $this->db->clear("TRUNCATE TABLE `urlinfo`");
    }
}
