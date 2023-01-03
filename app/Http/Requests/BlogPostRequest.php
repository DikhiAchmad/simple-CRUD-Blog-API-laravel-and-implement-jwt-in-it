<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'title' => 'required|string|max:255',
                        'body' => 'required|string|max:255',
                    ];
                }
                break;
            case 'PUT': {
                    return [
                        'title' => 'required|string|max:255',
                        'body' => 'required|string|max:255',
                    ];
                }
                break;
        }
    }
}