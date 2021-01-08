<?php

namespace App\Http\Requests;

use App\Email;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_edit');
    }

    public function rules()
    {
        return [
            'name'    => [
                'string',
                'nullable',
            ],
            'email'   => [
                'string',
                'nullable',
            ],
            'subject' => [
                'string',
                'nullable',
            ],
            'message' => [
                'string',
                'nullable',
            ],
        ];
    }
}
