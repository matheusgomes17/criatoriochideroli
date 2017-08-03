<?php

namespace SKT\Models\Catalog\Product\Traits;

use Carbon\Carbon;

/**
 * Class CategoryAccess.
 */
trait ProductAccess
{
    public function hasImage()
    {
        return ($this->image && file_exists($this->getImagePath('original'))) ? true : false;
    }

    public function getImageUrl($type = 'original')
    {
        return asset('/files'.$this->image->getPath($type));
    }

    public function getImagePath($type)
    {
        return base_path('public/files'.$this->image->getPath($type));
    }

    public function getImageType()
    {
    	return ['cover', 'original', 'thumb'];
    }
}