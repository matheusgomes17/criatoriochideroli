<?php

namespace SKT\Http\Requests\Backend\System\Gallery;

use SKT\Http\Requests\Request;

/**
 * Class StoreGalleryRequest.
 */
class StoreGalleryRequest extends Request
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
            //
        ];
    }
}
