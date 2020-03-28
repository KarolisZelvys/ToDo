@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @method('PUT')
                @csrf

                Name:
                <br />
                <input type="text" name="name" class="form-control" value="{{ $task->name }}"/>

                Description:
                <br />
                <textarea name="description">{{ $task->description }}</textarea>
                <br />
                User:
                <br />
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id == $task->user_id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
                <br />
                Status:
                <br />
                <select name="status_id" class="form-control">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" @if ($status->id == $task->status_id) selected @endif>{{ $status->name }}</option>
                    @endforeach
                </select>

                <br />
                <input type="submit" class="btn btn-primary" value="Save">
            </form>
        </div>
    </div>
@endsection
