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
        $data = [];
        if(isset($registers) && !empty($registers)) {
            foreach ($registers as $register)
                $data[$register['id']] = $register;
        }
        $header = $this->request()->validate('true_response', $data);
        echo json_encode(["header" => $header, "data" => $data]);
    }
 }