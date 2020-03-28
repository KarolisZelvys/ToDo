@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                Name:
                <br />
                <input type="text" name="name" class="form-control" />

                Description:
                <br />
                <textarea name="description"></textarea>
                <br />
                Status:
                <br />
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <br />
                Status:
                <br />
                <select name="status_id" class="form-control">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>

                <br />
                <input type="submit" class="btn btn-primary" value="Save">
            </form>
        </div>
    </div>
@endsection
