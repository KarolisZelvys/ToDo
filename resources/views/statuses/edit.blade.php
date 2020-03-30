@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('statuses.update', $status->id) }}" method="POST" class="col-12">
                @method('PUT')
                @csrf

                Name:
                <br />
                <input type="text" name="name" value="{{ $status->name }}" class="form-control" />

                Color:
                <br />
                <input type="color" name="color" value="{{ $status->color }}" class="form-control" />

                Order:
                <br />
                <input type="text" name="order" value="{{ $status->order }}" class="form-control" />

                <br />
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
@endsection
