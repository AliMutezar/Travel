<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [

            // diluar status dibawah ngga akan valid dan akan error
            'transaction_status'    =>  'required|string|', Rule::in(['IN_CART, PENDING, SUCCESS, CANCEL, FAILED'])
        ];
    }
}
