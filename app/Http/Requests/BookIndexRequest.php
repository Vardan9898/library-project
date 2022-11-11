<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $draw
 * @property string $start
 * @property string $length
 */
class BookIndexRequest extends FormRequest
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
            'draw'   => ['string', 'max:255'],
            'start'  => ['string', 'max:255'],
            'length' => ['string', 'max:255'],
        ];
    }
}
