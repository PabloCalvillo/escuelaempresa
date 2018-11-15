@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center text-mute"> {{ __("Ciclos") }} 
	@if(Auth::user()->email == 'admin@admin.com')
	<a style="float:right;" href="<?=URL::route('addGrade');?>"><i class="fas fa-graduation-cap"></i>+</a>
	@endif
	</h1>
	@forelse($grades as $grade)
	<div class="panel panel-default">
	<div class="panel-heading">
	@if(Auth::user()->email == 'admin@admin.com')
	<a href="../grades/edit/{{ $grade->id }}"> {{ $grade->name }}</a>
	@else
	{{ $grade->name }}
	@endif
	<form method="POST" action="../grades/remove/{{ $grade->id }}" style="float:right;margin:0;">
	{{ method_field('DELETE') }} 
	{{ csrf_field() }}
	@if(Auth::user()->email == 'admin@admin.com')
	<button type="submit" style="margin-top:-6px;margin-right:-8px;"><i class="far fa-trash-alt"></i></button>
	@endif
	</form>
	</div>
	<div class="panel-body">
	Nivel: {{ $grade->level }}
	</div>
	</div>
		@empty
		<div class="alert alert-danger">
			{{ __("No hay ningún ciclo en este momento") }}
		</div>
		@endforelse
		@if($grades->count())
			<div style='text-align:center;'>
				{{ $grades->links() }}
			</div>
		@endif
	</div>
</div>
@endsection