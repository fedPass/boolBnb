<?php

namespace App\Http\Controllers\admin;
// li aggiungo perchè stanno su un namespace diverso

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Apartment;
use App\Option;
use App\Sponsor;
use Illuminate\Support\Facades\Validator;
// Federica: facade used to interact with any of your configured disks
use Illuminate\Support\Facades\Storage;
use Braintree_Transaction;
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
     * Get a validator for an incoming creation request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = [
            'titolo.required' => 'Titolo richiesto',
            'titolo.min' => 'Minimo 2 carateri',
            'titolo.max' => 'Titolo troppo lungo!',
            'visibilita.required' => 'Nascondi o mostra?',
            'stanze.required' => 'Campo richiesto',
            'stanze.integer' => 'Campo non negativo!',
            'stanze.min' => 'Minimo 2 carateri',
            'posti_letto.required' => 'Campo richiesto',
            'posti_letto.integer' => 'Campo non negativo!',
            'posti_letto.min' => 'Minimo 2 carateri',
            'bagni.required' => 'Campo richiesto',
            'bagni.integer' => 'Campo non negativo!',
            'dimensioni.required' => 'Campo richiesto',
            'dimensioni.integer' => 'Campo non negativo!',
            'descrizione.required' => 'Campo richiesto',
            'via.required' => 'Campo richiesto',
            'civico.required' => 'Campo richiesto',
            'civico.integer' => 'Campo non negativo!',
            'cap.required' => 'Campo richiesto',
            'cap.integer' => 'Campo non negativo!',
            'cita.required' => 'Campo richiesto',
            'provincia.required' => 'Campo richiesto',
            'paese.required' => 'Campo richiesto'
        ];

        return Validator::make($data, [
            'titolo' => ['required', 'string', 'min:2','max:255'],
            'stanze' => ['required', 'integer', 'min:1'],
            'posti_letto' => ['required', 'integer','min:1'],
            'bagni' => ['required', 'integer', 'min:1'],
            'dimensioni' => ['required', 'integer', 'min:1'],
            'descrizione' => ['required', 'string'],
            'via' => ['required', 'string'],
            'civico' => ['required', 'integer', 'min:1'],
            'cap' => ['required', 'integer', 'min:1'],
            'cita' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'paese' => ['required', 'string', 'min:2']
        ],$message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Option::all();
        // dd($options);
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
        // da fare: inserire validate()
      $data = $request->all();
      $new_apartment = new Apartment();
      $new_apartment->fill($data);
        if($request->input('visibilita')){
            $new_apartment->visibilita = 1;
        } else{
            $new_apartment->visibilita = 0;
        }
      $new_apartment->user_id = auth()->user()->id;
      //Federica: --- start facade used to interact with any of your configured disks
          if(!empty($data['img'])) {
              //prendi il file
              $img = $data['img'];
              //estraggo la path
              $img_path = Storage::put('uploads', $img);
              //salvo la path
              $new_apartment->img = $img_path;
          }
          //--- end facade
      $new_apartment->save();
      //fede: prima salvo e poi popolo tab pivot per options
          //se ho selezionato delle options le assegno all'apart
          //controllo quindi l'array che ho creato dal form
          if (!empty($data['nome_id'])) {
              //la funzione options() è quello dichiarata nel model Apartment
              //sync per popolare tabella pivot (fill si occupa della tab Apartment)
              $new_apartment->options()->sync($data['nome_id']);
          }


      return redirect()->route('admin.apartments.index');


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
      // dd($apartment);
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
    public function edit($id)
    {
        //Federica ---prendo le options per creare le checkbox e le passo alla view
        $apartment = Apartment::find($id);
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
    public function update(Request $request, $id)
    {
      // da fare: inserire validate()
      $apartment = Apartment::find($id);
      $data = $request->all();
        if(isset($data['visibilita'])){
            $data['visibilita'] = 1;
        } else{
            $apartment->visibilita = 0;
        }
      // da fare: creare if per vedere se img cambia, eventualmente cancella da storage quella precedente e fare put in storage della nuova
      $apartment->update($data);
      // da fare: se ho selezionato dei nuovi servizi (quindi ho un array con elementi) devo fare sync() dell'array altrimenti sync([]) du array vuoto
      if (!empty($data['nome_id'])) {
          //la funzione options() è quello dichiarata nel model Apartment
          //sync per popolare tabella pivot (fill si occupa della tab Apartment)
          $apartment->options()->sync($data['nome_id']);
      }
      return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //da fare: prevedere delete da Storage
        //da fare: se l'array delle options non è vuoto fare sync([]) di array vuoto per cancellare options da apartment e cancellare la relazione tra le due tabelle
      $apartment = Apartment::find($id);
      if($apartment->options->isNotEmpty()) {
            $apartment->options()->sync([]);
        }
      $apartment->delete();
      return redirect()->route('admin.apartments.index');
    }

    public function updateStatus(Request $request)
    {
        $apartment = Apartment::findOrFail($request->apartment_id);

        $apartment->visibilita = $request->visibilita;
        $apartment->save();

        return response()->json(['message' => 'Apartment status updated successfully.']);
    }

    //funzione provvisoria per promo
    public function promoEdit($id)
    {
        $apartment = Apartment::find($id);
        return view('admin.promo',['apartment' => $apartment]);
    }

    //funzione per attivare braintree payment
    public function process(Request $request)
    {

        $apartment_id= $request->apartmentID;
        $nonce = $request->payment_method_nonce;
        $amount = 0;
        $sponsor_id = 0;
        $promo = $request->promo;
        switch ($promo){
            case 24:
                $amount = 2.99;
                $sponsor_id = 1;
                break;
            case 72:
                $amount = 5.99;
                $sponsor_id = 2;
                 break;
             case 144:
                $amount = 9.99;
                 $sponsor_id = 3;
                break;
        }


        $status = Braintree_Transaction::sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        //dd($status);
        if ($status->success){
            $transaction = $status->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);
            $apartment = Apartment::find($apartment_id);
            $apartment->sponsors()->attach($sponsor_id,['due_date' => Carbon::now()->addHour($promo)]);


            $apartments = Apartment::where('user_id', auth()->user()->id)->get();
            $sponsors = Sponsor::all();
            return view('admin.apartments.index' , ['apartments' => $apartments, 'sponsors' => $sponsors])->with('success_message', 'Transaction successful. The ID is:'. $transaction);
        }
       //return  response()->json($status);

    }
}
