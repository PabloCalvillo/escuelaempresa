<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
	body {
		background-color: white;
		font-family: 'Montserrat', sans-serif !important;
	}
</style>
<h1>Solicitudes del grado: {{ $gradeName }} de {{ $gradeLevel }}</h1>

@if($petitions->count() > 0)
<h1 style="text-align:center;">Solicitudes de {{ $petitions[0]->type }}</h1>
<table align="center" class="table table-hover" style="border: 1px solid black;">
	<thead>
		<tr>
			<th style="border: 1px solid black;">Empresa</th>
			<th style="border: 1px solid black;">Nº alumnos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($petitions as $petition)
		<tr>
			<td style="border: 1px solid black;">
				{{ $petition->company->name}}
			</td>
			<td style="text-align:center;border: 1px solid black;">
				{{ $petition->n_students}}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif