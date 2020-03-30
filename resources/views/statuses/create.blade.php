@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('statuses.store') }}" method="POST" class="col-12">
                @csrf

                Name:
                <br />
                <input type="text" name="name" class="form-control" />

                Color:
                <br />
                <input type="color" name="color" class="form-control" />

                Order:
                <br />
                <input type="text" name="order" class="form-control" />

                <br />
                <input type="submit" class="btn btn-primary" value="Save">
            </form>
        </div>
    </div>
@endsection
