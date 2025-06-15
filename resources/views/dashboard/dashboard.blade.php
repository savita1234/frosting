@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Welcome to the Dashboard</h1>

<div class="container">
    {{-- Filter Section --}}
    <div class="p-3 mb-4 rounded bg-light border">
        <form method="GET" action="{{ route('user.dashboard') }}">
            <div class="row g-3 align-items-end">
                <div class="col-auto">
                    <label for="branch_id" class="form-label">Select Branch:</label>
                    <select name="branch_id" id="branch_id" onchange="this.form.submit()"
                            class="form-select border border-dark text-black">
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $selectedBranchId == $branch->id ? 'selected' : '' }}>
                                {{ $branch->branch_unique_id }} ({{ $branch->shop_name }}, {{ $branch->address }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-auto">
                    <label for="date" class="form-label">Select Date:</label>
                    <input type="date" name="date" id="date" class="form-control border border-dark text-black"
                           value="{{ request('date') }}" onchange="this.form.submit()">
                </div>
            </div>
        </form>
    </div>

    {{-- Data Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Branch</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Sale</th>
                    <th scope="col">Daily Expense</th>
                    <th scope="col">Material Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salesData as $data)
                    <tr>
                        <td>{{$data->shop->branch_unique_id}} ({{$data->shop->shop_name}}, {{$data->shop->address}})</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->total_sale}}</td>
                        <td>{{$data->essentials_amount}}</td>
                        <td>{{$data->material_amount}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
