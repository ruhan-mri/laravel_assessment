@extends('layouts.app')

@section('title', 'Deleted Addresses')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Laravel User Address Trash List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Address</th>
                                <th>Deleted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($trashedAddresses as $address) 
                            <tr>
                                <td>{{ $address->address_line }}</td>
                                <td>{{ $address->deleted_at }}</td>
                                <td>
                                    <form action="{{ route('address.restore', $address->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Restore Address</button>
                                    </form>
                                    <form action="{{ route('address.force_delete', $address->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to permanently delete this address?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No trashed addresses found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <a href="{{ route('show', $user->id) }}" class="btn btn-primary">Back to User</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
