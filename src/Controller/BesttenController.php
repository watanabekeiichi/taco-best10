<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Network\Exception\NotFoundException;

class BesttenController extends AppController {
    public function index() {
        $this->autoRender = false;
        $this->response->charset('UTF-8');
        $this->response->type('json');

        $body = \json_encode(['hoge' => 123]);
        $this->response->body($body);
    }

    public function api(string $id = null) {
        $result = [
            'member' => [
                'id' => $id,
                'name' => '星野蒼良',
                'color' => 'ブルー'
            ]
        ];
        if (empty($id)) {
            $result['member'] = null;
        }
        $this->viewBuilder()->className('Json');
        $this->set([
            'data' => $result,
            '_serialize' => ['data'],
        ]);
    }
}
