<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:6',
            'user_level' => 'required|between:1,6|numeric',
            'first_name' => 'required|max:255|',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'date_of_birth' => 'required|before:' . Carbon::tomorrow(),
            'salary' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'code' => 404,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

}
