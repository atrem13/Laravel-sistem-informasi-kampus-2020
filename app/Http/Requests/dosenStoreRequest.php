<?php

namespace App\Http\Requests;
use app\Models\Dosen;
use Illuminate\Foundation\Http\FormRequest;

class dosenStoreRequest extends FormRequest
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
            'nama'=>'required',
            'notelp'=>'numeric',
            'nidn'=> 'required|unique:dosens,nidn, ' . $this->segment(2)
        ];
    }

    // custom message for validation
    public function messages()
    {
        return [
            'nama.required'=>'nama harus diisi',
            'nidn.required'=>'nidn harus diisi',
            'nidn.unique'=>'nidn sudah ada',
            'notelp.numeric'=>'notelp harus angka'
        ];
    }
}
