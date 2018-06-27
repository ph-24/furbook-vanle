@extends('layouts.master')
@section('header')
	<h2>Edit a cat</h2>
@stop
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
	{!! Form::model($cat, ['url' =>route('cat.update',$cat->id), 'method' => 'put']) !!}
		@include('partials.forms.cat')
	{!! Form::close() !!}
@stop
