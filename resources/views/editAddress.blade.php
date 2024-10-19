@extends('layouts.app')

@section('title','Edit Address')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Laravel User Address') }}</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('addresses.update', $address->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-center align-items-center vh-50">
                    <div class="row g-3">
                        
                        <div class="col-md-8">
                            <label for="address" class="form-label">Recent Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $address->address_line ) }}" placeholder="1234 Main St" required>
                        </div>
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update Address</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary ms-5">Cancel</a>
                        </div>
                    </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection