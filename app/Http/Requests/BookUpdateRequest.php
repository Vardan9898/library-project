<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property array $publishers
 * @property array $authors
 */
class BookUpdateRequest extends FormRequest
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
            'authors'    => ['required', 'array', 'exists:authors,id'],
            'publishers' => ['required', 'array', 'exists:publishers,id'],
        ];
    }
}
