<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Option;
use Illuminate\Database\Eloquent\Builder;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // $apartments = Apartment::where('visibilita',$request->query('visibilita',1))->get();
      // $apartments = Apartment::paginate(12)
      $lat = $request->lat;
      $lon = $request->lon;
      $circle_radius = 20;
      $apartments = Apartment::where(function($query) use ($lat, $lon, $circle_radius){
                          $query->whereRaw("6371 * acos(cos(radians(" . $lat . "))
                                    * cos(radians(apartments.lat))
                                    * cos(radians(apartments.lon) - radians(" . $lon . "))
                                    + sin(radians(" .$lat. "))
                                    * sin(radians(apartments.lat))) <= " . $circle_radius);
                                  })->where('visibilita',$request->query('visibilita',1))->where('posti_letto', '>=' , $request->ospiti)->paginate();


      return view('apartments.index',compact('apartments'));
    }

    // 111.045

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $apartment = Apartment::find($id);
      // $apartment = Apartment::where('titolo')->get();
      return view('apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //
    }
}
