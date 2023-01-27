<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kegiatan_role_id' => 'required|integer|exists:kegiatan_roles,id',
            'satuan_id' => 'required|integer|exists:satuans,id',
            'role_id' => 'required|integer|exists:roles,id',
            'kode' => 'required|string',
            'name' => 'required|string',
            'target' => 'required|integer',
            'pagu' => 'required|integer',
            'tahun' => 'required|integer',
        ];
    }
}
