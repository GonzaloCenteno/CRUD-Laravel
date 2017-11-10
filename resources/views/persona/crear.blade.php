@extends('layouts.app')

@section('title', 'Crear Persona')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">REGISTRAR NUEVA PERSONA</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/tabla') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Fecha de Nacimiento</label>
                            <input type="text" class="datepicker form-control" name="fechanac" value="{{ old('fechanac') }}">
                        </div>
                    </div>
                
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Sexo</label>
                            <select class="form-control" name="sexo" value="{{ old('sexo') }}" >
                              <option value="2">::SELECCIONAR UNA OPCION::</option> 
                              <option value="0">MASCULINO</option>
                              <option value="1">FEMENINO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Numero del Documento</label>
                            <input type="text" class="form-control" name="numdoc" value="{{ old('numdoc') }}">
                        </div>
                    </div>
                
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipo del Documento</label>
                            <input type="number" class="form-control" name="tipodoc" value="{{ old('tipodoc') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Razon Social</label>
                            <input type="text" class="form-control" name="razons" value="{{ old('razons') }}">
                        </div>
                    </div>
                
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombres</label>
                            <input type="text" class="form-control" name="names" value="{{ old('names') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apaterno" value="{{ old('apaterno') }}">
                        </div>
                    </div>
                
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="amaterno" value="{{ old('amaterno') }}">
                        </div>
                    </div>
                </div>
                

                <button class="btn btn-primary">Registrar Persona</button>
                <a href="{{ url('/tabla') }}" class="btn btn-default">Cancelar</a>

            </form>

        </div>

    </div>

</div>

@endsection
