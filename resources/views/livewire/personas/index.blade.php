<div>
    <div class="mb-3 d-flex justify-content-between row">
        <div class="col">
            <x-jet-input placeholder="Buscar socio" type="text" />
        </div>
        <div class="d-flex col">
            <x-jet-input placeholder="Buscar socio" type="date" />
            <x-jet-input placeholder="Buscar socio" type="date" class="ml-2" />

            <select class="form-control ml-2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-danger px-4">Exportar carnets</button>
            <button type="button" class="btn btn-warning px-4">Exportar PDF</button>
            <button type="button" class="btn btn-success px-4">Exportar Excel</button>
        </div>

        <a class="btn btn-success" href="{{route('personas.create')}}">Registrar persona</a>
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
                <td>{{ $persona->NO_SOCIO }}</td>
                <td>{{ $persona->CO_DNI }}</td>
                <td>{{ $persona->NU_CELULAR }}</td>
                <td>{{ $persona->TI_SEXO }}</td>
                <td>{{ $persona->FE_NACIMIENTO }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('personas.edit', $persona->ID_PERSONA)}}" type="button" class="btn btn-info"><i class="align-middle" data-feather="eye"></i>
                            Ver</a>
                        <button data-toggle="modal" data-target="#updateModal"
                            wire:click="edit({{ $persona->ID_PERSONA }})" class="btn btn-primary btn-sm">Editar</button>
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
