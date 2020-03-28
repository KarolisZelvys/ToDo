@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="isAdmin">Is admin</label>
                    <input type="text" class="form-control" id="isAdmin" name="is_admin" value="{{ $user->is_admin }}">
                </div>
                <button type="submit" class="btn btn-primary">Update user</button>
            </form>
        </div>
    </div>
</div>

@endsection
