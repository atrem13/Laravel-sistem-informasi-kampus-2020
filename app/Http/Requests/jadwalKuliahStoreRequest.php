<?php

namespace App\Http\Requests;
use App\Models\JadwalKuliah;
use Illuminate\Foundation\Http\FormRequest;

class jadwalKuliahStoreRequest extends FormRequest
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
            'hari_id'=>'required',
            'matakuliah_id'=>'required',
            'dosen_id'=>'required',
            'ruangan_id'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'hari_id.required'=>'hari harus diisi',
            'matakuliah_id.required'=>'matakuliah harus diisi',
            'dosen_id.required'=>'dosen harus diisi',
            'ruangan.id_required'=>'ruangan harus diisi',
            'waktu_mulai.required'=>'waktu mulai harus diisi',
            'waktu_selesai.required'=>'waktu selesai harus diisi'
        ];
    }
}
