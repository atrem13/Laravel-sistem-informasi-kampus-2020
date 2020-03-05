<?php

namespace App\Http\Requests;

use App\Models\KrsDetail;
use Illuminate\Foundation\Http\FormRequest;

class krsDetailStoreRequest extends FormRequest
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
            'jadwal_kuliah_id'=>'required',
            'krs_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'jadwal_kuliah_id.required'=>'jadwal kuliah harus dipilih',
            'krs_id.required'=>'krs id harus diisi'
        ];
    }
}
