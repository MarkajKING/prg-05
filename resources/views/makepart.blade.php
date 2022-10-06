@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:20px">
                <h2 class="text-center">Make your own StarWars Part!</h2>
                <form action="{{route('starwars-part.store')}}" method="post">

                    @csrf

                    <div class="form-group" style="margin-top:20px">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title"
                               placeholder="Enter tilte of your moment"
                               value="{{old('title')}}">
                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <label for="">Film</label>
                        <input type="text" class="form-control" name="film"
                               placeholder="Enter the film of your moment"
                               value="{{old('film')}}">
                        <span style="color:red">@error('film'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <label for="">Description</label>
                        <input class="form-control form-control-lg" type="text" class="form-control"
                               name="description"
                               placeholder="Enter description of your moment" value="{{old('description')}}">
                        <span style="color:red">@error('description'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image"
                               placeholder="Enter image of your moment"
                               accept=".jpg,.jpeg,.png" value="{{old('image')}}">
                        <span style="color:red">@error('image'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
