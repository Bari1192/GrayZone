<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // 'response_family' => ['required', 'string', Rule::in(['Temu Tricks', 'Carsharing Tips', 'Error Fares']), 'exists:response_family'],
            'message' => ['required', 'string', 'max:150'],
            'response_child' => ['string'],
        ];
    }
}
