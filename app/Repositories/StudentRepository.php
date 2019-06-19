<?php

namespace App\Repositories;

use App\Student;

class StudentRepository implements StudentRepositoryInterface
{

    public function all()
    {
        return Student::all();
    }

    public function find() {

    }


}