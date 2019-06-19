<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Group;
use App\Subject;
use App\Http\Requests\StudentFromRequest;


class StudentController extends Controller
{
    //
    public $groups;
    public $subjects;

    public function __construct()
    {
        $this->groups = Group::all();
        $this->subjects = Subject::all();
    }

    public function create()
    {
        $groups = $this->groups;
        return view('students.add', compact('groups'));
    }

    public function store(StudentFromRequest $request)
    {
        $groups = $this->groups;
        $student = new Student();
        $student->username = $request->get('username');
        $student->fullname = $request->get('fullname');
        $student->email = $request->get('email');
        $student->address = $request->get('address');
        $student->group_id = $request->get('group_id');
        $mess = "";
        if ($student->save()) {
            $mess = "Successful add new!";
        }

        return view('students.add', compact('groups'))->with('mess', $mess);

    }

    public function edit($id)
    {
        $groups = $this->groups;
        $student = Student::find($id);
        $subjects = $this->subjects;
        // student's subjects
        $student_subjects = $student->subjects()->get()->toArray();
        // get id subject
        $subjects_id = [];
        foreach ($student_subjects as $item) {
            $subjects_id[] = $item['id'];
        }

        return view('students.edit', compact('groups', 'student', 'subjects', 'subjects_id'));
    }

    public function update(StudentFromRequest $request, $id)
    {
        $groups = $this->groups;
        $student = Student::find($id);
        $student->username = $request->get('username');
        $student->fullname = $request->get('fullname');
        $student->email = $request->get('email');
        $student->address = $request->get('address');
        $student->group_id = $request->get('group_id');
//        dd($request->get('subject'));
        $student->subjects()->sync($request->get('subject'));

        $subjects = $this->subjects;


        $student_subjects = $student->subjects()->get()->toArray();

//        dd($student_subjects);
        // get id subject
        $subjects_id = [];
        foreach ($student_subjects as $item) {
            $subjects_id[] = $item['id'];
        }
        $mess = "";
        if ($student->save()) {
            $mess = "Successful Edit!";
        }

        return view('students.edit', compact('groups', 'student', 'subjects', 'subjects_id'));


    }

    public function delete(Request $request)
    {
        $student = Student::find($request->get('student_id'));
        $student->delete();
        return redirect('/home')->with('mes_del', "Delete Success");
    }

    public function getSubjects()
    {
        // get student id = 9
        $subjects = Student::find(9)->subjects()->orderBy('id')->get();
        foreach ($subjects as $subject) {
            echo "Subject ID : " . $subject->id . " name : " . $subject->name . "<br/>";
        }
        return "get All Subject of Student with id = 9";
    }

}
