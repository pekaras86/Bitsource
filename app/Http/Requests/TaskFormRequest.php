<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskFormRequest extends Request
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
            'taskTitle'        => 'required',
            'taskDescription'  => 'required',
            'taskBudget'       => 'required',
        ];
    }


    public function messages()
    {
         return [
             'taskTitle.required'       => 'To πεδίο ΤΙΤΛΟΣ είναι υποχρεωτικό.',
             'taskDescription.required' => 'To πεδίο ΠΕΡΙΓΡΑΦΗ είναι υποχρεωτικό.',
             'taskBudget.required'      => 'To πεδίο ΠΡΟΫΠΟΛΟΓΙΣΜOΣ είναι υποχρεωτικό.'
         ];
    }

}
