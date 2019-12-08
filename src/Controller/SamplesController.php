<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Samples Controller
 *
 */
class SamplesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('samples');
        $this->set([
            'title' => 'あいうえお',
            'value' => 12345,
        ]);
    }
}
