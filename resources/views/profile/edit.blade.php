@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
            <div class="col-8 offset-2">
                <h1 class="pt-4">Edit Profile</h1>
                <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Title</label>
                        <input id="title" type="text"
                               class="form-control @error('caption') is-invalid @enderror" name="title"
                               value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Description</label>
                        <input id="description" type="text"
                               class="form-control @error('caption') is-invalid @enderror" name="description"
                               value="{{ old('description') ?? $user->profile->description}}"  autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">URL</label>
                        <input id="url" type="text"
                               class="form-control @error('caption') is-invalid @enderror" name="url"
                               value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                        @error('url')
                                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
