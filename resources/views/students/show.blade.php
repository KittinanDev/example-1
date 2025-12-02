@extends('students.layout')
@section('content')
<div class="card mt-5">
    <h2 class="card-header">Show Student</h2>
    <div class="card-body">
        <a href="{{ route('students.index') }}" class="btn btn-primary">Back</a>
        <div class="mb-3 mt-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ $student->name }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Division</label>
            <input type="text" class="form-control" value="{{ $student->division }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label><br>
            @if($student->photo)
                <img src="{{ asset('image/'.$student->photo) }}" alt="Photo" width="150">
            @else
                <p>No photo available</p>
            @endif
        </div>
    </div>
</div>
@endsection
