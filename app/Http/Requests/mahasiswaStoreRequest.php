<?php

namespace App\Http\Requests;
use app\Models\Mahasiswa;
use Illuminate\Foundation\Http\FormRequest;

class mahasiswaStoreRequest extends FormRequest
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
            'prodi_id'=>'required|numeric',
            'angkatan'=>'required|numeric',
            'nim'=>'required|unique:mahasiswas,nim,' .$this->segment(2)
        ];
    }

    public function messages()
    {
        return [
            'nim.required'=>'nim harus diisi',
            'nama.required'=>'nama harus diisi',
            'prodi_id.required'=>'prodi harus diisi',
            'angkatan.required'=>'angkatan harus diisi',
            'nim.unique'=>'nim sudah ada',
            'prodi_id.numeric'=>'angkatan harus angka',
            'angkatan.numeric'=>'angkatan harus angka',
        ];
    }
}
