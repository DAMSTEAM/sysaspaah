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
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->ID_PERSONA }}</td>
                <td>{{ $persona->NO_SOCIO }} {{ $persona->AP_PATERNO }} {{ $persona->AP_MATERNO }}</td>
                <td>{{ $persona->CO_DNI }}</td>
                <td>{{ $persona->NU_CELULAR }}</td>
                <td>
                    @if ($persona->TI_SEXO == '1')
                    Varón
                    @else
                    Mujer
                    @endif
                </td>
                <td>{{ $persona->FE_NACIMIENTO }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
