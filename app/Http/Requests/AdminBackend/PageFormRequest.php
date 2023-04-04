<?php

namespace App\Http\Requests\AdminBackend;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'seo_title' => ['required','string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Поле «Название» является обязательным',
            'title.string' => 'Поле «Название» должно быть текстовым',
            'seo_title.required' => 'Поле «Seo Заголовок» является обязательным',
            'seo_title.string' => 'Поле «Seo Заголовок» должно быть текстовым',
        ];
    }
}
