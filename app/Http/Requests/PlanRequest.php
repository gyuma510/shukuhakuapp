<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'plan_name' => ['required'],
            'description' => ['required', 'max:255'],
        ];
    }
}
