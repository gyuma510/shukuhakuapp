<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanPriceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'start_date' => ['required', 'date', 'after:yesterday'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'price' => ['required', 'integer', 'between:1,1000000'],
        ];
    }
}
