<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', "exists:App\Models\User,user_name"],
            'email' => ['required', 'string', "exists:App\Models\User,email"],
            'home_page' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'parent_id' => ['nullable', 'string', "exists:App\Models\Note,id"],
            'g-recaptcha-response' => ['required'],
            
        ];
    }
}
