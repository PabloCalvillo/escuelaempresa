@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h1 class="text-center text-mute"> {{ __("Añadir alumno") }} </h1>
    <form method="POST" action="<?=URL::route('storeStudent');?>">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-md-12 control-label">{{ __("Nombre") }}</label>
        <input id="name" class="form-control" name="name" value="{{ old('name') }}" />
    </div>
    <div class="form-group">
        <label for="lastname" class="col-md-12 control-label">{{ __("Apellidos") }}</label>
        <input id="lastname" class="form-control" name="lastname" value="{{ old('lastname') }}" />
    </div>
    <div class="form-group">
        <label for="age" class="col-md-12 control-label">{{ __("Edad") }}</label>
        <input id="age" class="form-control" name="age" type="number" min="16" max="50" value="{{ old('age') }}" />
    </div>
    <button type="submit" name="addStudent" class="btn btn-default"> {{ __("Añadir estudiante ") }} </button>
    </form>
</div>
</div>
@endsection