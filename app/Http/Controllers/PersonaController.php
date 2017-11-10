<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Persona;

class PersonaController extends Controller
{
	public function index(){

		return view('persona.tabla');
	}

	public function VistaCrear()
	{
		return view('persona.crear');
	}

	public function Mostrar($id)
	{
		// return "este es el mensaje con id " . $id;
		$datos = DB::table('adm_tri.vw_personas')->where('id_pers', $id)->first();
		return view('persona.mostrar', compact('datos'));
	}

	public function Editar(Request $request, $id)
	{
		DB::table('adm_tri.vw_personas')->where('id_pers', $id)->update([
				"pers_fnac" => $request->input('fechanac'),
				"pers_sexo" => $request->input('sexo'),
				"pers_nro_doc" => $request->input('numdoc'),
				"pers_tip_doc" => $request->input('tipodoc'),
				"pers_raz_soc" => $request->input('razons'),
				"pers_nombres" => $request->input('names'),
				"pers_ape_mat" => $request->input('apaterno'),
				"pers_ape_pat" => $request->input('amaterno'),

			]);
		
		return redirect('/tabla');
	}

	public function Registrar(Request $request){
		// dd($request->all());

		DB::table('adm_tri.vw_personas')->insert([

			"pers_fnac" => $request->input('fechanac'),
			"pers_sexo" => $request->input('sexo'),
			"pers_nro_doc" => $request->input('numdoc'),
			"pers_tip_doc" => $request->input('tipodoc'),
			"pers_raz_soc" => $request->input('razons'),
			"pers_nombres" => $request->input('names'),
			"pers_ape_mat" => $request->input('apaterno'),
			"pers_ape_pat" => $request->input('amaterno'),

		]);

		return redirect('/tabla');
	}

	public function Eliminar($id)
	{
		DB::table('adm_tri.vw_personas')->where('id_pers', $id)->delete();
		return redirect('/tabla');
	}

    public function GetDatos()
    {
    	$page = $_GET['page'];
        $limit = $_GET['rows'];
        $sidx = $_GET['sidx'];
        $sord = $_GET['sord'];

        $totalg = DB::select("select count(id_pers) as total from adm_tri.vw_personas");

        $total_pages = 0;
        if (!$sidx) {
            $sidx = 1;
        }
        $count = $totalg[0]->total;
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        }
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $start = ($limit * $page) - $limit; // do not put $limit*($page - 1)  
        if ($start < 0) {
            $start = 0;
        }

        $sql = DB::table('adm_tri.vw_personas')->orderBy($sidx, $sord)->limit($limit)->offset($start)->get();


        $Lista = new \stdClass();
        $Lista->page = $page;
        $Lista->total = $total_pages;
        $Lista->records = $count;
        
        
        foreach ($sql as $Index => $Datos) {
            $Lista->rows[$Index]['id'] = $Datos->id_pers;            
            $Lista->rows[$Index]['cell'] = array(
                trim($Datos->pers_fnac),
                trim($Datos->pers_sexo),
                trim($Datos->pers_nro_doc),
                // trim(str_replace("-", "",$Datos->contribuyente)), 
                trim($Datos->pers_tip_doc),
                trim($Datos->pers_raz_soc),
                trim($Datos->pers_nombres),
                trim($Datos->pers_ape_mat),
                trim($Datos->pers_ape_pat),
                trim($Datos->contribuyente)
            );
        }

        // dd($sql);
        return response()->json($Lista);

    }
}
