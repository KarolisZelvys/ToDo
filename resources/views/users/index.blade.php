@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Is admin</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"> {{ $user->id }}</th>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->is_admin }} </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form method='POST' action='{{ route('users.destroy', $user->id) }}' class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
