@extends('layouts/app')
@section('headTitle', $headTitle)
@section('content')

    <div class="col-sm-6">
        <div class="card text-white bg-dark mb-3" style="margin-left: 20px">
            <div class="card-body">
                <h4 class="card-title">{{$starwarsPart->title}}</h4>
                <p class="card-text">{{$starwarsPart->film}}</p>
                <p class="card-text">{{$starwarsPart->description}}</p>
                <p class="card-text">{{$starwarsPart->image}}</p>
                @foreach($starwarsPart->tags as $tag)
                    <p>{{$tag->name}}</p>
                @endforeach()


                <a href="{{route('starwars-part.index')}}" class="btn btn-primary">Back to Index</a>
            </div>
        </div>
    </div>
@endsection
