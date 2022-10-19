@extends('layouts/app')
@section('headTitle', $headTitle)
@section('content')

    <h1 class="text-center" style="margin-bottom: 20px">All {{$headTitle}}</h1>

    <span style="color:red">@if ($errorMessage != '')
            {{$errorMessage}}
        @else
        @endif</span>

    <h3 class="text-center" style="margin-bottom: 10px">Search:</h3>
    <form method="get" action="{{route('search.index')}}">
        @csrf
        <div class="input-group" style="width: 80%; margin: auto">
            <input name="part" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon"/>
        </div>
    </form>

    <h3 style="margin-bottom: 10px; margin-top: 30px">Filter on tags</h3>
    @foreach($tags as $tag)
        <div class="btn-group" role="group" style="margin-top: 20px">
            <a href="{{route('search.show', $tag->name)}}" type="button"
               class="btn btn-outline-info">{{$tag->name}}</a>
        </div>
    @endforeach



    <table class="table" style="margin-left: 20px; margin-top: 30px">
        <th scope="col">Title</th>
        <th scope="col">Film</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Tags</th>
        <th scope="col">Actions</th>
        @foreach($starwarsParts as $starwarsPart)
            <tr>
                <td>{{$starwarsPart->title}}</td>
                <td>{{$starwarsPart->film}}</td>
                <td>{{$starwarsPart->description}}</td>
                <td>{{$starwarsPart->image}}</td>
                <td>
                    @foreach($starwarsPart->tags as $tag)
                        {{$tag->name}}
                    @endforeach
                </td>


                <td>
                    <div class="btn-group">
                        <a href="{{route('starwars-part.show', $starwarsPart->id)}}" class="btn btn-info"
                           style="margin-right: 20px">Details</a>

                        @if(Auth::user()->is_admin)
                            <a href="{{route('starwars-part.edit', $starwarsPart->id)}}" class="btn btn-success"
                               style="margin-right: 20px">Edit</a>
                            <form action="{{ route('starwars-part.destroy', $starwarsPart->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                    </div>
                </td>
                @endif
            </tr>
        @endforeach
    </table>

@endsection
