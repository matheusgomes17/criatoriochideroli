<?php

namespace SKT\Http\Requests\Backend\Catalog\Category;

use SKT\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreCategoryRequest.
 */
class StoreCategoryRequest extends Request
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
            'name'     => 'required|max:191',
            'description'  => 'required|max:191',
        ];
    }
}
