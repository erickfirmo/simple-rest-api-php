<?php

namespace App\Http;

class Request {

    protected $status = [];
    protected $header;
    public $validation;

    public function __construct() {
        $this->setStatusMessage();
    }

    public function setStatusMessage() {
        $this->status = [
            200 => 'OK',
            201 => "Criado com Successo",
            404 => 'Nada encontrado',
        ];
    }

    public function getStatusMessage($status) {
        return $this->status[$status];
    }

    public function getStatus($status) {
        header("HTTP/1.1 $status ".$this->getStatusMessage($status));
        $status_header = [];
        array_push($status_header, ["status" => ["error" => http_response_code($status), "message" => $this->getStatusMessage($status)]]);
        return $status_header;
    }

    public function getResponse($controller, $method, $parameterValue) {
        return (new $controller)->$method($parameterValue);
    }

    public function validate($rule, $value) {
        return $this->$rule($value); 
    }

    public function input($inputName)
    {
        if(isset($_POST[$inputName]))
            return $_POST[$inputName];
    }

    public function true_response($value) {
        if(!is_null($value)) {
            return $this->getStatus(200);
        } else {
            return $this->getStatus(404);
        }
    }
}