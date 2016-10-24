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

{!! Form::model($portfolio1, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.portfolio1.update', $portfolio1->id))) !!}

<div class="form-group">
    {!! Form::label('catportfolio_id', 'cat_id*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('catportfolio_id', $catportfolio, old('catportfolio_id',$portfolio1->catportfolio_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('title', 'Title*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title', old('title',$portfolio1->title), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('desc', 'Deskripsi', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('desc', old('desc',$portfolio1->desc), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('pict', 'Picture tumbnail', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('pict') !!}
        {!! Form::hidden('pict_w', 4096) !!}
        {!! Form::hidden('pict_h', 4096) !!}
        <p class="help-block">Tumbnail picture (SQUARE)</p>
    </div>
</div><div class="form-group">
    {!! Form::label('detpict', 'Detail Picture', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('detpict') !!}
        {!! Form::hidden('detpict_w', 4096) !!}
        {!! Form::hidden('detpict_h', 4096) !!}
        <p class="help-block">Original Picture</p>
    </div>
</div><div class="form-group">
    {!! Form::label('complete', 'Complete', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('complete', old('complete',$portfolio1->complete), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('client', 'Client', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('client', old('client',$portfolio1->client), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('isi', 'Isi', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('isi', old('isi',$portfolio1->isi), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('url', 'Url', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('url', old('url',$portfolio1->url), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.portfolio1.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection