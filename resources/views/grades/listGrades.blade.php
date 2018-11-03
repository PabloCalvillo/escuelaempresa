@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h1 class="text-center text-mute"> {{ __("Ciclos") }} <a style="float:right;" href="<?=URL::route('addGrade');?>"><i class="fas fa-user-plus"></i></a></h1>
@forelse($grades as $grade)
<div class="panel panel-default">
<div class="panel-heading">
<a href="../grades/edit/{{ $grade->id }}"> {{ $grade->name }}</a>
<form method="POST" action="../grades/remove/{{ $grade->id }}" style="float:right;margin:0;">
{{ method_field('DELETE') }} 
{{ csrf_field() }}
<button type="submit" style="margin-top:-6px;margin-right:-8px;"><i class="far fa-trash-alt"></i></button>
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