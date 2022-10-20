@extends('layouts/app')
@section('content')
    <h1 class="text-center">{{$headTitle}}</h1>

    <table class="table" style="margin-left: 20px; margin-top: 30px">
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Edit admin</th>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

                <form action="{{ route('user.editAdmin', $user->id)}}" method="post" style="margin-left: 10px">
                    @method('PATCH')
                    @csrf
                    @if($user->is_admin)
                        <td>
                            <button class="btn btn-light" type="submit">Remove Admin Rights</button>
                        </td>
                    @else
                        <td>
                            <button class="btn btn-dark" type="submit">Add Admin Rights</button>
                        </td>
                    @endif

                </form>

            </tr>
        @endforeach
    </table>
@endsection
