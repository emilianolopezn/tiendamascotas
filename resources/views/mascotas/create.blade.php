@extends('layouts.default')
@section('titulo_pagina','Mascotas | Crear mascota')
@section('titulo','Mascotas')
@section('subtitulo','Crear mascota')
@section('contenido')
    <form action="{{route('mascotas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label class="control-label">Especie</label>
            <select class="form-control" name="especie" required>
                <option disabled selected value="">Elige una especie</option>
                @foreach($especies as $especie)
                    <option value="{{$especie->id}}">
                        {{$especie->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
      
        <div class="form-group">
            <label class="control-label">Nombre</label>
            <input required type="text"  class="form-control" name="nombre" placeholder="Nombre de la mascota">
        </div>
        <div class="form-group">
            <label class="control-label">Precio</label>
            <input required type="text" class="form-control" name="precio" placeholder="Precio en pesos $$">
        </div>
        <div class="form-group">
            <label class="control-label">Fecha de nacimiento</label>
            <input required type="date" class="form-control" name="nacimiento" >
        </div>
        
        <div class="form-group">
            <label class="control-label">País</label>
            <select class="form-control" name="pais" id="slcPais" required>
                <option selected disabled value="">Elige un país</option>
                @foreach($paises as $pais)
                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Estado</label>
            <select class="form-control" name="estado" id="slcEstado" required>
                <option selected disabled value="">Elige un estado</option>
                
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear nueva mascota</button>
        </div>
    </form>
@endsection

@section('scripts')
<script>
    function doChangePais(event) {
        $.get("/api/estados/" + $("#slcPais").val(),
            function (data) {
                console.log(data);
            });
    }

    $(function () {
        $("#slcPais").change(doChangePais);
    });
</script>

@endsection