<div>
    <table>
        <thead>
            <tr>
                <th>Cod.</th>
                <th>Nombres y apellidos</th>
                <th>DNI</th>
                <th>Número</th>
                <th>Sexo</th>
                <th>Fecha de nacimiento</th>
                <th>Comunidad</th>
                <th>Distrito</th>
                <th>Provincia</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socios as $socio)
            <tr>
                <td>{{ $socio->ID_SOCIO }}</td>
                <td>{{ $socio->persona->NO_SOCIO }} {{ $socio->persona->AP_PATERNO }} {{ $socio->persona->AP_MATERNO }}</td>
                <td>{{ $socio->persona->CO_DNI }}</td>
                <td>{{ $socio->persona->NU_CELULAR }}</td>
                <td>
                    @if ($socio->persona->TI_SEXO == '1')
                    Varón
                    @else
                    Mujer
                    @endif
                </td>
                <td>{{ $socio->persona->FE_NACIMIENTO }}</td>
                <td>{{ $socio->comunidad->NO_COMUNIDAD }}</td>
                <td>{{ $socio->comunidad->distrito->NO_DISTRITO }}</td>
                <td>{{ $socio->comunidad->distrito->provincia->NO_PROVINCIA }}</td>
                <td>{{ $socio->comunidad->distrito->provincia->departamento->NO_DEPARTAMENTO }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
