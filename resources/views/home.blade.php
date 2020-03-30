@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <front-page></front-page>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
