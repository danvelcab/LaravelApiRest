<?php

namespace App\Http\Requests\Books;

use App\Providers\CodesServiceProvider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditionBookFormRequest extends FormRequest
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
        $rules = [
            "title"                  =>      "required|string|max:100",
            "price"                  =>      "required|number|min:0",
            "author"                  =>      "required|string|max:100",
            "editor"                =>       "required|string|max:100"
        ];

        return $rules;
    }
}
