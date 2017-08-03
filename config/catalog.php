<?php

return [

    /*
     * Products table used to store products
     */
    'products_table' => 'products',

    /*
     * Product model used by Catalog to create correct relations.
     * Update the product if it is in a different namespace.
    */
    'product' => SKT\Models\Catalog\Product\Product::class,

    /*
     * Categories table used to store categories
     */
    'categories_table' => 'categories',

    /*
     * Category model used by Catalog to create correct relations.
     * Update the category if it is in a different namespace.
    */
    'category' => SKT\Models\Catalog\Category\Category::class,

    /*
     * Order table used to store orders
     */
    'orders_table' => 'orders',

    /*
     * Order model used by Catalog to create correct relations.
     * Update the order if it is in a different namespace.
    */
    'order' => SKT\Models\Catalog\Order\Order::class,

    /*
     * Order table used to store orders
     */
    'orders_items_table' => 'orders_items',

    /*
     * OrderItem model used by Catalog to create correct relations.
     * Update the order if it is in a different namespace.
    */
    'order_item' => SKT\Models\Catalog\Order\OrderItem::class,

    /*
     * Order table used to store orders
     */
    'orders_answers_table' => 'orders_answers',

    /*
     * OrderAnswer model used by Catalog to create correct relations.
     * Update the order if it is in a different namespace.
    */
    'order_answer' => SKT\Models\Catalog\Order\OrderAnswer::class,

];