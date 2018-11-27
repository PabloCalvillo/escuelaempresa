@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center text-mute"> Buscar peticiones del ciclo {{ $grade->name }} </h1>
	<form method="POST" action="<?=URL::route('findByDate');?>">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="text" id="id" class="form-control hidden" name="id" value="{{ $id }}" />
		</div>

		<div class="form-group">
			<label for="inicio" class="col-md-2 control-label">{{ __("Fecha de inicio") }}</label>
			<input type="date" id="inicio" class="form-control" name="inicio" value="{{ old('inicio') }}" />
		</div>
		<div class="form-group">
			<label for="fin" class="col-md-2 control-label">{{ __("Fecha de fin") }}</label>
			<input type="date" class="form-control" name="fin" value="{{ old('fin') }}" />
		</div>
		<button type="submit" class="btn btn-info pull-right"> {{ __("Buscar") }} </button>
		<a href="<?=URL::route('listgrades');?>" class="btn btn-default pull-left"> {{ __("Volver al listado de ciclos") }}
		</a>
	</form>
</div>
@if ($petitionsByDate)
<div class="col-md-8 col-md-offset-2" style="margin-top:20px;">
	<h1 class="text-center text-mute"> {{ __("Solicitudes de ") }} {{ $inicio }} a {{$fin }} </h1>
	@forelse($petitionsByDate as $petition)
	<div class="panel panel-default">
		<div class="panel-heading" style="display: flex; align-items: center; justify-content: flex-end;">
			<span style="margin-right: auto;">Solicitud de {{ $petition->type }}</span>
			<a href="{{ route('petitionEditForm', ['petition' => $petition->id]) }}" style="margin-right: 15px">Editar</a>
			<form method="POST" action="petitions/remove/{{ $petition->id }}">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button type="submit"><i class="far fa-trash-alt"></i></button>
			</form>
		</div>
		<div class="panel-body">
			<p>
				<a href="" style="margin-right: auto;"> {{ $petition->company->name }}</a> quiere {{ $petition->n_students }}
				estudiante{{ $petition->n_students == 1 ? '' : 's' }} del ciclo <a href="" style="margin-right: auto;"> {{
					$petition->grade->name }}</a>
			</p>
		</div>
	</div>
	@empty
	<div class="alert alert-danger">
		{{ __("No hay ninguna solicitud en estas fechas") }}
	</div>
	@endforelse
	@if($petitionsByDate->count() > 0)

		<a href="{{ route('pdfGradeDate', ['id' => $grade->id, 'inicio' => $inicio, 'fin' => $fin]) }}" class="btn btn-info pull-right" style="margin-bottom:20px;"> {{ __("Descargar PDF") }} </a>
	@endif
</div>
@endif
@endsection