<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PajakRequest extends FormRequest
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
            'nama' => 'required',
            'rate' => 'numeric|min:1|max:100|required'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Pajak harus diisi / tidak boleh kosong',
            'rate.required' => 'Rate Pajak harus diisi / tidak boleh kosong',
            'rate.numeric' => 'Rate harus diisi dengan Angka/Decimal',
            'rate.min' => 'Minimal Rate adalah 1%',
            'rate.max' => 'Minimal Rate adalah 100%'
        ];
    }
}
