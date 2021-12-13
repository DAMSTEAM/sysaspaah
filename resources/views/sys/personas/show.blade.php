@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')

<h1>Gestión de personas</h1>

@stop

@section('content')

@livewire('personas.show', ['id' => $id])

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
