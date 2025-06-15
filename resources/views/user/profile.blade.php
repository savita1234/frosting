@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Profile</h1>
 

<div class="container py-5">
  <div class="card shadow p-4">
    
    <!-- User Info -->
    <div class="text-center mb-4">
      <img src="https://via.placeholder.com/100" alt="User" class="profile-img mb-2">
      <h4><i class="bi bi-person-circle me-1"></i>{{$user->first_name}} {{$user->last_name}}</h4>
      <p class="text-muted">Email:{{$user->email}} | Phone: +91 {{$user->phone}} | Total Branches: {{$details->count()}}</p>
    </div>

    <hr>

    <!-- Shop Details -->
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="section-title mb-0"><i class="bi bi-shop me-1"></i>Shop Details</h5>
    <a href="{{route('user.shop.details')}}" class="btn btn-outline-success">
        <i class="bi bi-pencil-square me-1"></i>Add Branch
    </a>  
</div>
  @foreach($details as $detail)
    <div class="row mb-3">
       <div class="col-md-4"><strong>Branch ID:</strong></div>
      <div class="col-md-8">{{$detail->branch_unique_id}}</div>
      <div class="col-md-4"><strong>Shop Name:</strong></div>
      <div class="col-md-8">{{$detail->shop_name}}</div>
      <div class="col-md-4"><strong>Registered On:</strong></div>
      <div class="col-md-8">{{$detail->created_at}}</div>
      <div class="col-md-4"><strong>Address:</strong></div>
      <div class="col-md-8">{{$detail->address}}</div>
      <div class="col-md-4"><strong>Pincode:</strong></div>
      <div class="col-md-8">{{$detail->pincode}}</div>
      <div class="col-md-4"><strong>City:</strong></div>
      <div class="col-md-8">{{$detail->city}}</div>
    </div>
    @endforeach

@endsection