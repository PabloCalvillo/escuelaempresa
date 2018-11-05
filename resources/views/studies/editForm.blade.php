@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Editar estudio") }} </h1>
			<form method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="student" class="col-md-2 control-label">{{ __("Estudiante") }}</label>
				<select id="student" name="id_student">
					@foreach ($students as $student)
						@if ($student->id == $study->student->id)
							<option value="{{ $student->id }}" selected>{{ $student->name }}</option>
						@else
							<option value="{{ $student->id }}">{{ $student->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="grade" class="col-md-2 control-label">{{ __("Ciclo") }}</label>
				<select id="grade" name="id_grade">
					@foreach ($grades as $grade)
						@if ($grade->id == $study->grade->id)
							<option value="{{ $grade->id }}" selected>{{ $grade->name }}</option>
						@else
							<option value="{{ $grade->id }}">{{ $grade->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-default"> {{ __("Editar ") }} </button>
			<a href="<?=URL::route('studyIndex');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de estudios") }} </a>
		</form>
	</div>
</div>
@endsection