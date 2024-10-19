@extends('layouts.app')

@section('title','Delete User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Laravel Users Trash List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                @if($users->isEmpty())
                <div class="alert alert-info">
                    <h2 text-center>No Deleted User Found -_-</h2>
                </div>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Adress</th>
                            <th>Deleted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
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
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->deleted_at }}</td>
                            <td>
                                <form action="{{ route('restore', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                <form action="{{ route('force_delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to permanently delete this user?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                <a href="{{ route('home') }}" class="btn btn-primary">Back to User List</a>


            </div>
        </div>
    </div>
</div>
@endsection