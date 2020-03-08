<?php

namespace App\Http\Requests;

use App\Models\Khs;
use Illuminate\Foundation\Http\FormRequest;

class khsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'krs_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'krs_id.required'=>'data tidak ditemukan'
        ];
    }
}
