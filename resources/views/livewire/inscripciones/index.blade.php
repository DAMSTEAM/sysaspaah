<div>
    <div class="mb-3 d-flex justify-content-center row">
        <div class="col-4">
            <x-jet-input placeholder="Buscar socio" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="col-2">
            <div class="form-group">
                <select class="form-control" wire:model="tipoBuscar">
                    <option value="0" selected>Seleccione tipo...</option>
                    <option value="1">Termindos</option>
                    <option value="2">Rechazados</option>
                    <option value="3">En curso</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-outline-warning px-4" href="{{route('inscripciones.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('inscripciones.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>

        <a class="btn btn-success" href="{{route('inscripciones.create')}}">
            <i class="fas fa-plus mr-1"></i> Registrar inscripción
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>Cod.</th>
                <th>Solicitado</th>
                <th>Aprobado</th>
                <th>Estado</th>
                <th>Ingreso</th>
                <th>Requisitos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inscripciones as $inscripcion)
            <tr class="text-center">
                <td>{{ $inscripcion->ID_INSCRIPCION }}</td>
                <td>{{ $inscripcion->personaSolicitado->NO_SOCIO }}</td>
                <td>
                    @if (empty($inscripcion->personaAprobado->NO_SOCIO))
                    Sin aprobación
                    @else
                    {{$inscripcion->personaAprobado->NO_SOCIO}}
                    @endif
                </td>
                <td>
                    @if ($inscripcion->ES_INSCRIPCION == '1')
                    <i class="fas fa-check fa-2x text-success"></i>
                    @elseif($inscripcion->ES_INSCRIPCION == '2')
                    <i class="fas fa-times fa-2x text-danger"></i>
                    @else
                    <i class="far fa-clock fa-2x text-info"></i>
                    @endif
                </td>
                <td>{{ $inscripcion->ingreso->MO_TOTAL_PAGO }}</td>
                <td>
                    <select class="form-control">
                        <option value="0" selected>Requisitos...</option>
                        @foreach ($inscripcion->requisitos as $requisito)
                        <option value="0">{{$requisito->NO_REQUISITO}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('inscripciones.show', $inscripcion->ID_INSCRIPCION)}}" type="button"
                            class="btn btn-sm btn-info"><i class="align-middle" data-feather="eye"></i>
                            Ver</a>
                        <a href="{{route('inscripciones.edit', $inscripcion->ID_INSCRIPCION)}}" type="button"
                            class="btn btn-sm btn-warning"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $inscripcion->ID_INSCRIPCION }})"
                            class="btn btn-danger btn-sm">Eliminar</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($links->links())
        {{$links->links()}}
        @endif
    </div>
</div>
