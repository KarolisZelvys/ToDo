@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('statuses.update', $status->id) }}" method="POST">
                @method('PUT')
                @csrf

                Name:
                <br />
                <input type="text" name="name" value="{{ $status->name }}" class="form-control" />

                <br />
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>s
    </div>
@endsection
