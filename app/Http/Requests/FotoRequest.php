<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FotoRequest extends FormRequest
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
            'judul_foto' => 'required',
            'album_id' => 'required|exists:App\Models\Album,id', 
            'deskripsi_foto' => 'required', 
            'tgl_unggah' => 'required', 
            'image' => Rule::requiredIf($this->isMethod('POST')), 
        ];
    }
}
