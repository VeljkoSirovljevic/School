<?php
/**
 * Created by PhpStorm.
 * User: veljko
 * Date: 3/23/2019
 * Time: 2:00 PM
 */

namespace App\Models;

use App\Classes\Model;

class StudentModel extends Model {

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

    public function add(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){

            // Insert into MySQL
            $this->query('INSERT INTO students (board, name, grade1, grade2, grade3, grade4)
                          VALUES(:board, :name, :grade1, :grade2, :grade3, :grade4)');
            $this->bind(':board', $post['board']);
            $this->bind(':name', $post['name']);
            $this->bind(':grade1', $post['grade1']);
            $this->bind(':grade2', $post['grade2']);
            $this->bind(':grade3', $post['grade3']);
            $this->bind(':grade4', $post['grade4']);
            $this->execute();
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL);
            }
        }
        return;
    }

    public function getStudent($id){
        $this->query('SELECT * FROM students WHERE id = :id ');
        $this->bind(':id', $id);

        $row = $this->single();

        return $row;
    }
}