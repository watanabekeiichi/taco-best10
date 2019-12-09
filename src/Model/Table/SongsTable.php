<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SongsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('songs');
    }
}
