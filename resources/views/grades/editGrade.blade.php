@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2" style="margin-top:20px;">
		@if ($petitionTypes)
	<a href="../find/{{ $grade->id }}" class="btn btn-default pull-right"> {{ __("Buscar for fecha ") }} </a>
			<ul class="nav nav-tabs">
				@foreach ($petitionTypes as $type => $petitions)
					@if ($petitions->count() > 0)
						<li role="presentation" data-tab="{{ $type }}"><a href="#">{{ $type }}</a></li>
					@endif
				@endforeach
			</ul>
			@foreach ($petitionTypes as $type => $petitions)
				@if ($petitions->count() > 0)
					<div id="petition-container-{{ $type }}">
						<h2 class="text-center text-mute"> {{ __("Solicitudes de ") }} {{ $type }}</h2>
						@foreach ($petitions as $petition)
							<div class="panel panel-default">
								<div class="panel-heading" style="display: flex; align-items: center; justify-content: flex-end;">
									<span style="margin-right: auto;">
										<a href="{{ route('companyEditForm', $petition->company->id) }}" style="margin-right: auto"> {{ $petition->company->name }}</a> quiere {{ $petition->n_students }}
										estudiante{{ $petition->n_students == 1 ? '' : 's' }} </a>
									</span>
									
								</div>
							</div>
						@endforeach

						<a href="./pdfGradesTypes/{{ $grade->id }}/{{ $type }}" class="btn btn-info pull-right"> {{ __("Descargar PDF") }}</a>
					</div>
				@endif
			@endforeach
			<a href="./pdfGradesTypes/{{ $grade->id }}" class="btn btn-info pull-left"> {{ __("Descargar PDF general") }}</a>
		@else
			<div class="alert alert-danger">
				{{ __("No hay ningúna solicitud en este momento") }}
			</div>
		@endif
	</div>
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
			<a href="<?=URL::route('listgrades');?>" class="btn btn-info pull-right"> {{ __("Volver al listado de ciclos") }}
			</a>
		</form>
	</div>
</div>

<script>
	document.body.onload = function(){
		var lis = document.querySelectorAll("ul.nav.nav-tabs li")
		var activeTabContainer = document.getElementById(`petition-container-${lis[0].dataset.tab}`)
		var activeLi = lis[0]

		activeTabContainer.classList.add("show")
		activeLi.classList.add("active")

		lis.forEach(li => {
			var tabLink = li.getElementsByTagName("a")[0]
			var tabContainer = document.getElementById(`petition-container-${li.dataset.tab}`)
			
			tabLink.onclick = function(ev){
				if ( activeTabContainer )
					activeTabContainer.classList.remove("show")

				if ( activeLi )
					activeLi.classList.remove("active")
					
				tabContainer.classList.add("show")
				li.classList.add("active")
				
				activeTabContainer = tabContainer
				activeLi = li
			}
		})
	}
</script>
@endsection