<?php

namespace App\Http\Requests\Books;

use App\Providers\CodesServiceProvider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBookFormRequest extends FormRequest
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
            "title"                  =>      "required|string|min:1|max:100",
            "price"                  =>      "required|number|min:0|max:100",
            "author"                 =>      "required|string|min:1|max:100",
            "editor"                 =>      "required|string|min:1|max:100"
        ];

        return $rules;
    }
}
