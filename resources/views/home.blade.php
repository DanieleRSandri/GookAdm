@extends('adminlte::page')

@section('content')
<h4>Olá {{ auth()->user()->name }}</h4>
 
@stop
