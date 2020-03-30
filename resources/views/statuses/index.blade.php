@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row col-12">
            <a href="{{ route('statuses.create') }}" class="btn btn-primary">New Status</a>
            <br /><br />
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Order</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($statuses as $status)
                    <tr>
                        <th scope="row"> {{ $status->id }}</th>
                        <td> {{ $status->name }}</td>
                        <td>
                            <div style="background-color: {{ $status->color }}">{{ $status->color }}</div>
                        </td>
                        <td> {{ $status->order }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('statuses.edit', $status->id) }}">Edit</a>
                            <form action='{{ route('statuses.destroy', $status->id) }}' method="POST" class="d-inline">
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
