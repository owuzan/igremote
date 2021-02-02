@extends('board.app')
@section('title', Lang::get('app.edit_profile'))
@php($user = Auth::user())
@section('head')
    <link rel="stylesheet" href="/assets/vendors/dropify/dist/dropify.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
@endsection
@section('body')
    <script src="/assets/vendors/inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="/assets/vendors/dropify/dist/dropify.min.js"></script>
    <script type="text/javascript">
        $(function () {
            'use strict';
            $('#profile_image').dropify();
            $('#cover_image').dropify();
        });

        (function ($) {
            'use strict';
            $(":input").inputmask();
        })(jQuery);
    </script>
@endsection
@section('content')
    @if(session('status'))
        @component('board.components.alert', ['type' => 'success'])
            {{ session('status') }}
        @endcomponent
    @endif
    @if($errors->all())
        @component('board.components.alert', ['type' => 'danger'])
            {{ 'Update failed.' }}
        @endcomponent
    @endif
    <div class="profile-page">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="profile-header">
                    <div class="cover">
                        <div class="gray-shade"></div>
                        <figure>
                            <img
                                    src="{{ $data['cover_image'] }}"
                                    class="img-fluid cover-image" alt="profile cover">
                        </figure>
                        <div class="cover-body d-flex justify-content-between align-items-center">
                            <div>
                                <img class="profile-pic"
                                     src="{{ $data['profile_image'] }}"
                                     alt="profile">
                                <span class="profile-name">{{ $user->name }}</span>
                            </div>
                            <div class="d-none d-md-block">
                                <a href="{{ route('profile.edit') }}"
                                   class="btn btn-success btn-icon-text btn-edit-profile">
                                    <i data-feather="edit"
                                       class="btn-icon-prepend"></i> {{ Lang::get('app.edit_profile') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div id="accordion" class="accordion w-100" role="tablist">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h6 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseOne"
                                   aria-expanded="false"
                                   aria-controls="collapseOne">
                                    Upload Profile Image
                                </a>
                            </h6>
                        </div>
                        <div id="collapseOne" class="collapse @error('profile_image'){{ 'show' }}@enderror"
                             role="tabpanel" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                @error('profile_image')
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @enderror
                                <form action="{{ route('upload.profile.image') }}" method="POST" enctype="multipart/form-data">
                                    @CSRF
                                    <div class="form-group">
                                        <input type="file" name="profile_image" id="profile_image">
                                    </div>
                                    <div class="form-group text-right">
                                        @if($user->profile_image)
                                            <a href="javascript:void(0)" onclick="$('#delete-profile-image').click();" class="btn btn-danger">Delete Profile Image</a>
                                        @endif
                                        <input type="submit" class="btn btn-success" value="{{ Lang::get('app.save') }}">
                                    </div>
                                </form>
                                @if($user->profile_image)
                                    <form action="{{ route('reset.profile.image') }}" method="POST" class="d-none">
                                        @CSRF
                                        <input type="submit" id="delete-profile-image" class="btn btn-danger" value="Delete">
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h6 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                   aria-expanded="false"
                                   aria-controls="collapseTwo">
                                    Upload Cover Image
                                </a>
                            </h6>
                        </div>
                        <div id="collapseTwo" class="collapse @error('cover_image'){{ 'show' }}@enderror"
                             role="tabpanel" aria-labelledby="headingTwo"
                             data-parent="#accordion">
                            <div class="card-body">
                                @error('cover_image')
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @enderror
                                <form action="{{ route('upload.cover.image') }}" method="POST" enctype="multipart/form-data">
                                    @CSRF
                                    <div class="form-group">
                                        <input type="file" name="cover_image" id="cover_image">
                                    </div>
                                    <div class="form-group text-right">
                                        @if($user->cover_image)
                                            <a href="javascript:void(0)" onclick="$('#delete-cover-image').click();" class="btn btn-danger">Delete Cover
                                                Image</a>
                                        @endif
                                        <input type="submit" class="btn btn-success" value="{{ Lang::get('app.save') }}">
                                    </div>
                                </form>
                                @if($user->cover_image)
                                    <form action="{{ route('reset.cover.image') }}" method="POST" class="d-none">
                                        @CSRF
                                        <input type="submit" id="delete-cover-image" class="btn btn-danger" value="Delete">
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ Lang::get('app.personal_information') }}</h4>
                        <p class="card-description">{{ Lang::get('app.personal_information_desc') }}</p>
                        <form action="{{ route('profile.update.personal') }}" method="POST">
                            @CSRF
                            <fieldset>

                                <div class="form-group @error('name'){{'has-danger'}}@enderror">
                                    <label for="name">{{ Lang::get('app.name') }}</label>
                                    <input id="name" class="form-control @error('name'){{'form-control-danger'}}@enderror" name="name" type="text" value="@if(!old('name')){{ $user->name }}@else{{ old('name') }}@endif">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group @error('email'){{'has-danger'}}@enderror">
                                    <label for="email">{{ Lang::get('app.email') }}</label>
                                    <input id="email" class="form-control @error('email'){{'form-control-danger'}}@enderror" name="email" value="@if(!old('email')){{ $user->email }}@else{{ old('email') }}@endif" data-inputmask="'alias': 'email'" im-insert="true">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group @error('phone'){{'has-danger'}}@enderror">
                                    <label for="phone">{{ Lang::get('app.phone') }}</label>
                                    <input class="form-control @error('phone'){{'form-control-danger'}}@enderror" name="phone" value="@if(!old('phone')){{ $user->phone }}@else{{ old('phone') }}@endif" placeholder="5XXXXXXXXX">
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group @error('birthday'){{'has-danger'}}@enderror">
                                    <label for="birthday">{{ Lang::get('app.birthday') }}</label>
                                    <input class="form-control @error('birthday'){{'form-control-danger'}}@enderror" name="birthday" value="@if(!old('birthday')){{ $user->birthday }}@else{{ old('birthday') }}@endif" data-inputmask-alias="99/99/9999">
                                    @error('birthday')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group @error('website'){{'has-danger'}}@enderror">
                                    <label for="website">{{ Lang::get('app.website') }}</label>
                                    <input id="website" class="form-control @error('website'){{'form-control-danger'}}@enderror" name="website" value="@if(!old('website')){{ $user->website }}@else{{ old('website') }}@endif">
                                    @error('website')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group @error('biography'){{'has-danger'}}@enderror">
                                    <label for="biography">{{ Lang::get('app.biography') }}</label>
                                    <input class="form-control @error('biography'){{'form-control-danger'}}@enderror" name="biography" id="biography" value="@if(!old('biography')){{ $user->biography }}@else{{ old('biography') }}@endif">
                                    @error('biography')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group @error('gender'){{'has-danger'}}@enderror">
                                    <label for="gender">{{ Lang::get('app.gender') }}</label>
                                    <select name="gender" id="gender" class="form-control @error('gender'){{'form-control-danger'}}@enderror">
                                        <option value="2" @if($user->gender == 2) selected @endif>{{ Lang::get('app.unknown') }}</option>
                                        <option value="1" @if($user->gender == 1) selected @endif>{{ Lang::get('app.male') }}</option>
                                        <option value="0" @if($user->gender == 0) selected @endif>{{ Lang::get('app.famale') }}</option>
                                    </select>
                                    @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group @error('city'){{'has-danger'}}@enderror">
                                    <label for="city">{{ Lang::get('app.city') }}</label>
                                    <input type="text" name="city" id="city" class="form-control @error('city'){{'form-control-danger'}}@enderror" value="@if(!old('city')){{ $user->city }}@else{{ old('city') }}@endif">
                                    @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="text-right">
                                    <input class="btn btn-success" type="submit" value="{{ Lang::get('app.save') }}">
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
