<div>
    <table>
        <thead>
            <tr>
                <th>Cod.</th>
                <th>Estado</th>
                <th>Cantidad de ingreso</th>
                <th>Persona solicitada</th>
                <th>Persona aprobada</th>
                <th>Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscripciones as $inscripcion)
            <tr>
                <td>{{ $inscripcion->ID_INSCRIPCION }}</td>
                <td>
                    @if ($inscripcion->ES_INSCRIPCION == '1')
                    Aprobado
                    @elseif($inscripcion->ES_INSCRIPCION == '2')
                    Rechazado
                    @elseif($inscripcion->ES_INSCRIPCION == '3')
                    En curso
                    @else
                    Desactivado
                    @endif
                </td>
                <td>{{ $inscripcion->ingreso->CA_PAGO }}</td>
                <td>{{ $inscripcion->personaSolicitado->NO_SOCIO }}</td>
                <td>
                    @if (empty($inscripcion->personaAprobado->NO_SOCIO))
                    Sin aprobación
                    @else
                    {{$inscripcion->personaAprobado->NO_SOCIO}}
                    @endif
                </td>
                <td>
                    {{$inscripcion->created_at}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
