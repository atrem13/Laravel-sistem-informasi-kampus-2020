<?php

namespace App\Http\Requests;
use App\Models\Prodi;
use Illuminate\Foundation\Http\FormRequest;

class prodiStoreRequest extends FormRequest
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
            'nama'=>'required|unique:prodis,nama, ' . $this->segment(2)
        ];
    }

    public function messages()
    {
        return[
            'nama.required' => 'nama harus diisi',
            'nama.unique' => 'nama jurusan sudah ada'
        ];
    }
}
