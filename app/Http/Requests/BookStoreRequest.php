<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property array $publishers
 * @property array $authors
 */
class BookStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'       => ['required', 'string', 'max:255'],
            'publishers' => ['required', 'array', 'exists:publishers,id'],
            'authors'    => ['required', 'array', 'exists:authors,id'],
        ];
    }
}
