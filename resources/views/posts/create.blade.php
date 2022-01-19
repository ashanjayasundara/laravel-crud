@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="pt-4">Add New Posts</h1>
                <form method="POST" action="/p" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Post Caption</label>
                        <input id="caption" type="text"
                               class="form-control @error('caption') is-invalid @enderror" name="caption"
                               value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label">Post Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row pt-4">
                        <button class="btn btn-primary">Add New Post</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
