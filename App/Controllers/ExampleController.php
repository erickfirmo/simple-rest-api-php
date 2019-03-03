<?php

namespace App\Controllers;

use App\Http\Request;
use App\Controllers\Controller;

class ExampleController extends Controller {

    public $prefix = 'examples';

    public $table = 'examples';

    public $links = [
        [
            'rel' => 'select-all',
            'method' => 'GET',
            'action' => 'select'
        ],
        [
            'rel' => 'select-single',
            'method' => 'GET',
            'action' => 'show'
        ],
        [
            'rel' => 'store',
            'method' => 'POST',
            'action' => 'insert'
        ],
        [
            'rel' => 'update-full',
            'method' => 'PUT',
            'action' => 'update'
        ],
        [
            'rel' => 'update-partially',
            'method' => 'PATCH',
            'action' => 'update'
        ],
        [
            'rel' => 'delete',
            'method' => 'DELETE',
            'action' => 'delete'
        ]
    ];
   
    public function select() {
        $db = $this->getPDOConnection();
        $stmt = $db->prepare("SELECT * FROM $table");
        $stmt->execute();
        $registers = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $this->getJsonResponse($registers);
    }

    public function store() {
        $column1 = $_POST['column1'];
        $column2 = $_POST['column2'];
        $db = $this->getPDOConnection();        
        $stmt = $db->prepare("INSERT INTO $table (column1, column2) VALUES ('$column1', '$column2')");
        $stmt->execute();
    }

    public function update($id) {
        $db = $this->getPDOConnection();
        $column1 = $_POST['column1'];
        $column2 = $_POST['column2'];
        $stmt = $db->prepare('UPDATE '.$table.' SET column1="'.$column1.'", column2="'.$column2.'" WHERE id='.$id);
        $stmt->execute();
    }

    public function delete($id) {
        $db = $this->getPDOConnection();
        $stmt = $db->prepare('DELETE FROM '.$table.' WHERE id='.$id);
        $stmt->execute();
    }

    public function findById($id) {
        $db = $this->getPDOConnection();
        $column1 = $_POST['column1'];
        $column2 = $_POST['column2'];
        $stmt = $db->prepare('UPDATE '.$table.' SET column1="'.$column1.'", column2="'.$column2.'" WHERE id='.$id);
        $stmt->execute();
    }
}