@extends('layouts.adminHeader')
@section('content')


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div id="adminProduct" style="padding-top:20px"></div>
@endsection
