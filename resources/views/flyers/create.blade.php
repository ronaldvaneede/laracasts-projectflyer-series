@extends('layout')

@section('content')
    <h1>Selling your home?</h1>

    <hr/>

    <div class="row">
        <form enctype="multipart/form-data" method="post" action="/flyers" class="col-md-6">
            @include('flyers.form')

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
