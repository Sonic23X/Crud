@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
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
                   <div class="table-response">
                        <table id="example" class="table display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">apellidos</th>
                                    <th scope="col">Fecha de nacimiento</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">pais</th>
                                    <th scope="col">ciudad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clubs as $club)
                                <tr>
                                    <th scope="row">{{$club->id}}</th>
                                    <td>{{$club->nombre}}</td>
                                    <td>{{$club->apellidos}}</td>
                                    <td>{{date('d-m-Y', strtotime($club->fNacimiento));}}</td>
                                    <td>{{$club -> edad}}</td>
                                    <td>{{$club->pais}}</td>
                                    <td>{{$club->ciudad}}</td>

                                    <td>
                                <form action="{{route('delete',$club->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <a class="button" href="{{route('edit',$club->id)}}">
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
    </div>
</div>
@endsection
