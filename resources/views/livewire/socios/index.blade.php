<div>
    <div class="mb-3 d-flex justify-content-center row">
        <div class="col-4">
            <x-jet-input placeholder="Buscar socio" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="col-2">
            <div class="form-group">
                <select class="form-control" wire:model="tipoBuscar">
                    <option value="0">Seleccione tipo...</option>
                    <option value="1" selected>Socio activos</option>
                    <option value="2">Comunidad</option>
                    <option value="3">Socio inactivos</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-outline-danger px-4" href="{{route('socios.pdfCarnets')}}">
                Carnets <i class="far fa-id-card fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-warning px-4" href="{{route('socios.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('socios.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>
        <a class="btn btn-success" wire:click="createAll">
            <i class="fas fa-plus mr-1"></i> Registrar persona
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>Cod.</th>
                <th>Nombres y apellidos</th>
                <th>DNI</th>
                <th>Estado</th>
                <th>Comunidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socios as $socio)
            <tr class="text-center">
                <td>{{ $socio->ID_SOCIO }}</td>
                <td>{{ $socio->persona->NO_SOCIO }} {{ $socio->persona->AP_PATERNO }} {{ $socio->persona->AP_MATERNO }}</td>
                <td>{{ $socio->persona->CO_DNI }}</td>
                <td>
                    @if ($socio->ES_SOCIO == '1')
                    <i class="fas fa-thumbs-up fa-lg text-success"></i>
                    @else
                    <i class="fas fa-thumbs-down fa-lg text-danger"></i>
                    @endif
                </td>
                <td>{{ $socio->comunidad->NO_COMUNIDAD }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('socios.show', $socio->ID_SOCIO)}}" type="button"
                            class="btn btn-sm btn-info"><i class="align-middle" data-feather="eye"></i>
                            Ver</a>
                        <button wire:click="delete({{ $socio->ID_SOCIO }})"
                            class="btn btn-danger btn-sm">Retirar</button>
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
