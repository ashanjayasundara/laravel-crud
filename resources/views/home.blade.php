@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="{{$user->profile->profileImage()}}"
                    class="rounded-circle" style="width: 150px;height: 150px;"/>
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex">
                         <h1>EMAPTA Learning System</h1>
                         <follow-component user-id="{{$user->id}}" follows="{{ $follows }}" ></follow-component>
                    </div>
                    <a href="/p/create">Add New Post</a>
                </div>
                @can('update',$user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
                <div class="d-flex">
                    <div style="padding-right: 15px;"><strong>{{$postCount}}</strong> posts</div>
                    <div style="padding-right: 15px;"><strong>{{$followersCount}}</strong> followers</div>
                    <div style="padding-right: 15px;"><strong>{{$followingCount}}</strong> followings</div>
                </div>
                <div class="pt-5">{{$user->profile->title}}</div>
                <div>We're a global community of millions of people learning to code together.
                    {{$user->profile->description}}
                </div>
                <div><a href="{{$user->profile->url}}"
                        style="text-decoration: none; font-weight: bold; ">{{$user->profile->url}}</a>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{$post->id}}">
                    <img
                        src="/storage/{{$post->image}}"
                        class="w-100">
                    </a>
                </div>
            @endforeach

{{--            <div class="col-4">--}}
{{--                <img--}}
{{--                    src="https://www.postplanner.com/hs-fs/hubfs/what-to-post-on-instagram.png?noresize&width=980&height=515&name=what-to-post-on-instagram.png"--}}
{{--                    class="w-100">--}}
{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <img--}}
{{--                    src="https://www.postplanner.com/hs-fs/hubfs/what-to-post-on-instagram.png?noresize&width=980&height=515&name=what-to-post-on-instagram.png"--}}
{{--                    class="w-100">--}}
{{--            </div>--}}
        </div>

        {{--    <div class="row justify-content-center">--}}
        {{--        <div class="col-md-8">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

        {{--                <div class="card-body">--}}
        {{--                    @if (session('status'))--}}
        {{--                        <div class="alert alert-success" role="alert">--}}
        {{--                            {{ session('status') }}--}}
        {{--                        </div>--}}
        {{--                    @endif--}}

        {{--                    {{ __('You are logged in!') }}--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}
    </div>
@endsection
