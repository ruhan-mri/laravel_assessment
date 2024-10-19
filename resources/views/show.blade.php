@extends('layouts.app')

@section('title','User Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Laravel Single User Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $user->name }}</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <strong>Age:</strong> {{ $user->age }}
                            </div>
                            <div class="mb-3">
                                <strong>Email:</strong> {{ $user->email }}
                            </div>
                            <div class="mb-3">
                                <strong>Recent Address:</strong> {{ $recentAddress ? $recentAddress->address_line : 'No address available'  }}
                            </div>
                            <div class="mb-3">
                                <strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}
                            </div>
                            <div class="mb-3">
                                <strong>Updated At:</strong> {{ $user->updated_at->format('Y-m-d H:i:s') }}
                            </div>
                            <div class="container mt-4">
                                <h2>List of Addresses:</h2>

                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->addresses as $address)
                                        <tr>
                                            <td>
                                                {{ $address->address_line }}
                                            </td>
                                            <td>
                                                <a href="{{ route('addresses.edit', $address) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('addresses.destroy', $address) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            @if ($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}" height="150px" width="150px" alt="{{ $user->name }}" class="img-fluid rounded">
                            @else
                            <img src="{{ asset('storage/images/user.jpeg') }}" height="150px" width="150px" alt="Placeholder Image" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back to User List</a>
                        <a href="{{ route('edit', $user->id) }}" class="btn btn-warning ms-4">Edit</a>
                        <a href="{{ route('address.create', $user->id) }}" class="btn btn-primary ms-4">Add More Address</a>
                        <a href="{{ route('addresses.trash', $user->id) }}" class="btn btn-danger ms-4">Trash Address</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection