@extends('master')

@section('title', 'Manage Students')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{!! route('change-language',['en']) !!}">English</a>
            <a href="{!! route('change-language', ['vi']) !!}">Vietnam</a>


            <h2>{{ __('welcome to PP1901') }}</h2>
            <h3>{{ __("my name is Son") }}</h3>
            <h3>{{ __("I am trainer PHP.") }}</h3>
            <div class="col-md-4 border-right border-info">
                <h3>Groups</h3>
                @if(session('group_del'))
                    <p class="alert alert-success">{{ session('group_del') }}</p>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('name')}}</th>
                        <th scope="col">{{__('major')}}</th>
                        <th scope="col">{{__('action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <th scope="row">{!! $group->id !!}</th>
                            <td><a href="javascript:;" class="manage_group"
                                   group_id="{!! $group->id !!}">{!! $group->name !!}</a></td>
                            <td>{!! $group->major !!}</td>
                            <td>
                                <a class="btn btn-info" href="{!! Route('editGroup', $group->id) !!}">Edit</a>
                                <form action="{!! Route('deleteGroup') !!}" method="post">
                                    <input type="hidden" name="group_id" value="{!! $group->id !!}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
            <div class="col-md-8">
                <h3>Students</h3>
                @if(session('mes_del'))
                    <p class="alert alert-success">{{ session('mes_del') }}</p>
                @endif

                <div id="showGroupStudent">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">username</th>
                            <th scope="col">fullname</th>
                            <th scope="col">email</th>
                            <th scope="col">address</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <th scope="row">{!! $student->id !!}</th>
                                <td>{!! $student->username !!}</td>
                                <td>{!! $student->fullname !!}</td>
                                <td>{!! $student->email !!}</td>
                                <td>{!! $student->address !!}</td>
                                <td>
                                    <a class="btn btn-info" href="{!! Route('editStudent',$student->id) !!}">Edit</a>
                                    <form action="{!! Route('deleteStudent') !!}" method="post">
                                        <input type="hidden" name="student_id" value="{!! $student->id !!}">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('.manage_group').click(function () {
                var id_group = $(this).attr('group_id');

                // code Ajax
                $.ajax({
                    type: "GET",
                    url: "/group/ajaxStudent",
                    data: {group_id: id_group},
                    dataType: 'html',
                    success: function (data) {
                    }
                }).done(function (data) {
                    $('#showGroupStudent').html(data);

                });
            });
        })
    </script>
@endsection
