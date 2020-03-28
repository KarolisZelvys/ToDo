@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <front-page></front-page>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
