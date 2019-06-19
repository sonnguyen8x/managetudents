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
