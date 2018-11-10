@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Editar ciclo") }} </h1>
		<form method="POST" action="<?=URL::route('updateGrade');?>">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name" class="col-md-12 control-label">{{ __("Nombre") }}</label>
				<input id="name" class="form-control" name="name" value="{{ $grade->name }}" required />
			</div>
			<div class="form-group">
				<label for="level" class="col-md-12 control-label">{{ __("Nivel") }}</label>
				<input id="level" class="form-control" name="level" value="{{ $grade->level }}" required />
			</div>
			<input id="id" name="id" value="{{ $grade->id }}" type="hidden" />
			<button type="submit" name="updateGrade" class="btn btn-default" hidden> {{ __("Editar ciclo ") }} </button>
			<a href="<?=URL::route('listgrades');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de ciclos") }}
			</a>
		</form>
	</div>
	<div class="col-md-8 col-md-offset-2" style="margin-top:20px;">
		@if($petitionsFCT->count() == 0 and $petitionsPracticas->count() == 0)
		<div class="alert alert-danger">
		{{ __("No hay ningúna solicitud en este momento") }}
	</div>
		@endif
		@if($petitionsFCT->count() > 0)
		<h1 class="text-center text-mute"> {{ __("Solicitudes de FCT (Dual)") }} </h1>
		@endif
		@foreach($petitionsFCT as $petitionFCT)
		<div class="panel panel-default">
			<div class="panel-heading" style="display: flex; align-items: center; justify-content: flex-end;">
				<span style="margin-right: auto;">
					<a href="" style="margin-right: auto;"> {{ $petitionFCT->company->name }}</a> quiere {{ $petitionFCT->n_students }}
					estudiante{{ $petitionFCT->n_students == 1 ? '' : 's' }} </a>
				</span>
				<!--
				<a href="{{ route('petitionEditForm', ['petitionFCT' => $petitionFCT->id]) }}" style="margin-right: 15px">Editar</a>
				<form method="POST" action="petitions/remove/{{ $petitionFCT->id }}">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit"><i class="far fa-trash-alt"></i></button>
				</form>
				-->
			</div>
		</div>
		@endforeach
		@if($petitionsPracticas->count() > 0)
		<h1 class="text-center text-mute"> {{ __("Solicitudes de prácticas") }} </h1>
		@endif
		@foreach($petitionsPracticas as $petitionPractica)
		<div class="panel panel-default">
			<div class="panel-heading" style="display: flex; align-items: center; justify-content: flex-end;">
				<span style="margin-right: auto;">
					<a href="" style="margin-right: auto;"> {{ $petitionPractica->company->name }}</a> quiere {{ $petitionPractica->n_students }}
					estudiante{{ $petitionPractica->n_students == 1 ? '' : 's' }} </a>
				</span>
				<!--
				<a href="{{ route('petitionEditForm', ['petitionFCT' => $petitionFCT->id]) }}" style="margin-right: 15px">Editar</a>
				<form method="POST" action="petitions/remove/{{ $petitionFCT->id }}">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit"><i class="far fa-trash-alt"></i></button>
				</form>
				-->
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection