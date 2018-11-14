@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Editar solicitud") }} </h1>
			<form method="POST" action="{{ route('petitionUpdate', $petition) }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="company" class="col-md-2 control-label">{{ __("Empresa") }}</label>
				<select id="company" name="id_company">
					@foreach ($companies as $company)
						@if ($company->id == $petition->company->id)
							<option value="{{ $company->id }}" selected>{{ $company->name }}</option>
						@else
							<option value="{{ $company->id }}">{{ $company->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="grade" class="col-md-2 control-label">{{ __("Ciclo") }}</label>
				<select id="grade" name="id_grade">
					@foreach ($grades as $grade)
						@if ($grade->id == $petition->grade->id)
							<option value="{{ $grade->id }}" selected>{{ $grade->name }}</option>
						@else
							<option value="{{ $grade->id }}">{{ $grade->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="type" class="col-md-2 control-label">{{ __("Tipo") }}</label>
				<select id="type" name="type">
					@foreach (array(array('FCT (Dual)', 'FCT'), array('Prácticas', 'Prácticas')) as $type)
						@if ($type[1] == $petition->type)
							<option value="{{ $type[1] }}" selected>{{ $type[0] }}</option>
						@else
							<option value="{{ $type[1] }}">{{ $type[0] }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="n_students" class="col-md-12 control-label">{{ __("Número de estudiantes") }}</label>
				<input id="n_students" name="n_students" type="number" min="0" class="form-control" value="{{ $petition->n_students }}" />
			</div>
			<button type="submit" class="btn btn-default"> {{ __("Editar ") }} </button>
			<a href="<?=URL::route('petitionIndex');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de solicitudes") }}
			</a>
		</form>
	</div>
</div>
@endsection