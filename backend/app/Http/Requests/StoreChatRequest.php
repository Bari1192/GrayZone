<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // 'response_family' => ['required', 'string', Rule::in('Temu Tricks', 'Carsharing Tips', 'Error Fares')],
            'message' => ['required', 'string', 'max:150'],
            // 'response_child' => ['string'],
        ];
    }
}
