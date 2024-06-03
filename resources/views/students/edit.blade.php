@extends('students.master')

@section('content')

<div class="card">
    <div class="card-header">Sua thong tin sinh vien</div>
    <div class="card-body">
        <form method="POST" action = "{{ route('students.update', $student->StudentID) }} " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label  class="col-sm-2 col-label-form">Ten sinh vien</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="StudentName" value="{{$student->StudentName}}"></div>
            </div>
            <div class="row mb-3">
                <label  class="col-sm-2 col-label-form">Dia chi Email</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="StudentEmail" value="{{$student->StudentEmail}}"></div>
            </div>
            <div class="row mb-4">
                <label  class="col-sm-2 col-label-form">Gioi tinh</label>
                <div class="col-sm-10">
                    <select name="StudentGender" class="form-control">
                        <option <?= $student->StudentGender == 0? 'selected': '' ?> value="0">Nam</option>
                        <option <?= $student->StudentGender == 1? 'selected': '' ?> value="1">Nu</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="ClassRoomID" class="form-label">Chon lop</label>
                <select name="ClassRoomID" class="form-control" required>
                    @foreach($classrooms as $classroom)
                        <option value="{{$classroom->ClassRoomID}}" @if ($classroom->ClassRoomID == $student->StudentID) selected @endif>{{$classroom->ClassRoomName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <a href="{{route('students.index')}}" class="btn btn-secondary">Quay lai</a>
                <input type="submit" class="btn btn-primary" value='Sua'></input>
            </div>
        </form>
    </div>
</div>

@endsection
