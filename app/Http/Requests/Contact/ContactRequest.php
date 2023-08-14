<?php

namespace App\Http\Requests\Contact;

use App\Enums\ContactType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return intval(Auth::id()) === intval($this->user_id);
    }

    public function rules()
    {
        return [
            "name" => "required|string|max:255",
            "phone_number" => "required|string",
            "address" => "required|string|max:255",
            "user_id" => "required|numeric",
        ];
    }
}
