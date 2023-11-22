@extends('layouts.auth')
@section('content')
<div>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <h1> Testing Testing 123</h1>


</div>
@endsection
