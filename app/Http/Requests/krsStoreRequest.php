<?php

namespace App\Http\Requests;

use App\Models\Krs;
use Illuminate\Foundation\Http\FormRequest;

class krsStoreRequest extends FormRequest
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
            'mahasiswa_id'=>'required',
            'semester'=>'required|numeric',
            'status'=>'numeric'
        ];
    }
    public function messages()
    {
        return [
            'mahasiswa_id.required'=>'mahasiswa harus diisi',
            'semester.required'=>'semester harus diisi',
            'semester.numeric'=>'semester harus berupa angka',
            'status.numeric'=>'status harus berupa angka'
        ];
    }
}
