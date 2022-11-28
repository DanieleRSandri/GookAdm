@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <h4 style="padding: 15px; text-align: center">Bem Vindo, {{ Auth::user()->name }}.</h4>
    @can('Administrador')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                  {{-- <h2>{{ $agendas->count() }}</h2>  --}}
                                <p>Total de Agendamentos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <a href="{{ route('agendas') }}" class="small-box-footer">Ver Agendamentos <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                {{-- <h2>{{ $clientes->count() }}</h2>  --}}

                                <p>Total de Clientes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                            <a href="{{ route('clientes') }}" class="small-box-footer">Listar Clientes <i
                                    class="fas fa-arrow-circle-right" ></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                 {{-- <h2>{{ $quadras->count() }}</h2>  --}}
                                <p>Total de Quadras</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-trophy"></i>
                            </div>
                            <a href="{{ route('quadras') }}" class="small-box-footer">Listar Quadras <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                {{-- <h2>{{ $usuarios->count() }}</h2>  --}}

                                <p>Total de Usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('usuarios') }}" class="small-box-footer">Listar Usuários <i
                                    class="fas fa-arrow-circle-right" ></i></a>
                        </div>
                    </div>
                </div>

        </section>
    @endcan

    @can('Usuario')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                {{-- <h2>{{ $agendas->count() }}</h2>  --}}

                                <p>Total de Agendamentos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <a href="{{ route('agendas') }}" class="small-box-footer">Ver Agendamentos <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                {{-- <h2>{{ $clientes->count() }}</h2>  --}}

                                <p>Total de Clientes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                            <a href="{{ route('clientes') }}" class="small-box-footer">Listar Clientes <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

               
                
        </section>
    @endcan



@stop
