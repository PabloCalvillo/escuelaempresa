@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Editar empresa") }} </h1>
			<form method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name" class="col-md-12 control-label">{{ __("Nombre") }}</label>
				<input id="name" class="form-control" type="text" name="name" value="{{ $company->name }}" />
			</div>
			<div class="form-group">
				<label for="city" class="col-md-12 control-label">{{ __("Ciudad") }}</label>
				<input id="city" class="form-control" type="text" name="city" value="{{ $company->city }}" />
			</div>
			<div class="form-group">
				<label for="cp" class="col-md-12 control-label">{{ __("Código postal") }}</label>
				<input id="cp" class="form-control" name="cp" type="text" value="{{ $company->cp }}" />
			</div>
			<button type="submit" class="btn btn-default"> {{ __("Editar ") }} </button>
			<a href="<?=URL::route('companyIndex');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de empresas") }} </a>
		</form>
	</div>
</div>
@endsection