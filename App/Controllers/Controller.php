<?php

 namespace App\Controllers;

 use App\Http\Request;

 class Controller {

    public $links;

    public function getPDOConnection() {
        return (new \Connect())->getPDOConnection();
    }

    public function request() {
        return (new Request());
    }

    public function getJsonResponse($registers=NULL) {
        $data = [];
        if(isset($registers) && !empty($registers)) {
            foreach ($registers as $register) {
                $register['links'] = $this->links($register['id']);
            }
            $data[$register['id']] = $register;
        }
        $header = $this->request()->validate('true_response', $data);
        echo json_encode(["header" => $header, "data" => $data]);
    }

    public function links($id) {
        $links = [];
        $href = '';
        foreach($this->links as $link) {
            switch ($link['action']) {
                case 'select':
                    $href = "";
                    break;
                case 'show':
                    $href = "/$id";
                    break;
                case 'update':
                    $href = "/update/$id";
                    break;
                case 'delete':
                    $href = "/delete/$id";
                    break;
                case 'insert':
                    $href = "/store";
                    break;
                case '':
                    $href = "";
                    break;
                default:
                    die('Requisição inválida!');
            }
            array_push($links, [
                "rel" => $_SERVER['REQUEST_URI'] == $link['rel'] ? $_SERVER['REQUEST_URI'] : $link['rel'],
                "href" => 'https://'.$_SERVER['HTTP_HOST'].'/'.$this->prefix.$href,
                "method" => $link['method']
            ]);
        }
        return $links;
    }
 }

