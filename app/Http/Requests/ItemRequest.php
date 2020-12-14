<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'pajak_id' => 'array|array|min:2'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi / tidak boleh kosong',
            'pajak_id.size' => 'Pajak harus dipilih. Minimal 2'
        ];
    }
}
