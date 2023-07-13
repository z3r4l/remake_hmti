<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => ['required','max:255', Rule::unique('posts', 'title')->ignore($this->post)],
            'category_id'   => 'required',
            'link'          => 'required',
            'body'          => 'required',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10048'
        ];
    }
}
