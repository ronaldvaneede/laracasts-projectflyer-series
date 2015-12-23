@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1>{!! $flyer->street !!}</h1>
            <h1>{!! $flyer->price !!}</h1>

            <hr>

            <div class="description">
                {!! nl2br($flyer->description) !!}
            </div>
        </div>

        <div class="col-md-9">
            @foreach($flyer->photos as $photo)
                <img src="{{ $photo->photo }}" alt="" />
            @endforeach
        </div>

    </div>

    <hr>

    <h2>Add your photos</h2>

    <form id="addPhotosForm"
          class="dropzone"
          action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
          method="post"
    >
        {{ csrf_field() }}
    </form>
@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFileSize: 3,
            accpetedFiles: '.jpg, .jpeg, .png, .gif'
        }
    </script>
@endsection

@section('styling')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">
@endsection
