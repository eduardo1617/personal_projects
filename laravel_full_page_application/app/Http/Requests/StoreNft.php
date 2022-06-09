<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNft extends FormRequest
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
            'author_id' => 'required', Rule::exists('users', 'id'),
            'owner_id' => 'required', Rule::exists('users', 'id'),
            'collection_id' => 'required', Rule::exists('collections', 'id'),
            'img_path' => 'required', 'mimes:jpg,bmp,png,jpeg|max:7168',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required', 'integer',
            'royalty' => 'required'
        ];
    }
}
