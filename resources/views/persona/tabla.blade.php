@extends('layouts.app')

@section('title', 'Listado de Personas')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>


<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de Personas</h2>

                <div class="team">
                    <div class="row">
                    
                    <a href="{{ url('/crear') }}" class="btn btn-primary btn-round">NUEVA PERSONA</a>
                    <a onclick="getSelectedRow()" class="btn btn-default btn-round">ELIMINAR PERSONA</a>
                    <a href="{{ url('/pdf') }}" class="btn btn-danger btn-round">EXPORTAR PDF</a>

                    <hr>

                    <table id="tabla">
                        
                    </table>
                    <div id="paginador"></div>



                    </div>
                </div>

        
        </div>
    </div>
</div>

    

@endsection
