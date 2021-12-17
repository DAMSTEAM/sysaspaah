<div class="row">
    <div class="col">
        <div class="row">
            <div class="col align-self-center">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user shadow">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{$socio->persona->NO_SOCIO}}</h3>
                        <h5 class="widget-user-desc">{{$socio->persona->AP_PATERNO}} {{$socio->persona->AP_PATERNO}}
                        </h5>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">DNI</h5>
                                    <span class="description-text">{{$socio->persona->CO_DNI}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">CELULAR</h5>
                                    <span class="description-text">{{$socio->persona->CO_DNI}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">SEXO</h5>
                                    <span class="description-text">
                                        @if ($socio->persona->TI_SEXO == '1')
                                        Masculino
                                        @else
                                        Femenino
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                    test.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> Inscripción de la persona
                                <small class="float-right">Fecha de creación:
                                    {{$socio->persona->inscripcion->created_at}}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Dirección
                            <address>
                                <b>Comunidad:</b> <strong>{{$socio->comunidad->NO_COMUNIDAD}}</strong><br>
                                <b>Distrito:</b> {{$socio->comunidad->distrito->NO_DISTRITO}}<br>
                                <b>Provincia:</b> {{$socio->comunidad->distrito->provincia->NO_PROVINCIA}}<br>
                                <b>Departamento:</b>
                                {{$socio->comunidad->distrito->provincia->departamento->NO_DEPARTAMENTO}}<br>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            Personal
                            <address>
                                <b>Nombres y apellidos:</b> <strong>{{$socio->persona->NO_SOCIO}}
                                    {{$socio->persona->AP_PATERNO}} {{$socio->persona->AP_MATERNO}}</strong><br>
                                <b>Número de celular:</b> {{$socio->persona->NU_CELULAR}}<br>
                                <b>DNI:</b> {{$socio->persona->CO_DNI}}<br>
                                <b>Fecha de nacimiento:</b> {{$socio->persona->FE_NACIMIENTO}}<br>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Código
                                #{{$socio->persona->ID_PERSONA}}{{$socio->ID_SOCIO}}{{$socio->persona->FE_NACIMIENTO}}</b><br>
                            <br>
                            <b>Orden de ID:</b> #{{$socio->persona->inscripcion->personaAprobado->ID_PERSONA}}<br>
                            <b>Persona que aprobó:</b> {{$socio->persona->inscripcion->personaAprobado->NO_SOCIO}}<br>
                            <b>Estado de la persona:</b> @if ($socio->ES_SOCIO == '1')
                            Afiliado
                            @else
                            Desafiliado
                            @endif
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <p class="lead">Familiares:</p>
                            <div class="d-flex justify-content-between">
                                <div class="btn-group" role="group">
                                    <a type="button" class="btn btn-outline-warning px-4"
                                        href="{{route('socios.pdf')}}">
                                        Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
                                    <a type="button" class="btn btn-outline-success px-4"
                                        href="{{route('socios.excel')}}">
                                        Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
                                </div>
                                <a class="btn btn-success" wire:click="createAll">
                                    <i class="fas fa-plus mr-1"></i> Registrar pariente
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Call of Duty</td>
                                        <td>455-981-221</td>
                                        <td>El snort testosterone trophy driving gloves handsome</td>
                                        <td>$64.50</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Need for Speed IV</td>
                                        <td>247-925-726</td>
                                        <td>Wes Anderson umami biodiesel</td>
                                        <td>$50.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Monsters DVD</td>
                                        <td>735-845-642</td>
                                        <td>Terry Richardson helvetica tousled street art master</td>
                                        <td>$10.70</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Grown Ups Blue Ray</td>
                                        <td>422-568-642</td>
                                        <td>Tousled lomo letterpress</td>
                                        <td>$25.99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Inscripción:</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                handango
                                imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Requisitos de inscripción</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @if (empty($socio->persona->inscripcion->requisitos))
                                        Ningún requisito para este socio
                                        @else
                                        @foreach ($socio->persona->inscripcion->requisitos as $requisito)
                                        <tr>
                                            <th style="width:50%">Requisito: </th>
                                            <td>{{$requisito->NO_REQUISITO}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-warning px-4"
                                    href="{{route('socios.pdfCarnet', $socio->ID_SOCIO)}}">
                                    Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
                            </div>
                            <a type="button" href="/socios" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Regresar
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div>
    </div>
</div>
