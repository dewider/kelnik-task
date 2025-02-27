<?php

namespace App\Http\Requests;

use App\Services\Article\ArticleService;
use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_map(function ($fieldDetails) {
            return isset($fieldDetails['rule'])
                ? $fieldDetails['rule']
                : '';
        }, ArticleService::getFormFields());
    }

/**
 * @return array<string, string>
 */
public function attributes(): array
{
    return array_map(function ($fieldDetails) {
        return $fieldDetails['title'];
    }, ArticleService::getFormFields());
}
}
