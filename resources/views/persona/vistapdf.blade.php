

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
	table th {
	  text-align: center;
	}
	table tr {
	  text-align: right;
	}
	table tr:nth-child(4) {
	  text-align: center;
	}
	table#mitabla {
    border-collapse: collapse;
    border: 1px solid #CCC;
    font-size: 12px;
	}
	 
	table#mitabla th {
	    font-weight: bold;
	    background-color: #E1E1E1;
	    padding:5px;
	}
	 
	table#mitabla tbody tr:hover td {
	    background-color: #F3F3F3;
	}
	 
	table#mitabla td {
	    padding: 5px 10px;
	}
	h1 {
		padding-top: 40px;
	}

</style>



<img src="C:/xampp/htdocs/Registro/public/img/escudo.png" align="left">
<h1>::REPORTE DE PERSONAS::</h1>
<br><br><br><br>

<table border="1" id="mitabla" >
	<thead>
		<tr>
			<th>FECHA NACIMIENTO</th>
			<th>SEXO</th>
			<th>NUMERO DOCUMENTO</th>
			<th>TIPO DOCUMENTO</th>
			<th>RAZON SOCIAL</th>
			<th>NOMBRE COMPLETO</th>
			<th>CONTRIBUYENTE</th>
		</tr>
	</thead>
	<tbody>
		@foreach($personas as $persona)
		<tr>
			<th>{{ $persona->pers_fnac }}</th>
			<th>{{ $persona->sexualidad }}</th>
			<th>{{ $persona->pers_nro_doc }}</th>
			<th>{{ $persona->pers_tip_doc }}</th>
			<th>{{ $persona->pers_raz_soc }}</th>
			<th>{{ $persona->nombre }}</th>
			<th>{{ $persona->contribuyente }}</th>
		</tr>
		@endforeach
	</tbody>
</table>