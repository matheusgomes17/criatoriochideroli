<?php

namespace SKT\Models\Catalog\Product\Traits\Attribute;

use Carbon\Carbon;

/**
 * Class ProductAttribute.
 */
trait ProductAttribute
{

    /**
     * @return boolean
     */
    public function hasSale()
    {
        if ($this->attributes['sold'] == true) {
            return "<div class='sale-flash'>VENDIDO</div>";
        }

        return "";
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>".trans('labels.general.active').'</label>';
        }

        return "<label class='label label-danger'>".trans('labels.general.inactive').'</label>';
    }

    /**
     * @return string
     */
    public function getSoldLabelAttribute()
    {
        if ($this->isSold()) {
            return "<label class='label label-danger'>Vendido</label>";
        }

        return "<label class='label label-primary'>Em Estoque</label>";
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return bool
     */
    public function isSold()
    {
        return $this->sold == true;
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.catalog.product.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.catalog.product.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        switch ($this->status) {
            case 0:
                return '<a href="'.route('admin.catalog.product.mark', [
                    $this,
                    1,
                ]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.catalog.products.activate').'"></i></a> ';
            // No break

            case 1:
                return '<a href="'.route('admin.catalog.product.mark', [
                    $this,
                    0,
                ]).'" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.catalog.products.deactivate').'"></i></a> ';
            // No break

            default:
                return '';
            // No break
        }
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.catalog.product.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="'.trans('buttons.general.cancel').'"
             data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
             data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
             class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.catalog.product.restore', $this).'" name="restore_product" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.catalog.products.restore_product').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.catalog.product.delete-permanently', $this).'" name="delete_product_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.catalog.products.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->getRestoreButtonAttribute().
                $this->getDeletePermanentlyButtonAttribute();
        }

        return
            $this->getShowButtonAttribute().
            $this->getEditButtonAttribute().
            $this->getStatusButtonAttribute().
            $this->getDeleteButtonAttribute();
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return ucwords(strtolower($this->attributes['name']));
    }

    /**
     * @return string
     */
    public function getCodeAttribute()
    {
        return strtoupper($this->attributes['code']);
    }

    /**
     * @return string
     */
    public function getHeightAttribute()
    {
        return $this->attributes['height'] . ' cm';
    }

    /**
     * @return string
     */
    public function getColorAttribute()
    {
        return ucwords(strtolower($this->attributes['color']));
    }

    /**
     * @return string
     */
    public function getWeightAttribute()
    {
        return $this->attributes['weight'] . ' kg';
    }

    /**
     * @return string
     */
    public function getCategoryAttribute()
    {
    	return ucwords(strtolower($this->categories->name));
    }

    /**
     * @return string
     */
    public function getBirthDayAttribute()
    {
        $date = new \DateTime($this->attributes['birthday']);
        $interval = $date->diff(new \DateTime());

        if ($interval->y > 0) {
            return $interval->format('%y ano(s)');
        }

        return $interval->format('%m meses');
    }

    /**
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return date('d/m/Y h:m', strtotime($this->attributes['created_at']));
    }

    /**
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}