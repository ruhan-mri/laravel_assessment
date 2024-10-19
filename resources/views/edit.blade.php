@extends('layouts.app')

@section('title','Edit User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Laravel User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
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
                <form action="{{ route('update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-center align-items-center vh-50">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" name="age" class="form-control" id="age" value="{{ old('age', $user->age) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label">Recent Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->recentAddress->address_line ) }}" placeholder="1234 Main St" required>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">Upload New Image (optional)</label>
                            <input type="file" name="image" class="form-control" id="image" accept="image/*">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update User</button>
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