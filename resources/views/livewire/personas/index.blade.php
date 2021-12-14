<div>
    <div class="mb-3 d-flex justify-content-between row">
        <div class="col">
            <x-jet-input placeholder="Buscar socio" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="d-flex col">
            <x-jet-input placeholder="Buscar socio" type="date" wire:model.self="feInicio" />
            <x-jet-input placeholder="Buscar socio" type="date" class="ml-2" wire:model.self="feFin" />
            <button wire:click="socioListarDate()" class="btn btn-success btn-sm form-control ml-2">Listar por
                fechas</button>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-warning px-4" href="{{route('personas.pdf')}}">Exportar PDF</a>
            <button type="button" class="btn btn-success px-4">Exportar Excel</button>
        </div>

        <a class="btn btn-success" href="{{route('personas.create')}}">
            <i class="fas fa-plus mr-1"></i> Registrar persona
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>Cod.</th>
                <th>Nombres y apellidos</th>
                <th>DNI</th>
                <th>Número</th>
                <th>Sexo</th>
                <th>Fecha de nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
            <tr class="text-center">
                <td>{{ $persona->ID_PERSONA }}</td>
                <td>{{ $persona->NO_SOCIO }} {{ $persona->AP_PATERNO }} {{ $persona->AP_MATERNO }}</td>
                <td>{{ $persona->CO_DNI }}</td>
                <td>{{ $persona->NU_CELULAR }}</td>
                <td>
                    @if ($persona->TI_SEXO == '1')
                    <i class="fas fa-mars text-info fa-2x"></i>
                    @else
                    <i class="fas fa-venus text-danger fa-2x"></i>
                    @endif
                </td>
                <td>{{ $persona->FE_NACIMIENTO }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('personas.show', $persona->ID_PERSONA)}}" type="button"
                            class="btn btn-sm btn-info"><i class="align-middle" data-feather="eye"></i>
                            Ver</a>
                        <a href="{{route('personas.edit', $persona->ID_PERSONA)}}" type="button"
                            class="btn btn-sm btn-warning"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $persona->ID_PERSONA }})"
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
