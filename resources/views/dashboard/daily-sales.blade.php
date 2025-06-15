@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Add Your Daily Sales</h1>
<a href="{{ route('user.export.excel') }}" class="nav-link text-warning">
    Export Sale
</a>
<div class="container mt-4">

    {{-- Shop Form --}}
    <form action="{{route('user.save.daily.sale')}}" method="POST">
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
                @foreach($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->shop_name}} ({{$branch->address}})</option>
                @endforeach
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
            <div id="expenses-wrapper">
                <div class="expense-row d-flex mb-2">
                    <input type="text" name="expenses[0][expense_description]" class="form-control me-2" placeholder="e.g., Chocolate" required>
                    <input type="number" name="expenses[0][amount]" class="form-control me-2" placeholder="Amount" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary mt-2" id="add-expense">Add More</button>
        </div>


        <!-- No of Branches (Hidden, Will be counted via JS) -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection