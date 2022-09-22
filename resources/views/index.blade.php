@extends('layouts/web')
@section('headTitle', $headTitle)
@section('content')

    <h1>{{$headTitle}}</h1>

    <a href="/about">Naar about</a>

    @foreach($starwarsParts as $starwarsPart)
    <tr>
        <td>{{$starwarsPart->title}}</td>
    </tr>
    @endforeach
@endsection
