@extends('layouts.app')

@section('title','Users List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Laravel Users List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="col-md-1">Image</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-1">Age</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-3">Address</th>
                            <th class="col-md-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                @if ($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" height="50px" width="50px" alt="{{ $user->name }}" class="img-fluid rounded">
                                @else
                                <img src="{{ asset('storage/images/user.jpeg') }}" height="50px" width="50px" alt="Placeholder Image" class="img-fluid rounded">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->recentAddress ? $user->recentAddress->address_line : 'No address available' }}</td>
                            <td>
                                <a href="{{ route('show', $user->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('softDelete', $user->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection