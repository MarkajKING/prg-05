@extends('layouts/app')
@section('headTitle', $headTitle)
@section('content')

    <h1 class="text-center">All {{$headTitle}}</h1>

    <table class="table" style="margin-left: 20px">
        <th scope="col">Title</th>
        <th scope="col">Film</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        @if($auth === true)
            <th scope="col">Actions</th>
        @endif
        @foreach($starwarsParts as $starwarsPart)
            <tr>
                <td>{{$starwarsPart->title}}</td>
                <td>{{$starwarsPart->film}}</td>
                <td>{{$starwarsPart->description}}</td>
                <td>{{$starwarsPart->image}}</td>

                @if($auth === true)
                    <td>
                        <div class="btn-group">
                            <a href="edit/{{$starwarsPart->id}}" class="btn btn-warning"
                               style="margin-right: 20px">Edit</a>
                            <a href="delete/{{$starwarsPart->id}}" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
    <a href="/usersView" style="margin-left: 20px">Naar overzicht van Users</a>

@endsection
