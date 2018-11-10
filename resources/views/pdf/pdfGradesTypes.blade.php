<h1>Solicitudes del grado: {{ $gradeName }} de {{ $gradeLevel }}</h1>

@if($petitionsFCT->count() > 0)
<h1 style="text-align:center;">Solicitudes de FCT</h1>
<table align="center" style="border: 1px solid black;">
        <thead>
                <tr>
                        <th style="border: 1px solid black;">Empresa</th>
                        <th style="border: 1px solid black;">Nº alumnos</th>
                </tr>
        </thead>
        <tbody>
                @foreach($petitionsFCT as $petitionFCT)
                <tr>
                        <td style="border: 1px solid black;">
                                {{ $petitionFCT->company->name}}
                        </td>
                        <td style="text-align:center;border: 1px solid black;">
                                {{ $petitionFCT->n_students}}
                        </td>
                </tr>
                @endforeach

        </tbody>
</table>
@endif
@if($petitionsPracticas->count() > 0)
<h1 style="text-align:center;">Solicitudes de prácticas</h1>
<table align="center" style="border: 1px solid black;">
        <thead>
                <tr>
                        <th style="border: 1px solid black;">Empresa</th>
                        <th style="border: 1px solid black;">Nº alumnos</th>
                </tr>
        </thead>
        <tbody>
                @foreach($petitionsPracticas as $petitionPracticas)
                <tr>
                        <td style="border: 1px solid black;">
                                {{ $petitionPracticas->company->name}}
                        </td>
                        <td style="text-align:center;border: 1px solid black;">
                                {{ $petitionPracticas->n_students}}
                        </td>
                </tr>
                @endforeach

        </tbody>
</table>
@endif