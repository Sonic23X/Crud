@extends('layouts.app')

@section('content')
<div class="container">
    <h3 id="titlecreateUser">INGRESA LOS DATOS DEL USUARIO</h3>
    <form action="{{route('update',$usuarioClub->id)}}" method="POST">
        <script src="{{ asset('js/pais.js') }}" defer></script>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="{{$usuarioClub->nombre}}">
        </div>
        <div class="form-group">
            <label for="app" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" value="{{$usuarioClub->apellidos}}">
        </div>
        <div class="form-group">
            <label for="apm" class="col-form-label">Telefono:</label>
            <input type="text" class="form-control" name="telefono" value="{{$usuarioClub->telefono}}">
        </div>
        <div class="form-group">
            <label for="fNacimiento" class="col-form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="fNacimiento" name="fNacimiento" value="2022-01-01"
                min="1950-01-01" max="2022-12-31" value="{{$usuarioClub->fNacimiento}}">
        </div>

        <div class="form-group mt-3">
            <label for="pais" class="col-form-label">Pais:</label>
            <select class="form-control" name="pais" id="select-pais">
                <option value="{{$usuarioClub->Name}}" >{{$usuarioClub->pais}}</option>
                @foreach ($paises as $pais)
                <option value="{{$pais->Code}}">{{$pais->Name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="ciudad" class="col-form-label">Ciudad:</label>
            <select class="form-control" name="ciudad" id="select-ciudad">
                <option >seleccionar una ciudad</option>
                @foreach ($ciudades as $ciudad)
                <option value="{{$ciudad->CountryCode}}" >{{$ciudad->Name}}</option>
                @endforeach
            </select>
        </div>


        <div class="ButtonAccion mt-4">
            <a class="btn btn-danger col-md-4 mx-5" href="/club">
                Cerrar
            </a>
            <button type="submit" class="btn btn-success col-md-4" id="add">Guardar</button>
        </div>
    </form>

</div>
@endsection