@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Nueva solicitud") }} </h1>
			<form method="POST" action="{{ route('petitionStore') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="company" class="col-md-2 control-label">{{ __("Empresa") }}</label>
				<select id="company" name="id_company">
					@foreach ($companies as $company)
						<option value="{{ $company->id }}">{{ $company->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="grade" class="col-md-2 control-label">{{ __("Ciclo") }}</label>
				<select id="grade" name="id_grade">
					@foreach ($grades as $grade)
						<option value="{{ $grade->id }}">{{ $grade->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="type" class="col-md-2 control-label">{{ __("Tipo") }}</label>
				<select id="type" name="type">
					<option value="FCT">FCT</option>
					<option value="Dual">Dual</option>
					<option value="Trabajo">Trabajo</option>
				</select>
			</div>
			<div class="form-group">
				<label for="n_students" class="col-md-12 control-label">{{ __("Número de estudiantes") }}</label>
				<input id="n_students" name="n_students" type="number" min="0" class="form-control" />
			</div>
			<button type="submit" class="btn btn-default"> {{ __("Añadir ") }} </button>
			<a href="<?=URL::route('petitionIndex');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de solicitudes") }}
			</a>
		</form>
	</div>
</div>
@endsection