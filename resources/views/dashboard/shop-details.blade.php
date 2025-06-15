@extends('layouts.app')
@section('title', 'shopDetails')
@section('content')
<div class="container mt-4">
    <h2>Add Shop Details</h2>

    {{-- Shop Form --}}
    <form action="{{route('user.save.shop.details')}}" method="POST">
        @csrf

        <!-- Shop Name -->
        <div class="mb-3">
            <label class="form-label">Shop Name</label>
            <input type="text" name="shop_name" class="form-control" required>
        </div>

        <!-- Shop Type -->
        <div class="mb-3">
            <label class="form-label">Shop Type</label>
            <input type="text" name="shop_type" class="form-control" required>
        </div>

        <!-- No of Branches (Hidden, Will be counted via JS) -->
        <input type="hidden" name="no_of_branches" id="no_of_branches" value="1">

        <hr>

        <h4>Branches</h4>

        <div id="branches">
            <!-- First Branch (Default) -->
            <div class="branch-card" id="branch-1">
                <h5>Branch 1</h5>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" name="branches[0][address]" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City</label>
                        <input type="text" name="branches[0][city]" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label class="form-label">State</label>
                        <input type="text" name="branches[0][state]" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Country</label>
                        <input type="text" name="branches[0][country]" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pincode</label>
                        <input type="text" name="branches[0][pincode]" class="form-control" required>
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="button" class="btn btn-danger btn-sm remove-branch d-none">Remove</button>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" id="addBranch">+ Add Branch</button>

        <hr>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

@endsection
