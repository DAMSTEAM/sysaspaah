@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')

<h1>Gestión de personas</h1>

@stop

@section('content')

@livewire('personas.index')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#exampleModal').modal('hide');
    });
</script>
@stop
