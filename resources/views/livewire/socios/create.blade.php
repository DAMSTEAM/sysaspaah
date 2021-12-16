<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar una persona</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-6">
                    <label>Departamento
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedDepartamento') is-invalid @enderror"
                        wire:model="selectedDepartamento">
                        <option selected>Seleccionar...</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->ID_DEPARTAMENTO }}">{{ $departamento->NO_DEPARTAMENTO }}</option>
                        @endforeach
                    </select>
                    @error('selectedDepartamento')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @if (!is_null($selectedDepartamento))
                <div class="form-group col-6">
                    <label>Provincia
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedProvincia') is-invalid @enderror"
                        wire:model="selectedProvincia">
                        <option selected>Seleccionar...</option>
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia->ID_PROVINCIA }}">{{ $provincia->NO_PROVINCIA }}</option>
                        @endforeach
                    </select>
                    @error('selectedProvincia')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @endif
                @if (!is_null($selectedProvincia))
                <div class="form-group col-6">
                    <label>Distrito
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedDistrito') is-invalid @enderror"
                        wire:model="selectedDistrito">
                        <option selected>Seleccionar...</option>
                        @foreach($distritos as $distrito)
                            <option value="{{ $distrito->ID_DISTRITO }}">{{ $distrito->NO_DISTRITO }}</option>
                        @endforeach
                    </select>
                    @error('selectedDistrito')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @endif
                @if (!is_null($selectedDistrito))
                <div class="form-group col-6">
                    <label>Comunidad
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedComunidad') is-invalid @enderror"
                        wire:model="selectedComunidad">
                        <option selected>Seleccionar...</option>
                        @foreach($comunidades as $comunidad)
                            <option value="{{ $comunidad->ID_COMUNIDAD }}">{{ $comunidad->NO_COMUNIDAD }}</option>
                        @endforeach
                    </select>
                    @error('selectedComunidad')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary btn-block" href="{{route('socios.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="create" type="button" wire:loading.attr="disabled"
                wire:target="create">
                Registrar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>
