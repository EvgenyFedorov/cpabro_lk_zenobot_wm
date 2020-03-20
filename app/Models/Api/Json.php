<?php
/**
 * Created by PhpStorm.
 * User: Fedorov Evgeny
 * Date: 02.11.2018
 * Time: 16:43
 */

namespace App\Models\Api;


class Json{

    protected $url;
    public $api_data = array();
    private $json = null;

    public function setData($key, $string){

        $this->api_data[$key] = $string;

    }
    public function upSetConformityData($key,$string){

        $this->api_data[$key][] = $string;

    }
    public function upSetEmptyData($key,$string){

        $this->api_data[$key][] = $string;

    }
    public function jsonEncode(){

        return json_encode($this->api_data);

    }
    public function getData($key){

        return $this->api_data[$key];

    }
    public function getArray(){

        return $this->api_data;

    }
    public function getJson(){

        $this->jsonEncode();
        return $this->json;

    }

}