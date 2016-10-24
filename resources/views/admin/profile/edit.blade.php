@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($profile, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.profile.update', $profile->id))) !!}

<div class="form-group">
    {!! Form::label('user_id', 'User_id*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('user_id', $user, old('user_id',$profile->user_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('address', 'Address', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('address', old('address',$profile->address), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('phone', 'Phone', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', old('phone',$profile->phone), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('website', 'Website', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('website', old('website',$profile->website), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('photo', 'Photo', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('photo') !!}
        {!! Form::hidden('photo_w', 4096) !!}
        {!! Form::hidden('photo_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('about', 'About', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('about', old('about',$profile->about), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.profile.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection