<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'service_name' => 'required|string|max:255',
            'comment' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date|after:today',
            'status' => 'required|in:new,pending,completed,canceled',
        ];
    }
}
