@extends('master')

@section('title','Edit Group')
@section('content')

    <div class="container">
        <h3><p>Edit Group</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif

        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="{!! Route('updateGroup', $group->id) !!}" method="post">
            @csrf
            <label>name</label>
            <input type="text" name="name" value="{!! $group->name !!}" class="form-control">


            <label>Major</label>
            <input type="text" name="major" value="{!! $group->major !!}" class="form-control">


            <br>
            <br>

            <input class="btn btn-success" value="Update Group" type="submit" name="btnsubmit">
        </form>
    </div>


@endsection
