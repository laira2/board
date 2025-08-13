<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author'    => 'required|exists:users,id',
            'board_id'  => 'required|exists:boards,id',
            'startDate'    => 'required|date',
            'endDate'  => 'required|date|after_or_equal:start_date',
            'type'  => 'required|string|max:50',
        ];
    }

}
