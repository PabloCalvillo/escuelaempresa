@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-mute">Peticiones del grado {{ $grade->name }}</h1>
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

						<a href="{{ route('pdfGradeTypes', ['id' => $grade->id, 'type' => $petition->type]) }}" class="btn btn-info pull-right"> {{ __("Descargar PDF") }}</a>
					</div>
				@endif
			@endforeach
			<a href="{{ route('pdfGrade', ['id' => $grade->id]) }}" class="btn btn-info pull-left"> {{ __("Descargar PDF general") }}</a>
		@else
			<div class="alert alert-danger">
				{{ __("No hay ningúna solicitud en este momento") }}
			</div>
		@endif
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