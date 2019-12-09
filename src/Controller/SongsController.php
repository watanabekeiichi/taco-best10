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
        ], JSON_UNESCAPED_UNICODE));
    }

    /**
     * 曲検索
     *
     * @param string|null $key 検索キーワード
     */
    public function search(?string $key = null)
    {
        if (empty($key)) {
            $songs = null;
        } else {
            // _%をエスケープ
            $key = addcslashes($key, '_%');
            // 全角英数スペースを半角に、半角カナを全角に
            $key = mb_convert_kana($key, 'aKs');
            // 全角カタカナをひらがなに
            $yomi = mb_convert_kana($key, 'c');
            $songs = $this->Songs->find()
                ->select(['id', 'title'])
                ->where([
                    'OR' => [
                        'title LIKE' => '%' . $key . '%',
                        'yomi LIKE' => '%' . $yomi . '%',
                        'tag LIKE' => '%' . $key . '%',
                    ]
                ])
                ->limit(5);
        }
        $this->response->body(json_encode([
            'songs' => $songs
        ], JSON_UNESCAPED_UNICODE));
    }
}
