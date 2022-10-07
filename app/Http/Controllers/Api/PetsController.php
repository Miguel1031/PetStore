<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pets\CreatePetRequest;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 100;

        if ($request->has('limit')) {
            $limit = $request->limit;
        }

        $pets = Pet::limit($limit)->get();

        return response()->json(['pets' => $pets], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreatePetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePetRequest $request, Exception $e)
    {
        try{
            Pet::create($request->validated());
            return response()->json([], 200);
        }catch(Exception $e){
            if ($e instanceof HttpException && $e->getStatusCode()== 404)
            {
                return ['status' =>404, 'msg' => "pagina no encontrada"];
            } else if($e instanceof HttpException && $e->getStatusCode()== 404){
                return ['status' =>400, 'msg' => "peticion mala"];
            }
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // No encontrado => 404
        // Error en codigo => 400 - bad request
        return response()->json(['pet' => Pet::find($id)], 200);
    }
}
