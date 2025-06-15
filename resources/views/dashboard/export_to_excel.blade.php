@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Export Your Sale Data</h1>
<div class="container mt-4">
<a href="{{ route('user.download.sample.excel') }}" class="nav-link text-warning">
                   Sample Excel
                </a>
    {{-- Shop Form --}}

    
    <form action="{{route('user.save.export.data')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Shop Type -->
        <div class="mb-3">
            <label class="form-label">Upload Your File Here:</label>
            <input type="file" name="export_file" class="form-control" required>
        </div>
        <!-- No of Branches (Hidden, Will be counted via JS) -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection