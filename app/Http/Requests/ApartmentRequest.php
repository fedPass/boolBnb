<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'titolo' => 'required|string|min:2|max:255',
          'stanze' => 'required|numeric|min:1',
          'posti_letto'=> 'required|numeric|min:1',
          'bagni'=> 'required|numeric|min:1',
          'dimensioni'=> 'required', 'integer', 'min:1',
          'descrizione'=> 'required',
          'indirizzo'=> 'required',
          'paese'=> 'required',
          'images[]'=> 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:4048'
        ];
    }
}
