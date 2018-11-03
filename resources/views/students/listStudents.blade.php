@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h1 class="text-center text-mute"> {{ __("Alumnos") }} <a style="float:right;" href="<?=URL::route('addStudent');?>"><i class="fas fa-user-plus"></i></a></h1>
@forelse($students as $student)
<div class="panel panel-default">
<div class="panel-heading">
<a href="../students/edit/{{ $student->id }}"> {{ $student->name }} {{ $student->lastname }}</a>
<form method="POST" action="../students/remove/{{ $student->id }}" style="float:right;margin:0;">
{{ method_field('DELETE') }} 
{{ csrf_field() }}
<button type="submit" style="margin-top:-6px;margin-right:-8px;"><i class="far fa-trash-alt"></i></button>
</form>
</div>
<div class="panel-body">
Edad: {{ $student->age }}
</div>
</div>
@empty
<div class="alert alert-danger">
{{ __("No hay ningún alumno en este momento") }}
</div>
@endforelse
@if($students->count())
<div style='text-align:center;'>
{{ $students->links() }}
</div>
@endif
</div>
</div>
@endsection