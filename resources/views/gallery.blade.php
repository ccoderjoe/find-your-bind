@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="w-25">
                <img src="{{ $user->getProfilePicture() }}" width="250px" height="250px" class="rounded float-left"
                     alt="profile image">
            </div>
            <div class="row justify-content-around w-50">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Add picture to gallery</div>
                        <div class="card-body">
                            <form method="post" action=" {{ route('gallery.add') }} " enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="picture"></label>
                                    <input type="file" class="form-control-file" id="picture" name="picture">
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row w-100 mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Gallery</div>
                        <div class="card-body">
                            @foreach( $pictures as $picture)
                                <img src="{{ $picture->getUrl() }}" class="rounded m-3" width="320px"
                                      alt="nice picture">
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
