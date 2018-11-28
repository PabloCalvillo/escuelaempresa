<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
	body {
		background-color: white;
		font-family: 'Montserrat', sans-serif !important;

	}
</style>
<h1>Solicitudes del grado: {{ $grade->name }} de {{ $grade->level }}</h1>
<h2>Periodo de {{ $inicio }} a {{ $fin }} </h2>

@if($petitions->count() > 0)
<table align="center" class="table table-hover" style="border: 1px solid black;">
	<thead>
		<tr>
			<th style="border: 1px solid black;">Empresa</th>
			<th style="border: 1px solid black;">Tipo</th>
			<th style="border: 1px solid black;">Nº alumnos</th>
			<th style="border: 1px solid black;">Fecha</th>
		</tr>
	</thead>
	<tbody>
		@foreach($petitions as $petition)
		<tr>
			<td style="border: 1px solid black;">
				{{ $petition->company->name}}
			</td>
			<td style="text-align:center;border: 1px solid black;">
				{{ $petition->type}}
			</td>
			<td style="text-align:center;border: 1px solid black;">
				{{ $petition->n_students}}
			</td>
			<td style="text-align:center;border: 1px solid black;">
				{{ $petition->created_at}}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif