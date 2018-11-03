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
    <a href="<?=URL::route('listgrades');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de ciclos") }} </a>
    </form>
</div>
</div>
@endsection