<?php
namespace App\Services;

use Exception;

class ItDepartment extends WorkList implements WorkListInterface {
    protected $baseUrl          = "http://www.mocky.io/v2/5d47f24c330000623fa3ebfa";
    protected $works;
    public function getData(){
        try
        {
            $works          = $this->apiRequest($this->baseUrl);
            $this->works    = collect();
            foreach($works as $row){    
                $this->works->push(["title" => $row->id, "difficulty" => $row->zorluk, "time"   => $row->sure]);
            }
            return $this->works;
        }catch(Exception $e){
            return "Veri bulunamadı. Lütfen api servislerini kontrol edin. Error : ". $e->getMessage();
        }
    }

}