@extends('layouts.app')

@section('content')
    <div class="container justify-content-center w-50">
        <div class="card row text-center">
            @if($profile)
                <div class="card-header">
                    {{$profile->name}} {{$profile->surname}}
                </div>
                <div class="card-body">
                    <img src="{{ $profile->getProfilePicture() }}" alt="profile picture" width="580" height="360">
                </div>
                <div class="card-body">
                    <a href="{{ route('match.like', $profile) }}" class="mr-5">
                        <button type="button" class="btn btn-success">Like</button>
                    </a>
                    <a href="{{ route('match.dislike', $profile) }}" class="ml-5">
                        <button type="button" class="btn btn-danger">Dislike</button>
                    </a>
                </div>
            @else
                <div class="card-body">
                    Seems there is no users to show :(
                </div>
        </div>
        @endif
    </div>

@endsection
