<?php

 namespace App\Controllers;

 use App\Http\Request;

 class Controller {

    public function getPDOConnection() {
        return (new \Connect())->getPDOConnection();
    }

    public function request() {
        return (new Request());
    }

    public function getJsonResponse($registers=NULL) {
        $registers_array = [];
        if(isset($registers) && !empty($registers)) {
            foreach ($registers as $register)
                $registers_array[$register['id']] = $register;
        }
        $data = [];
        $header = $this->request()->validate('true_response', $data);
        $data['data'] = $registers_array;
        $return = ["header" => $header, "data" => $data];
        echo json_encode($return);
    }
 }