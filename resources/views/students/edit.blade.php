@extends('students.master')
@section('content')

<div class="card">
    <div class="card-header">Sửa thông tin sinh viên</div>
    <div class="card-body">
        <form method="post" action="{{ route('students.update', $student->StudentID) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="StudentName">Tên sinh viên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="StudentName" name="StudentName" value="{{ old('StudentName', $student->StudentName) }}" required/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="StudentEmail">Địa chỉ Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="StudentEmail" name="StudentEmail" value="{{ old('StudentEmail', $student->StudentEmail) }}" required/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="StudentGender">Giới tính</label>
                <div class="col-sm-10">
                    <select name="StudentGender" class="form-control" id="StudentGender">
                        <option value="0" @selected((string) old('StudentGender', $student->StudentGender) === '0')>Nam</option>
                        <option value="1" @selected((string) old('StudentGender', $student->StudentGender) === '1')>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="ClassRoomID" class="col-sm-2 col-label-form">Lớp</label>
                <div class="col-sm-10">
                    <select name="ClassRoomID" class="form-select" id="ClassRoomID" required>
                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->ClassRoomID }}" @selected((string) old('ClassRoomID', $student->ClassRoomID) === (string) $classroom->ClassRoomID)>{{ $classroom->ClassRoomName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" class="btn btn-primary" value="Lưu thay đổi"/>
            </div>
        </form>
    </div>
</div>

@endsection