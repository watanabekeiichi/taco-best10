<?php
namespace App\Controller;

use App\Controller\AppController;

class SongsController extends AppController {

    public function initialize()
    {
        // parent::initialize();
        // $this->autoRender = false;
        // $this->response->charset('UTF-8');
        // $this->response->type('json');
    }

    public function index(string $id = null)
    {
        $song = $this->Songs->find();
        // $song = null;
        if (empty($song)) {
            $song = ['member' => null];
        }
        $body = json_encode($song);
        $this->response->body($body);
    }
}
