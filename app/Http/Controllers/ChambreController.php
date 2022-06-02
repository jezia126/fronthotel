<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$chambres = Chambre::all()->toArray();
        return array_reverse($chambres);  

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chambre = new Chambre ([
        'numchambre' => $request->input('numchambre'),
        'type' => $request->input('type'),
        'prix'=> $request->input('prix'),
        'caracteristiques'=> $request->input('caracteristiques'),
        'imagechambre'=> $request->input('imagechambre')
    ]);
    $chambre->save();

    return response()->json('Chambre créée !');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chambre  $chambre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        $chambre = Chambre::find($id);
        return response()->json($chambre);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chambre  $chambre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {        $chambre = Chambre::find($id);
        $chambre->update($request->all());

        return response()->json('Chambre MAJ !');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chambre  $chambre
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {        $chambre = Chambre::find($id);
        $chambre->delete();
        return response()->json('Chambre supprimée !');

        //
    }
}
