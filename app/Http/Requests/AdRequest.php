<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdRequest extends Request
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
            'job-title'          => 'required',
            'job-description'    => 'required',
            'job-email'          => 'required',
        ];
    }


    public function messages()
    {
         return [
             'job-title.required'          => 'To πεδίο ΤΙΤΛΟΣ είναι υποχρεωτικό.',
             'job-description.required'    => 'To πεδίο ΠΕΡΙΓΡΑΦΗ είναι υποχρεωτικό.',
             'job-email.required'          => 'To πεδίο Ε-MAIL είναι υποχρεωτικό.'
         ];
    }

}
