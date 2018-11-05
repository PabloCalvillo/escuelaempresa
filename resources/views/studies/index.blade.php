@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Estudios") }} <a style="float:right;" href="studies/add"><i class="fas fa-book-reader"></i> +</a></h1>
		@forelse($studies as $study)
			<div class="panel panel-default">
				<div class="panel-heading" style="display: flex; align-items: center; justify-content: flex-end;">
					<a href="" style="margin-right: auto;"> {{ $study->student->name }}</a>
					<a href="" style="margin-right: auto;"> {{ $study->grade->name }}</a>
					<a href="{{ route('studyEditForm', ['study' => $study->id]) }}" style="margin-right: 15px">Editar</a>
					<form method="POST" action="studies/remove/{{ $study->id }}">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<button type="submit"><i class="far fa-trash-alt"></i></button>
					</form>
				</div>
			</div>
		@empty
			<div class="alert alert-danger">
				{{ __("No hay ningun estudio en este momento") }}
			</div>
		@endforelse

		@if($studies->count())
			<div style='text-align:center;'>
				{{ $studies->links() }}
			</div>
		@endif
	</div>
</div>
@endsection