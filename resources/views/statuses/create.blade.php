@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('statuses.store') }}" method="POST">
                @csrf

                Name:
                <br />
                <input type="text" name="name" class="form-control" />

                <br />
                <input type="submit" class="btn btn-primary" value="Save">
            </form>
        </div>
    </div>
@endsection
