@extends('layouts.master')

@section('title', '500 Error')

@section('styles')
@parent
<link href="{{ asset('css/template/error.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page_title')
<div class="page-title">
    <h1>500
        <small>Server Error</small>
    </h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 page-500">
        <div class=" number font-red"> 500 </div>
        <div class=" details">
            <h3>Oops! Something went wrong.</h3>
            <p><strong>{{ $response }}</strong></p>
            <p><a href="{{ url('/') }}" class="btn red"> Return home </a></p>
        </div>
    </div>
</div>
@endsection