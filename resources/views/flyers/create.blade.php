@extends('layout')

@section('content')
    <h1>Selling your home?</h1>

    <hr/>

    <form enctype="multipart/form-data" method="post" action="/flyers">
        @include('flyers.form')
    </form>
@endsection
