@extends('layouts/app')
@section('headTitle', $headTitle)
@section('content')

    <h1 class="text-center">All {{$headTitle}}</h1>

    <table class="table">
        <th scope="col">Title</th>
        <th scope="col">Film</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Delete</th>
    @foreach($starwarsParts as $starwarsPart)
            <tr>
                <td>{{$starwarsPart->title}}</td>
                <td>{{$starwarsPart->film}}</td>
                <td>{{$starwarsPart->description}}</td>
                <td>{{$starwarsPart->image}}</td>
                <td> <div class="btn-group">
                        <a href="delete/{{$starwarsPart->id}}">Delete</a>
                    </div></td>
            </tr>

    @endforeach
    </table>
    <a href="/usersView">Naar overzicht van Users</a>

@endsection
