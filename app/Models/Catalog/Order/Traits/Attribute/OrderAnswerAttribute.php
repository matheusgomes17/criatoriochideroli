<?php

namespace SKT\Models\Catalog\Order\Traits\Attribute;

/**
 * Trait OrderAnswerAttribute.
 */
trait OrderAnswerAttribute
{
    public function getListItemsAttribute()
    {
        $item = [];

        foreach ($this->items as $value) {
            $item[] = $value->products->name;
        }

        return '<ul><li>'.implode('</li><li>', $item).'</li></ul>';
    }

    /**
     * @return string
     */
    public function getMessageAttribute()
    {
        return $this->attributes['msg'];
    }

    /**
     * @return string
     */
    public function getAnswerButtonAttribute()
    {
        return '<a href="'.route('admin.catalog.order.answer.create', $this).'" class="btn btn-xs btn-success"><i class="fa fa-commenting" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.answer').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getAnswerButtonAttribute();
    }
}