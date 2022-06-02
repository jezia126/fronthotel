<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$reservation = Reservation::with('chambres','clients')->get()->toArray();
        return array_reverse($reservation);  

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

        $reservation = new Reservation([
            'numreservation' => $request->input('numreservation'),
            'datearr' => $request->input('datearr'),
            'datedep' => $request->input('datedep'),
            'chambreID' => $request->input('chambreID'),
            'clientID'=>$request->input('clientID')
        ]);
        $reservation->save();

        return response()->json('reservation créée !');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return response()->json($reservation);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $reservation = Reservation::find($id);
        $reservation->update($request->all());

        return response()->json('reservation MAJ !');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$reservation = Reservation::find($id);
        $reservation->delete();

        return response()->json('reservation supprimée !');

        //
    }
    
}
