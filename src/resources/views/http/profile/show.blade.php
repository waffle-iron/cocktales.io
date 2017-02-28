@extends('http.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="profile-pic">

                    <p class="slogan">"{{ $profile->getSlogan() }}"</p>

                    <img src="{{ url('/uploads/avatars/' . 'default.jpg') }}" class="img-responsive" style="border-radius:80px; height:300px; width:300px">

                </div>

                <div class="profile-info">

                    <p class="profile-title">{{ $user->getUsername() }}</p>

                    <p class="location">{{ $profile->getLocation() }}</p>

                    <p class="drink">{{ $profile->getFavouriteDrink() }}</p>

                    <p class="name">{{ $user->getName() }}</p>

                    <p class="email">{{ $user->getEmail() }}</p>

                </div>

            </div>

            <div class="col-md-8 well">



            </div>

        </div>
    </div>
@endsection