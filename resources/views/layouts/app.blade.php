@extends('adminlte::page')

@section('title', 'Hogar')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @livewire('app')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
