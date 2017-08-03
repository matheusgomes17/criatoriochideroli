<?php

namespace SKT\Http\Requests\Frontend\User;

use SKT\Http\Requests\Request;

/**
 * Class ChangePhoneRequest.
 */
class ChangePhoneRequest extends Request
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
            'ddd'   => 'required|min:2',
            'phone' => 'required|min:8',
        ];
    }
}
