@extends('master')

@section('title','Create new Group')
@section('content')

    <div class="container">
        <h3><p>ADD NEW Group</p></h3>
        @if(isset($mess))
            <p class="alert alert-success">{!! $mess !!}</p>
        @endif

        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="{!! Route('storeGroup') !!}" method="post">
            @csrf
            <label>name</label>
            <input type="text" name="name" class="form-control">


            <label>Major</label>
            <input type="text" name="major" class="form-control">


            <br>
            <br>

            <input class="btn btn-success" value="ADD" type="submit" name="btnsubmit">
        </form>
    </div>


@endsection
