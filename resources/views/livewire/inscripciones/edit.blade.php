<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar una inscripción</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label>Tipo de pago
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('TI_PAGO') is-invalid @enderror"
                        wire:model="TI_PAGO">
                        <option selected>Seleccionar...</option>
                        <option value="1">Efectivo</option>
                        <option value="2">Deposito</option>
                    </select>
                    @error('TI_PAGO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Nombre de ingreso
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('NO_INGRESO') is-invalid @enderror"
                        wire:model="NO_INGRESO" placeholder="">
                    @error('NO_INGRESO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Cantidad de pago
                        <code>*</code></label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('CA_PAGO') is-invalid @enderror"
                        wire:model="CA_PAGO" placeholder="">
                    @error('CA_PAGO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Descuento (por defecto 0)</label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('CA_DESCUENTO') is-invalid @enderror"
                        wire:model="CA_DESCUENTO" placeholder="">
                    @error('CA_DESCUENTO')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Monto total </label>
                    <div class="form-group mb-2">
                        <input type="number" readonly class="form-control-plaintext" value="{{$MO_TOTAL}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary btn-block" href="{{route('inscripciones.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="edit" type="button" wire:loading.attr="disabled"
                wire:target="update">
                Actualizar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>
