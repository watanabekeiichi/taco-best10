<?php
namespace App\Controller;

use App\Controller\AppController;

class SongsController extends AppController {

    public function get(string $id = null)
    {
        $this->autoRender = false;
        $this->response->charset('UTF-8');
        $this->response->type('json');

        $song = $this->Song->find('first');
        $body = \json_encode($song);
        $this->response->body($body);
    }
}
