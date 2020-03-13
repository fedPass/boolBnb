<?php

namespace App\Http\Controllers\admin;
// li aggiungo perchè stanno su un namespace diverso

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Option;
// Federica: facade used to interact with any of your configured disks
use Illuminate\Support\Facades\Storage;
//----

class ApartmentController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $apartments = Apartment::where('user_id', auth()->user()->id)->get();
      return view('admin.apartments.index' , ['apartments' => $apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Option::all();
        return view('admin.apartments.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $new_apartment = new Apartment();
      $new_apartment->fill($data);
      $new_apartment->user_id = auth()->user()->id;
      //Federica: --- start facade used to interact with any of your configured disks
      //IMPORTANT: da rivedere forse si deve fare un ciclo per tutte 5 le img
      // if(!empty($data['img'])) {
      //     //prendi il file
      //     $img = $data['img'];
      //     //estraggo la path
      //     $img_path = Storage::put('uploads', $img);
      //     //salvo la path
      //     $new_apartment->img = $img_path;
      // }
      //--- end facade
      $new_apartment->save();
      return redirect()->route('admin.apartments.index');
      //
      // $alfa_romeo = new Auto();
      // $alfa_romeo->marca = “Alfa Romeo”
      // $alfa_romeo->targa = “AB000AD”;

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
      dd($apartment);
      return view('admin.apartments.show', ['apartment' => $apartment]);
    }

//     public function show($id)
// {
//     $post = Post::find($id);
//     return view('admin.posts.show', ['post' => $post]);
// }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //Federica ---prendo le options per creare le checkbox e le passo alla view
        $options = Option::all();
        //---
      return view('admin.apartments.edit', ['apartment' => $apartment, 'options' => $options]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
      $data = $request->all();
      $apartment->update($data);
      return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
      $apartment->delete();
      return redirect()->route('admin.apartments.index');
    }
}
