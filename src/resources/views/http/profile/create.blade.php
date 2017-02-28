@extends('http.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Profile</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ '/profile/create' }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Location</label>
                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Slogan</label>
                                <div class="col-md-6">
                                    <input id="slogan" type="text" class="form-control" name="slogan" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="favourite_drink" class="col-md-4 control-label">Favourite Drink</label>

                                <div class="col-md-6">
                                    <input id="favourite_drink" type="text" class="form-control" name="favourite_drink" required>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection