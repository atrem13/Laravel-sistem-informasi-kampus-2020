<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class khsDetailStoreRequest extends FormRequest
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
            'khs_id'=>'required',
            'jadwal_kuliah_id'=>'required',
            'nilai'=>'numeric'
        ];
    }

    public function messages()
    {
        return [
            'khs_id.required'=>'data tidak ditemukan',
            'jadwal_kuliah_id.required'=>'data tidak ditemukan',
            'nilai.numeric'=>'nilai berupa angka'
        ];
    }
}
