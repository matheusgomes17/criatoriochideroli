<?php

namespace SKT\Models\Catalog\Cart;

class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @param $id
     * @param $name
     * @return array
     */
    public function create($id, $name, $height, $image)
    {
        $this->items += [
            $id => [
                'qtd' => 1,
                'name' => $name,
                'height' => $height,
                'image' => $image
            ]
        ];

        return $this->items;
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        unset($this->items[$id]);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    public function clear()
    {
        $this->items = [];
    }
}