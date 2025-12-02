@extends('students.layout')
@section('content')
<div class="card mt-5">
    <h2 class="card-header">Edit Student</h2>
    <div class="card-body">
        <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Division</label>
                <input type="text" class="form-control @error('division') is-invalid @enderror" name="division" value="{{ $student->division }}">
                @error('division')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label><br>
                @if($student->photo)
                    <img src="{{ asset('image/'.$student->photo) }}" width="100" class="mb-2">
                @endif
                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
