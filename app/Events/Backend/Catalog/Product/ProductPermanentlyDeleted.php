<?php

namespace SKT\Events\Backend\Catalog\Product;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProductPermanentlyDeleted.
 */
class ProductPermanentlyDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $product;

    /**
     * @param $product
     */
    public function __construct($product)
    {
        $this->product = $product;
    }
}
