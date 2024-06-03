@extends('students.master')
@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{$message}}
</div>

@endif

<div class="container mt-5">
    <h1 class="text-primary mt-3 mb-4 text-center">
        <b>Quan ly sinh vien</b>
    </h1>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b></b></div>
            <div class="col col-md-6">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end"><b>Tao moi sinh vien</b></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Ma sinh vien</th>
                <th>Ten sinh vien</th>
                <th>Dia chi Email</th>
                <th>Gioi tinh</th>
                <!-- <th>Class Id</th> -->
                <th>Lop</th>
                <th>Thao tac</th>
            </tr>
            @if(count($students) > 0)
                @foreach($students as $row)
                    <tr>
                        <td>{{$row->StudentID}}</td>
                        <td>{{$row->StudentName}}</td>
                        <td>{{$row->StudentEmail}}</td>
                        <!-- <td>{{$row->StudentGender}}</td> -->
                        <td>@if($row->StudentGender == 0) Nam @else Nu @endif</td>
                        <!-- <td>{{$row->ClassRoomID}}</td> -->
                        <td>{{$row->ClassRoom->ClassRoomName}}</td>
                        <td>
                            <form action="{{ route('students.destroy', $row->StudentID) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('students.show', $row->StudentID) }}" class="btn btn-primary">Xem chi tiet</a>
                                <a href="{{ route('students.edit', $row->StudentID) }}" class="btn btn-warning">Sua</a>
                                <input type="submit" class="btn btn-danger btn-sm" value="Xoa" >
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">No data found</td>
                </tr>
            @endif
        </table>
        {!! $students->links() !!}
    </div>
</div>

@endsection

@section('scripts')
<script>
    function confirmDelete() {
        return confirm('Ban co chac chan muon xoa hoc sinh nay?');
    }
</script>
@endsection