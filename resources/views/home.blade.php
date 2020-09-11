@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-around">
            <div class="w-25">
                <img src="{{ $user->getProfilePicture() }}" width="250px" height="250px" class="rounded float-left"
                     alt="profile image">
            </div>
            <div class="card row w-75 ">
                <div class="row row-cols-1 row-cols-md-3">
                    @foreach($profiles as $profile)
                        <div class="col mb-3 ">
                            <div class="card-body">
                                <img src="{{ $profile->getProfilePicture() }}" class="card-img-top"
                                     alt="Profile picture">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $profile['name'] }} , {{ $profile['age'] }}</h5>
                                    <p class="card-text">{{ $profile['description'] }}</p>
                                    <p class="card-text">From {{ $profile['location'] }}</p>
                                    <h6 class="card-text"><a href="{{ route('gallery.view', $profile['id']) }}">
                                            View gallery</a></h6>
                                </div>
                            </div>
                            <div class="card row w-75">

                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">Dashboard</div>

                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}</div>
                                            @endif

                                            You are logged in!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection
