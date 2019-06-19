<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests\GroupFormRequest;
use Illuminate\Http\Response;

class GroupController extends Controller
{
    //
    public function create()
    {
        return view('groups.add');
    }

    public function store(GroupFormRequest $request)
    {
        $group = new Group();
        $group->name = $request->get('name');
        $group->major = $request->get('major');
        $group->save();
        return view("groups.add")->with("mess", "add group success!");
    }

    public function edit($id)
    {
        $group = Group::find($id);
        return view("groups.edit", compact('group'));
    }

    public function update(GroupFormRequest $request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->get('name');
        $group->major = $request->get('major');
        $group->save();
        return view("groups.edit", compact('group'))->with("mess", "Edit group success!");
    }

    public function delete (Request $request) {
        $group = Group::find($request->get('group_id'));
        $group->delete();
        return redirect('/home')->with('group_del',"Delete Success");
    }

    public function ajax(Request $request) {
        $students = Group::find($request->get('group_id'))->student;
        echo view('groups.ajax', compact('students'));
        exit;
    }
}
