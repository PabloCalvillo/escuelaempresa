@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Solicitudes") }} <a style="float:right;" href="petitions/add"><i class="fas fa-folder-plus"></i></a></h1>
		@forelse($petitions as $petition)
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
						<a href="" style="margin-right: auto;"> {{ $petition->company->name }}</a> quiere {{ $petition->n_students }} estudiante{{ $petition->n_students == 1 ? '' : 's' }} del ciclo <a href="" style="margin-right: auto;"> {{ $petition->grade->name }}</a>
					</p>
				</div>
			</div>
		@empty
			<div class="alert alert-danger">
				{{ __("No hay ninguna solicitud en este momento") }}
			</div>
		@endforelse

		@if($petitions->count())
			<div style='text-align:center;'>
				{{ $petitions->links() }}
			</div>
		@endif
	</div>
</div>
@endsection