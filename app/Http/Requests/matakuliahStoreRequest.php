<?php

namespace App\Http\Requests;
use App\Models\Matakuliah;
use Illuminate\Foundation\Http\FormRequest;

class matakuliahStoreRequest extends FormRequest
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
            'kode'=>'required|unique:matakuliahs,kode,' . $this->segment(2),
            'nama' => 'required|unique:matakuliahs,nama,' . $this->segment(2)
        ];
    }
    public function messages(){
        return [
            'kode.required'=>'kode harus diisi',
            'kode.unique'=>'kode sudah ada',
            'nama.required'=>'nama harus diisi',
            'nama.unique'=>'nama sudah ada'
        ];
    }
}
