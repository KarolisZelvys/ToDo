@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">New Task</a>
            <br /><br />

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Due date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <th scope="row"> {{ $task->id }}</th>
                        <td> {{ $task->name }}</td>
                        <td> {{ $task->user->name }}</td>
                        <td> {{ $task->due_date }}</td>
                        <td> {{ $task->status->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                            <form action='{{ route('tasks.destroy', $task->id) }}' method="POST" class="d-inline">
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
