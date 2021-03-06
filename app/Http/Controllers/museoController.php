<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class museoController extends Controller
{
    protected  $fields;
    protected  $base;

    public function __construct(){ 
        $this->fields = array("nombre","pais","autor");
        $this->base = Http::baseUrl("http://localhost:8003/api/v1/cuadros");
    }

    public function index() {

        $data = $this->base
            ->withHeaders([
                'my_id' => 6,
            ])->get("");

        $cuadros = $data->json();
        $cuadros = $cuadros['data'];
        $fields = $this->fields;

        return view("welcome", compact("cuadros", "fields"));
    }

    public function buscar(Request $request) {

        if (empty($request->nombre) and empty($request->pais) and empty($request->autor)) {
            return back();
        }
  
        $filters = ['nombre' => $request->nombre,
                      'pais' => $request->pais,
                     'autor' => $request->autor];
        
        if($request->fields == "todos"){
            $filterFields = "*";  
        }else {
            $filterFields = "'" . implode("','", $request->fields) . "'";
        }

        $data = $this->base->withHeaders([
            'my_id' => 6,
        ])->get("buscar/filtro", [
            'filters' => $filters,
            'fields' => $filterFields
        ]);

        $cuadros = $data->json();

        $cuadros = $cuadros['data'];
        $fields = $this->fields;

        return view("welcome", compact("cuadros","fields"));

    }

    /*
    ** test para calcular el tiempo de respuesta de la api
    */

    public function tiempo() {

        $inicial = microtime(true);

        $data = $this->base->withHeaders([
            'my_id' => 6,
        ])
        ->get("");

        $cuadros = $data->json();

        $final = microtime(true);

        $tiempo = $final - $inicial;

        dd($tiempo);
    }

}
