<?php

namespace SKT\Http\Requests\Backend\Blog\Post;

use SKT\Http\Requests\Request;

/**
 * Class UpdatePostRequest.
 */
class UpdatePostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->hasRole(1);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
