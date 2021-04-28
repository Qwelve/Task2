<?
namespace Qwelve\N2\Repository;
use Qwelve\N2\DataBase\DataBase;
class MySQLUserInfoRepository implements UserInfoRepositoryIntarface
{
    private $db;
    public function __construct(DataBase $db){
        $this->db = $db;
    }
    public function save(\Qwelve\N2\Models\UserInfo $userInfo){        
        $test = $this->db->save("INSERT INTO `userinfo` (`ip`, `browser_name`, `os_name`) VALUES(?, ?, ?)",
                                [$userInfo->getIp(), $userInfo->getBrowser(), $userInfo->getSystem()]);
    }
    public function clear(){
        $this->db->clear("TRUNCATE TABLE `userinfo`");
    }
}
