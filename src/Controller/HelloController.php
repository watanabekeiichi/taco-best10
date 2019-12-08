<?php
namespace App\Controller;
use Cake\Controller\Controller;

class HelloController extends AppController {
    public function index() {
        $this->autoRender = false;
        $this->response->body('Hello World.');
    }
}
