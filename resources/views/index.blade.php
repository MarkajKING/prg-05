@extends('layouts/web')
@section('headTitle', $headTitle)
@section('content')

    <h1>All {{$headTitle}}</h1>

    <table>
        <th>Title</th>
        <th>Film</th>
        <th>Description</th>
        <th>Image</th>
    @foreach($starwarsParts as $starwarsPart)
            <tr>
                <td>{{$starwarsPart->title}}</td>
                <td>{{$starwarsPart->film}}</td>
                <td>{{$starwarsPart->description}}</td>
                <td>{{$starwarsPart->image}}</td>
            </tr>

    @endforeach
    </table>
    <a href="/about">Naar about</a>

@endsection
