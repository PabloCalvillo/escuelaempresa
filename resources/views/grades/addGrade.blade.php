@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Añadir ciclo") }} </h1>

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form method="POST" action="<?=URL::route('storeGrade');?>">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name" class="col-md-12 control-label">{{ __("Nombre") }}</label>
				<input id="name" class="form-control" name="name" value="{{ old('name') }}" required />
			</div>
			<div class="form-group">
				<label for="level" class="col-md-12 control-label">{{ __("Nivel") }}</label>
				<select name="level" id="level" required>
					<option value="FPB">Formación Básica</option>
					<option value="CFGM">Formación Media</option>
					<option value="CFGS">Formación Superior</option>
				</select>
			</div>
			<button type="submit" name="addGrade" class="btn btn-default"> {{ __("Añadir ciclo ") }} </button>
			<a href="<?=URL::route('listgrades');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de ciclos") }} </a>
		</form>
	</div>
</div>
@endsection