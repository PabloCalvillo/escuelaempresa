@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center text-mute"> {{ __("Empresas") }} <a style="float:right;" href="companies/add"><i class="far fa-building"></i> +</a></h1>
		@forelse($companies as $company)
			<div class="panel panel-default">
				<div class="panel-heading" style="display: flex; align-items: center; justify-content: flex-end;">
					<a href="" style="margin-right: auto;"> {{ $company->name }}</a>
					<a href="{{ route('companyEditForm', ['company' => $company->id]) }}" style="margin-right: 15px">Editar</a>
					<form method="POST" action="companies/remove/{{ $company->id }}">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<button type="submit"><i class="far fa-trash-alt"></i></button>
					</form>
				</div>
				<div class="panel-body">
					<p>Postal code: {{ $company->cp }}</p>
					<p>City: {{ $company->city }}</p>
				</div>
			</div>
		@empty
			<div class="alert alert-danger">
				{{ __("No hay ninguna empresa en este momento") }}
			</div>
		@endforelse

		@if($companies->count())
			<div style='text-align:center;'>
				{{ $companies->links() }}
			</div>
		@endif
	</div>
</div>
@endsection