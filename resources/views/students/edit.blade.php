@extends('master')

@section('title','Edit Student')
@section('content')

    <div class="container">
        <h3><p>Edit Student</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif

        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="{!! Route('updateStudent', $student->id) !!}" method="post">
            @csrf
            <label>User name</label>
            <input type="text" name="username" value="{!! $student->username !!}" class="form-control">

            <label>Full name</label>
            <input type="text" value="{!! $student->fullname !!}" name="fullname" class="form-control">

            <label>Email</label>
            <input type="text" name="email" value="{!! $student->email !!}" class="form-control">

            <label>Address</label>
            <input type="text" name="address" value="{!! $student->address !!}" class="form-control">
            <br>
            <label>Group</label>
            <select name="group_id">
                @foreach($groups as $group)
                    <option value="{!! $group->id !!}">{!! $group->name !!}</option>
                @endforeach

            </select>
            <br>
            <br>
            <label>Subject</label>
            {!! var_dump($subjects_id) !!}
            <div class="row">


            @foreach($subjects as $subject)
                <div class="col-md-3">
                    <p>
                        <label>
                            <input type="checkbox"
                                   value="{{$subject->id}}" @if(in_array($subject->id,$subjects_id)) {{ "checked='checked'" }}
                                   @endif name="subject[]"> {{$subject->name}} - {{$subject->id}}
                        </label>
                    </p>
                </div>
            @endforeach
            </div>
            <br>
            <br>

            <br>

            <input class="btn btn-success" value="Update Student" type="submit" name="btnsubmit">
        </form>
    </div>


@endsection
