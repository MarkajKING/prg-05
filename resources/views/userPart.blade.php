@extends('layouts/app')
@section('content')
    <table class="table">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Film</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
        </tr>
        @foreach($parts as $part)
            <tr>
                <td>{{$part->title}}</td>
                <td>{{$part->film}}</td>
                <td>{{$part->description}}</td>
                <td>{{$part->image}}</td>
                <td>
                    @foreach($part->tags as $tag)
                        {{$tag->name}}
                    @endforeach
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('starwars-part.edit', $part->id)}}" class="btn btn-success"
                           style="margin-right: 20px">Edit</a>
                        <a href="{{route('starwars-part.show', $part->id)}}" class="btn btn-info"
                           style="margin-right: 20px">Details</a>
                        <form action="{{ route('starwars-part.destroy', $part->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <form action="{{ route('starwars-part.enable', $part)}}" method="post" style="margin-left: 10px">
                            @method('PATCH')
                            @csrf
                            @if($part->show)
                                <button class="btn btn-light" type="submit">Remove from public</button>
                            @else
                                <button class="btn btn-dark" type="submit">Show on public</button>
                            @endif

                        </form>
                    </div>
                </td>
            </tr>
                @endforeach

    </table>
@endsection
