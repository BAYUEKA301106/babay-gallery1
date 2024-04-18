@extends('layouts.app')

@section('content')
    <h1>All Photos</h1>
    <div class="row">
        @foreach ($photos as $photo)
            <div class="col-md-3">
                <div class="card">
                    <img src="/storage/albums/{{ $photo->photo }}" class="card-img-top" alt="Photo">
                    <div class="card-body">
                        <h5 class="card-title">{{ $photo->title }}</h5>
                        <p class="card-text">{{ $photo->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
