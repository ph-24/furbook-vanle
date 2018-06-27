@extends('layouts.master')

@section('header')
	@if (isset($breed))
		<a href="{{route('cat.index')}}">Back to the overview</a>
	@endif
<h2>
	All @if (isset($breed)){{ $breed->name  }}@endif Cats

	<a href="{{ route('cat.create') }}" class="btn btn-primary pull-right">
		Add a new cat
	</a>
</h2>
@stop
@section('content')
	@foreach ($cats as $cat)
	<div class="cat">
		<a href="{{ route('cat.show',$cat->id) }}">
			<strong>{{ $cat->name }}</strong> - {{ $cat->breed->name ?? 'Khong thuoc giog meo nao ca' }}
		</a>
	</div>
	@endforeach
@stop


