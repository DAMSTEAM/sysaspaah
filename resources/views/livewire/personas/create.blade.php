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
                    <input type="text" class="form-control form-control-border border-width-2" wire:model="NO_SOCIO"
                        placeholder="">
                    <small class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Apellido paterno
                        <code>*</code></label>
                    <input type="text" class="form-control form-control-border border-width-2" wire:model="AP_PATERNO"
                        placeholder="">
                </div>
                <div class="form-group col">
                    <label>Apellido materno
                        <code>*</code></label>
                    <input type="text" class="form-control form-control-border border-width-2" wire:model="AP_MATERNO"
                        placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Documento de identidad
                        <code>*</code></label>
                    <input type="number" class="form-control form-control-border border-width-2" wire:model="CO_DNI"
                        placeholder="">
                </div>
                <div class="form-group col">
                    <label>Número de celular
                        <code>*</code></label>
                    <input type="number" class="form-control form-control-border border-width-2" wire:model="NU_CELULAR"
                        placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Sexo
                        <code>*</code></label>
                    <select class="custom-select form-control-border border-width-2" wire:model="TI_SEXO">
                        <option selected>Seleccionar...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label>Fecha de nacimiento
                        <code>*</code></label>
                    <input type="date" class="form-control form-control-border border-width-2"
                        wire:model="FE_NACIMIENTO" placeholder="">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-secondary btn-block">
                Cancelar
            </button>
            <button class="btn btn-success btn-block" wire:click="save">
                Registrar
            </button>
        </div>
    </div>
</div>
