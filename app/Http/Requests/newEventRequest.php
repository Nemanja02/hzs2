<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest {

  public function authorize()
  {
    return false;
  }

  public function rules()
  {
    return [
        'name' => 'required',
        'city' => 'required',
        'type' => 'required',
        'desc' => 'required'
      ];
  }

}

?>