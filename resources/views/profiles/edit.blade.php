<?php

$currentSkills = $user->skills->map(function($items){
        $data['id'] = $items->id;
        $data['text'] = $items->title;
   return $data;
});

?>
@extends('layouts.inner')

@section('template_title')
    {{ trans('profile.templateTitle') }}
@endsection

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.17.0"></script>
@endsection

@section('innercontent')

    <div class="p-table p-table_bg hidden-tablet" id="table-skill">
        <div class="p-table__nav">
            <div class="p-table__tab type-h2">Account</div>
            <div class="p-table__tab type-h2 p-table__tab_active">Profile</div>
        </div>
        <div class="p-table__content p-table__content_pd">

            <div class="p-table__content-item" id="account">
                <div class="main-setting ">

                    {!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'id' => 'user_basics_form', 'class' => 'main-setting__form')) !!}
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Username</label>
                        {!! Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-group__input', 'placeholder' => 'Username')) !!}
                    </div>


                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">First name</label>
                        {!! Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-group__input', 'placeholder' => 'First name')) !!}
                    </div>
                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Last name</label>
                        {!! Form::text('last_name', old('last_name'), array('id' => 'last_name', 'class' => 'form-group__input', 'placeholder' => 'Last name')) !!}
                    </div>

                    <div class="main-setting__footer">
                        {!! Form::button(
                        '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitButton'),
                        array(
                        'class'             => 'btn btn_accent type-h3_m',
                        'type'              => 'submit',
                        )) !!}

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>

            <div class="p-table__content-item p-table__content-item_active" id="profile">
                <div class="main-setting ">

                    {!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name], 'id' => 'user_profile_form', 'class' => 'main-setting__form', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}

                    <profile-edit-form-skill :value="{{$user->skills->pluck('id')}}"
                                             :options="{{$currentSkills}}"
                    ></profile-edit-form-skill>
                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="date">Date of Birth</label>
                        {!! Form::date('birthday', old('birthday'), array('id' => 'birthday', 'class' => 'form-group__input' )) !!}

                    </div>
                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Location</label>
                        {!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-group__input', 'placeholder' => 'Location')) !!}
                    </div>

                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Country</label>
                        {!! Form::text('country', old('country'), array('id' => 'country', 'class' => 'form-group__input', 'placeholder' => 'Country')) !!}
                    </div>
                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Administrative</label>
                        {!! Form::text('administrative', old('administrative'), array('id' => 'administrative', 'class' => 'form-group__input', 'placeholder' => 'Administrative')) !!}
                    </div>
                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">City</label>
                        {!! Form::text('city', old('city'), array('id' => 'city', 'class' => 'form-group__input', 'placeholder' => 'City')) !!}
                    </div>
                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Address</label>
                        {!! Form::text('address', old('address'), array('id' => 'address', 'class' => 'form-group__input', 'placeholder' => 'Address')) !!}
                    </div>


                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Bio</label>
                        {!! Form::textarea('bio', old('bio'), array('id' => 'bio', 'class' => 'form-group__textarea', 'placeholder' => trans('profile.ph-bio'))) !!}
                    </div>

                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Twitter</label>
                        {!! Form::text('twitter_username', old('twitter_username'), array('id' => 'twitter_username', 'class' => 'form-group__input', 'placeholder' => trans('profile.ph-twitter_username'))) !!}
                    </div>


                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Github</label>
                        {!! Form::text('github_username', old('github_username'), array('id' => 'github_username', 'class' => 'form-group__input', 'placeholder' => trans('profile.ph-github_username'))) !!}
                    </div>
                    <div class="form-group">
                        <label class="form-group__label type-h3 type-h4_m c-g" for="">Facebook</label>
                        {!! Form::text('facebook_username', old('facebook_username'), array('id' => 'facebook_username', 'class' => 'form-group__input', 'placeholder' => trans('profile.ph-facebook_username'))) !!}
                    </div>


                    <div class="main-setting__footer">
                        {!! Form::button(
                        '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitButton'),
                        array(
                        'id'                => 'confirmFormSave',
                        'class'             => 'btn btn_accent type-h3_m',
                        'type'              => 'submit',
                        )) !!}


                    </div>


                    {!! Form::close() !!}

                    <hr/>
                    <h2>Upload photo</h2>

                    <div class="dz-preview"></div>
                    {!! Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                    <img id="user_selected_avatar" class="user-avatar"
                         src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatar }} @endif"
                         alt="{{ $user->name }}">
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

