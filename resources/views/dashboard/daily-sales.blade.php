@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Add Your Daily Sales</h1>
<div class="container mt-4">

    {{-- Shop Form --}}
    <form action="{{route('user.saveDailySale')}}" method="POST">
        @csrf
        <!-- Shop Type -->
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Select Branch</label>
            <select name="branch_id" class="form-control" required>
                <option value="">-- Select Branch --</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Cash</label>
            <input type="number" name="cash_amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Online Amount</label>
            <input type="number" name="online_amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Your Daily Collection</label>
            <input type="number" name="collection" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Material Amount</label>
            <input type="number" name="material_amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Necessary Expenses</label>
            <input type="number" name="expense" class="form-control" required>
        </div>

        <!-- No of Branches (Hidden, Will be counted via JS) -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection