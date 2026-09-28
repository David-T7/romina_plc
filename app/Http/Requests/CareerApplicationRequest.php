<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CareerApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $today = now()->toDateString();

        $openSlugs = array_column(
            array_filter(config('careers.positions'), function ($p) use ($today) {
                return $p['is_open'] && ($p['deadline'] === null || $p['deadline'] >= $today);
            }),
            'slug'
        );

        return [
            'full_name'    => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email:rfc', 'max:200'],
            'phone'        => ['required', 'string', 'regex:/^[+0-9\s\-(). ]{7,25}$/'],
            'position'     => ['required', 'string', Rule::in(array_merge(['general'], array_values($openSlugs)))],
            'cover_letter' => ['nullable', 'string', 'max:5000'],
            'cv'           => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'cv.required'  => 'Please attach your CV.',
            'cv.mimes'     => 'Your CV must be a PDF, DOC, or DOCX file.',
            'cv.max'       => 'Your CV must be smaller than 5 MB.',
            'phone.regex'  => 'Please enter a valid phone number.',
            'position.in'  => 'Please select a valid position.',
        ];
    }
}