@section('footer_scripts')

    @include('scripts.user-avatar-dz')

    <script>


        $(function () {
            //return
            console.log('test JQUERY')

            var placesAutocomplete = places({
                appId: 'plG6QXURCQFH',
                apiKey: '58becffed1ae12755f1596ac819793b5',
                container: document.querySelector('#location'),
                templates: {
                    value: function (suggestion) {
                        return suggestion.name;
                    }
                }
            }).configure({
                type: 'address'
            });
            placesAutocomplete.on('change', function resultSelected(e) {
                console.log(e.suggestion)
                document.querySelector('#country').value = e.suggestion.country || '';
                document.querySelector('#administrative').value = e.suggestion.administrative || '';
                document.querySelector('#city').value = e.suggestion.city || '';
                document.querySelector('#address').value = e.suggestion.name || '';

            });
        })
    </script>

@endsection

<?php /*
  <div class="container">
  <div class="row">
  <div class="col-12">
  <div class="card border-0">
  <div class="card-body p-0">
  @if ($user->profile)
  @if (Auth::user()->id == $user->id)
  <div class="container">
  <div class="row">
  <div class="col-12 col-sm-4 col-md-3 profile-sidebar text-white rounded-left-sm-up">
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" data-toggle="pill" href=".edit-profile-tab" role="tab" aria-controls="edit-profile-tab" aria-selected="true">
  {{ trans('profile.editProfileTitle') }}
  </a>
  <a class="nav-link" data-toggle="pill" href=".edit-settings-tab" role="tab" aria-controls="edit-settings-tab" aria-selected="false">
  {{ trans('profile.editAccountTitle') }}
  </a>
  <a class="nav-link" data-toggle="pill" href=".edit-account-tab" role="tab" aria-controls="edit-settings-tab" aria-selected="false">
  {{ trans('profile.editAccountAdminTitle') }}
  </a>
  </div>
  </div>
  <div class="col-12 col-sm-8 col-md-9">
  <div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active edit-profile-tab" role="tabpanel" aria-labelledby="edit-profile-tab">
  <div class="row mb-1">
  <div class="col-sm-12">
  <div id="avatar_container">
  <div class="collapseOne card-collapse collapse @if($user->profile->avatar_status == 0) show @endif">
  <div class="card-body">
  <img src="{{  Gravatar::get($user->email) }}" alt="{{ $user->name }}" class="user-avatar">
  </div>
  </div>
  <div class="collapseTwo card-collapse collapse @if($user->profile->avatar_status == 1) show @endif">
  <div class="card-body">
  <div class="dz-preview"></div>
  {!! Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
  <img id="user_selected_avatar" class="user-avatar" src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatar }} @endif" alt="{{ $user->name }}">
  {!! Form::close() !!}
  </div>
  </div>
  </div>
  </div>
  </div>
  {!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name], 'id' => 'user_profile_form', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
  {{ csrf_field() }}
  <div class="row">
  <div class="col-10 offset-1 col-sm-10 offset-sm-1 mb-1">
  <div class="row" data-toggle="buttons">
  <div class="col-6 col-xs-6 right-btn-container">
  <label class="btn btn-primary @if($user->profile->avatar_status == 0) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne:not(.show), .collapseTwo.show">
  <input type="radio" name="avatar_status" id="option1" autocomplete="off" value="0" @if($user->profile->avatar_status == 0) checked @endif> Use Gravatar
  </label>
  </div>
  <div class="col-6 col-xs-6 left-btn-container">
  <label class="btn btn-primary @if($user->profile->avatar_status == 1) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne.show, .collapseTwo:not(.show)">
  <input type="radio" name="avatar_status" id="option2" autocomplete="off" value="1" @if($user->profile->avatar_status == 1) checked @endif> Use My Image
  </label>
  </div>
  </div>
  </div>
  </div>
  <div class="form-group has-feedback {{ $errors->has('theme') ? ' has-error ' : '' }}">
  {!! Form::label('theme_id', trans('profile.label-theme') , array('class' => 'col-12 control-label')); !!}
  <div class="col-12">
  <select class="form-control" name="theme_id" id="theme_id">
  @if ($themes->count())
  @foreach($themes as $theme)
  <option value="{{ $theme->id }}"{{ $currentTheme->id == $theme->id ? 'selected="selected"' : '' }}>{{ $theme->name }}</option>
  @endforeach
  @endif
  </select>
  <span class="glyphicon {{ $errors->has('theme') ? ' glyphicon-asterisk ' : ' ' }} form-control-feedback" aria-hidden="true"></span>
  @if ($errors->has('theme'))
  <span class="help-block">
  <strong>{{ $errors->first('theme') }}</strong>
  </span>
  @endif
  </div>
  </div>
  <div class="form-group has-feedback {{ $errors->has('location') ? ' has-error ' : '' }}">
  {!! Form::label('location', trans('profile.label-location') , array('class' => 'col-12 control-label')); !!}
  <div class="col-12">
  {!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => trans('profile.ph-location'))) !!}
  <span class="glyphicon {{ $errors->has('location') ? ' glyphicon-asterisk ' : ' glyphicon-pencil ' }} form-control-feedback" aria-hidden="true"></span>
  @if ($errors->has('location'))
  <span class="help-block">
  <strong>{{ $errors->first('location') }}</strong>
  </span>
  @endif
  </div>
  </div>
  <div class="form-group has-feedback {{ $errors->has('bio') ? ' has-error ' : '' }}">
  {!! Form::label('bio', trans('profile.label-bio') , array('class' => 'col-12 control-label')); !!}
  <div class="col-12">
  {!! Form::textarea('bio', old('bio'), array('id' => 'bio', 'class' => 'form-control', 'placeholder' => trans('profile.ph-bio'))) !!}
  <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
  @if ($errors->has('bio'))
  <span class="help-block">
  <strong>{{ $errors->first('bio') }}</strong>
  </span>
  @endif
  </div>
  </div>
  <div class="form-group has-feedback {{ $errors->has('twitter_username') ? ' has-error ' : '' }}">
  {!! Form::label('twitter_username', trans('profile.label-twitter_username') , array('class' => 'col-12 control-label')); !!}
  <div class="col-12">
  {!! Form::text('twitter_username', old('twitter_username'), array('id' => 'twitter_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-twitter_username'))) !!}
  <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
  @if ($errors->has('twitter_username'))
  <span class="help-block">
  <strong>{{ $errors->first('twitter_username') }}</strong>
  </span>
  @endif
  </div>
  </div>
  <div class="margin-bottom-2 form-group has-feedback {{ $errors->has('github_username') ? ' has-error ' : '' }}">
  {!! Form::label('github_username', trans('profile.label-github_username') , array('class' => 'col-12 control-label')); !!}
  <div class="col-12">
  {!! Form::text('github_username', old('github_username'), array('id' => 'github_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-github_username'))) !!}
  <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
  @if ($errors->has('github_username'))
  <span class="help-block">
  <strong>{{ $errors->first('github_username') }}</strong>
  </span>
  @endif
  </div>
  </div>
  <div class="form-group margin-bottom-2">
  <div class="col-12">
  {!! Form::button(
  '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitButton'),
  array(
  'id'                => 'confirmFormSave',
  'class'             => 'btn btn-success disabled',
  'type'              => 'button',
  'data-target'       => '#confirmForm',
  'data-modalClass'   => 'modal-success',
  'data-toggle'       => 'modal',
  'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
  'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
  )) !!}

  </div>
  </div>
  {!! Form::close() !!}
  </div>

  <div class="tab-pane fade edit-settings-tab" role="tabpanel" aria-labelledby="edit-settings-tab">
  {!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'id' => 'user_basics_form')) !!}

  {!! csrf_field() !!}

  <div class="pt-4 pr-3 pl-2 form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
  {!! Form::label('name', trans('forms.create_user_label_username'), array('class' => 'col-md-3 control-label')); !!}
  <div class="col-md-9">
  <div class="input-group">
  {!! Form::text('name', $user->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))) !!}
  <div class="input-group-append">
  <label class="input-group-text" for="name">
  <i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i>
  </label>
  </div>
  </div>
  @if($errors->has('name'))
  <span class="help-block">
  <strong>{{ $errors->first('name') }}</strong>
  </span>
  @endif
  </div>
  </div>

  <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
  {!! Form::label('email', trans('forms.create_user_label_email'), array('class' => 'col-md-3 control-label')); !!}
  <div class="col-md-9">
  <div class="input-group">
  {!! Form::text('email', $user->email, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))) !!}
  <div class="input-group-append">
  <label for="email" class="input-group-text">
  <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }}" aria-hidden="true"></i>
  </label>
  </div>
  </div>
  @if ($errors->has('email'))
  <span class="help-block">
  <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
  </div>
  </div>

  <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
  {!! Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
  <div class="col-md-9">
  <div class="input-group">
  {!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
  <div class="input-group-append">
  <label class="input-group-text" for="first_name">
  <i class="fa fa-fw {{ trans('forms.create_user_icon_firstname') }}" aria-hidden="true"></i>
  </label>
  </div>
  </div>
  @if($errors->has('first_name'))
  <span class="help-block">
  <strong>{{ $errors->first('first_name') }}</strong>
  </span>
  @endif
  </div>
  </div>

  <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
  {!! Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
  <div class="col-md-9">
  <div class="input-group">
  {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
  <div class="input-group-append">
  <label class="input-group-text" for="last_name">
  <i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i>
  </label>
  </div>
  </div>
  @if($errors->has('last_name'))
  <span class="help-block">
  <strong>{{ $errors->first('last_name') }}</strong>
  </span>
  @endif
  </div>
  </div>

  <div class="form-group row">
  <div class="col-md-9 offset-md-3">
  {!! Form::button(
  '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitProfileButton'),
  array(
  'class'             => 'btn btn-success disabled',
  'id'                => 'account_save_trigger',
  'disabled'          => true,
  'type'              => 'button',
  'data-submit'       => trans('profile.submitProfileButton'),
  'data-target'       => '#confirmForm',
  'data-modalClass'   => 'modal-success',
  'data-toggle'       => 'modal',
  'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
  'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
  )) !!}
  </div>
  </div>
  {!! Form::close() !!}
  </div>

  <div class="tab-pane fade edit-account-tab" role="tabpanel" aria-labelledby="edit-account-tab">
  <ul class="account-admin-subnav nav nav-pills nav-justified margin-bottom-3 margin-top-1">
  <li class="nav-item bg-info">
  <a data-toggle="pill" href="#changepw" class="nav-link warning-pill-trigger text-white active" aria-selected="true">
  {{ trans('profile.changePwPill') }}
  </a>
  </li>
  <li class="nav-item bg-info">
  <a data-toggle="pill" href="#deleteAccount" class="nav-link danger-pill-trigger text-white">
  {{ trans('profile.deleteAccountPill') }}
  </a>
  </li>
  </ul>
  <div class="tab-content">

  <div id="changepw" class="tab-pane fade show active">

  <h3 class="margin-bottom-1 text-center text-warning">
  {{ trans('profile.changePwTitle') }}
  </h3>

  {!! Form::model($user, array('action' => array('ProfilesController@updateUserPassword', $user->id), 'method' => 'PUT', 'autocomplete' => 'new-password')) !!}

  <div class="pw-change-container margin-bottom-2">

  <div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
  {!! Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label')); !!}
  <div class="col-md-9">
  {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'), 'autocomplete' => 'new-password')) !!}
  @if ($errors->has('password'))
  <span class="help-block">
  <strong>{{ $errors->first('password') }}</strong>
  </span>
  @endif
  </div>
  </div>

  <div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
  {!! Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label')); !!}
  <div class="col-md-9">
  {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
  <span id="pw_status"></span>
  @if ($errors->has('password_confirmation'))
  <span class="help-block">
  <strong>{{ $errors->first('password_confirmation') }}</strong>
  </span>
  @endif
  </div>
  </div>
  </div>
  <div class="form-group row">
  <div class="col-md-9 offset-md-3">
  {!! Form::button(
  '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitPWButton'),
  array(
  'class'             => 'btn btn-warning',
  'id'                => 'pw_save_trigger',
  'disabled'          => true,
  'type'              => 'button',
  'data-submit'       => trans('profile.submitButton'),
  'data-target'       => '#confirmForm',
  'data-modalClass'   => 'modal-warning',
  'data-toggle'       => 'modal',
  'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
  'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
  )) !!}
  </div>
  </div>
  {!! Form::close() !!}

  </div>

  <div id="deleteAccount" class="tab-pane fade">
  <h3 class="margin-bottom-1 text-center text-danger">
  {{ trans('profile.deleteAccountTitle') }}
  </h3>
  <p class="margin-bottom-2 text-center">
  <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
  <strong>Deleting</strong> your account is <u><strong>permanent</strong></u> and <u><strong>cannot</strong></u> be undone.
  <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
  </p>
  <hr>
  <div class="row">
  <div class="col-sm-6 offset-sm-3 margin-bottom-3 text-center">

  {!! Form::model($user, array('action' => array('ProfilesController@deleteUserAccount', $user->id), 'method' => 'DELETE')) !!}

  <div class="btn-group btn-group-vertical margin-bottom-2 custom-checkbox-fa" data-toggle="buttons">
  <label class="btn no-shadow" for="checkConfirmDelete" >
  <input type="checkbox" name='checkConfirmDelete' id="checkConfirmDelete">
  <i class="fa fa-square-o fa-fw fa-2x"></i>
  <i class="fa fa-check-square-o fa-fw fa-2x"></i>
  <span class="margin-left-2"> Confirm Account Deletion</span>
  </label>
  </div>

  {!! Form::button(
  '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> ' . trans('profile.deleteAccountBtn'),
  array(
  'class'             => 'btn btn-block btn-danger',
  'id'                => 'delete_account_trigger',
  'disabled'          => true,
  'type'              => 'button',
  'data-toggle'       => 'modal',
  'data-submit'       => trans('profile.deleteAccountBtnConfirm'),
  'data-target'       => '#confirmForm',
  'data-modalClass'   => 'modal-danger',
  'data-title'        => trans('profile.deleteAccountConfirmTitle'),
  'data-message'      => trans('profile.deleteAccountConfirmMsg')
  )
  ) !!}

  {!! Form::close() !!}

  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  @else
  <p>{{ trans('profile.notYourProfile') }}</p>
  @endif
  @else
  <p>{{ trans('profile.noProfileYet') }}</p>
  @endif

  </div>
  </div>
  </div>
  </div>
  </div>

  @include('modals.modal-form')
 * 
 */ ?>


@endsection
