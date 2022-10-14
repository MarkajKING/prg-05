@extends('layouts.app')
@section('content')
    <table class="table">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
        </tr>
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
    </table>

    <a href="{{route('user.edit', $user->id)}}" class="btn btn-success"
       style="margin-right: 20px">Edit</a>
@endsection
