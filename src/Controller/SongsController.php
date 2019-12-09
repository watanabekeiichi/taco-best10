<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;

class SongsController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->autoRender = false;
        $this->response->charset('UTF-8');
        $this->response->type('json');
    }

    public function index()
    {
        $songs = $this->Songs->find();
        if (empty($songs)) {
            $songs = ['member' => null];
        }
        $body = json_encode($songs);
        $this->response->body($body);
    }

    public function get(?string $id = null)
    {
        if (!ctype_digit($id)) {
            $song = null;
        } else {
            try {
                $song = $this->Songs->get($id);
            } catch (RecordNotFoundException $e) {
                $song = null;
            }
        }
        $this->response->body(json_encode([
            'song' => $song
        ]));
    }
}
