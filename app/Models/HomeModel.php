<?php

namespace App\Models;

use App\Classes\Model;

class HomeModel extends Model
{

    public function index()
    {
        $this->query('SELECT * FROM students');
        $rows = $this->resultSet();
        if (count($rows)) {
            return $rows;
        } else {
            return;
        }
    }
}