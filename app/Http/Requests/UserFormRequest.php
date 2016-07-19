<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserFormRequest extends Request
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
            'description' => 'required',
            'category'    => 'required',
            'title'       => 'required',
        ];
    }


    public function messages()
    {
         return [
             'description.required' => 'To πεδίο ΠΕΡΙΓΡΑΦΗ είναι υποχρεωτικό.',
             'category.required'    => 'To πεδίο ΚΑΤΗΓΟΡΙΑ είναι υποχρεωτικό.',
             'title.required'       => 'To πεδίο ΤΙΤΛΟΣ ΕΡΓΑΣΙΑΣ είναι υποχρεωτικό.'
         ];
    }

}
