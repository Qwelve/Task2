<?php
namespace Qwelve\N2\CSV;

class CSVReader
{
    private $file;
    private $delimiter;
    public function __construct($file, $delimiter = ";"){
        $this->file = $file;
        $this->delimiter = $delimiter;
    }

    public function setFile($value){
        $this->file = $value;
    }
    
    public function read(){
        $result = array();
        if(($file = fopen($this->file, "r")) !== false){
            while (($data = fgetcsv($file, 1000, $this->delimiter)) !== false){
                $result[] = $data;
            }
        }
        return $result;
    }
}
