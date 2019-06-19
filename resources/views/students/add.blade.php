@extends('master')

@section('title','Create new Student')
@section('content')

    <div class="container">
        <h3><p>ADD NEW Student</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif

        @if(isset($errors))
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="{!! Route('storeStudent') !!}" method="post">
            @csrf
            <label>User name</label>
            <input type="text" name="username" class="form-control">

            <label>Full name</label>
            <input type="text" name="fullname" class="form-control">

            <label>Email</label>
            <input type="text" name="email" class="form-control">

            <label>Address</label>
            <input type="text" name="address" class="form-control">
            <br>
            <label>Group</label>
            <select name="group_id">
                @foreach($groups as $group)
                    <option value="{!! $group->id !!}">{!! $group->name !!}</option>
                @endforeach

            </select>
            <br>
            <br>
            <br>

            <input class="btn btn-success" value="ADD" type="submit" name="btnsubmit">
        </form>
    </div>


@endsection
