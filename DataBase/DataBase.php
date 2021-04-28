<?
namespace Qwelve\N2\DataBase;
class DataBase
{
    private $host;
    private $db;
    private $username;
    private $password;
    private $pdo;
    private static $instance = null;
    private function __construct($host, $username, $password, $db){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db;
        try {
            $this->pdo = new \PDO($dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance($host, $username, $password, $db){
        if (self::$instance == null) {
            self::$instance = new DataBase($host, $username, $password, $db);
        }        
        return self::$instance;
    }
    public function sendQuery($sqlQuery){
        $result = array();
        foreach ($this->pdo->query($sqlQuery) as $key => $value) {
            $result[$key] = $value;
        }
        return $result;
    }
    public function save($sql, $data){
        $this->pdo->prepare($sql)->execute($data);
    }
    public function clear($sql){
        $this->pdo->query($sql);
    }
}
