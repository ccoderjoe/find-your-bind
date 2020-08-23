@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="w-25">
                <img src=" {{ $user->getProfilePicture() }}" width="250px" height="250px" class="rounded float-left mb-5"
                     alt="profile image">

                <div class="card-body mt-5">
                    <a href="{{ route('match.like', $user) }}" class="mr-5">
                        <button type="button" class="btn btn-success">Like</button>
                    </a>
                    <a href="{{ route('match.dislike', $user) }}" class="ml-5">
                        <button type="button" class="btn btn-danger">Dislike</button>
                    </a>
                </div>
            </div>
            <div class="card row text-center w-75">
                <div class="card-header">
                    {{ $user->name }} Gallery
                </div>
                <div class="row row-cols-1 row-cols-md-3 m-3">
                    @foreach($pictures as $picture)
                        <div class="col mb-3 ">
                            <img src="{{ $picture->location }}" class="card-img-top" height="250" width="320"
                                 alt="Profile picture">
                        </div>
                    @endforeach
                </div>

            </div>

@endsection
