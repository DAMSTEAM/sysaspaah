<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar una persona</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label>Nombres
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('NO_SOCIO') is-invalid @enderror"
                        wire:model="NO_SOCIO" placeholder="">
                    @error('NO_SOCIO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Apellido paterno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('AP_PATERNO') is-invalid @enderror"
                        wire:model="AP_PATERNO" placeholder="">
                    @error('AP_PATERNO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Apellido materno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('AP_MATERNO') is-invalid @enderror"
                        wire:model="AP_MATERNO" placeholder="">
                    @error('AP_MATERNO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Documento de identidad
                        <code>*</code></label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('CO_DNI') is-invalid @enderror"
                        wire:model="CO_DNI" placeholder="">
                    @error('CO_DNI')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Número de celular
                        <code>*</code></label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('NU_CELULAR') is-invalid @enderror"
                        wire:model="NU_CELULAR" placeholder="">
                    @error('NU_CELULAR')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Sexo
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('TI_SEXO') is-invalid @enderror"
                        wire:model="TI_SEXO">
                        <option selected>Seleccionar...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    @error('TI_SEXO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Fecha de nacimiento
                        <code>*</code></label>
                    <input type="date"
                        class="form-control form-control-border border-width-2 @error('FE_NACIMIENTO') is-invalid @enderror"
                        wire:model="FE_NACIMIENTO" placeholder="">
                    @error('FE_NACIMIENTO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary btn-block" href="{{route('personas.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="create" type="button" wire:loading.attr="disabled" wire:target="create">
                Registrar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>
