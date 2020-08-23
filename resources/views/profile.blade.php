@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-around">
            <div class="w-25">
                <img src="{{ $user->getProfilePicture() }}" width="250px" height="250px" class="rounded float-left"
                     alt="profile image">
            </div>

            <div class="card row text-center w-75">
                <div class="card-header">
                    Your profile information
                </div>
                <form method="post" action=" {{ route('profile.update') }} " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row pt-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder=" {{ $user->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="surname" name="surname"
                                   placeholder=" {{ $user->surname }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder=" {{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Your new password">
                        </div>
                    </div>

                    <div class="form-group row pb-2">
                        <label for="age" class="col-sm-2 col-form-label">Your age</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="age" name="age"
                                   placeholder=" {{ $user->age }}">
                        </div>
                    </div>

                    <div class="form-group row pb-2">
                        <label for="location" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="location" name="location"
                                   placeholder=" {{ $user->location }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="gender" name="gender">
                                @if($user->gender === 'men')
                                    <option value="men"> {{ $user->gender }}</option>
                                    <option value="women"> women</option>
                                @elseif ($user->gender === 'women')
                                    <option value="women"> {{ $user->gender }}</option>
                                    <option value="men"> men</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="min_age" class="col-sm-2 col-form-label">Age limit from</label>
                        <input type="number" name="min_age" id="min_age" value="{{ $user->min_age }}" min="18"
                               max="{{ $user->max_age }}">

                    </div>

                    <div class="form-group row">
                        <label for="max_age" class="col-sm-2 col-form-label">Age limit to </label>
                        <input type="number" name="max_age" id="max_age" value="{{ $user->max_age }}"
                               min="{{$user->min_age}}" max="65">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">Searching for</div>
                        <div class="col-sm-3">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="looking_male" name="looking_male"
                                       value="1" {{ ($user->looking_male == 1 ? ' checked' : ' ') }}>
                                <label class="form-check-label" for="looking_male">
                                    Men
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="looking_female"
                                       name="looking_female"
                                       value="1" {{ ($user->looking_female == 1 ? ' checked' : ' ') }}>
                                <label class="form-check-label" for="looking_female">
                                    Women
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Apply changes</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

@endsection
