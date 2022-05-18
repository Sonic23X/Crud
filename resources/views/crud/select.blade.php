@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>

                <div class="Titulo">
                    <h3 id="reg">Registrar Nuevo Usuario</h3>

                    <!-- Boton agregar registro -->
                    <a class="button" href="/agregar">
                        <button type="button" class="btn btn-success" id="agregar" data-toggle="modal"
                            data-target="#exampleModal" data-whatever="@mdo">
                            <i class="fas fa-plus-square"></i>
                            Agregar usuario
                        </button>
                    </a>

                </div>

                <!--tabla de usuarios-->
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            }<th scope="col">Telefono</th>
                            <th scope="col">Fecha de nacimiento</th>
                            <th scope="col">Pais</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{$usuario -> id}}</th>
                            <td>{{$usuario -> nombre}}</td>
                            <td>{{$usuario -> app}}</td>
                            <td>{{$usuario -> telefono}}</td>
                            <td>{{$usuario -> fNacimiento}}</td>
                            <td>{{$usuario -> pais}}</td>
                            <td>{{$usuario -> ciudad}}</td>
                            <td>
                                <form>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <a class="button" href="">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection