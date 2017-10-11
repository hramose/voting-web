<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class candidateChecker extends FormRequest
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
            'admin_id' => 'required|max:12',
            'password' => 'required|max:12',
            'fname' => 'required|max:20',
            'mname' => 'required|max:20',
            'lname' => 'required|max:20',
            'grade' => 'required|max:12',
            'section' => 'required|max:30',
            'email' => 'required|email|max:50',
            'position' => 'required|max:30',
            'image' => 'required',
            'partylist' => 'required|max:50'
        ];
    }
}
