<?php

namespace App\Http\Requests\Backend\Kebaya;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKebayaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'image' => 'required',
        ];
    }
}
