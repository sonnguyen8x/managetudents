<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Group;
use Illuminate\Support\Facades\Session;
use App\Repositories\StudentRepository;

class HomeController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    //
    public function index (Request $request) {
        $students = Student::with('group')->get()->toArray();
        dd($students);
        $groups = Group::all();
        return view('home', compact('students', 'groups'));
    }

    public function changeLanguage($language) {
        Session::put('website_language', $language);
        return redirect()->back();
    }

}
