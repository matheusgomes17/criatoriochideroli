<?php

namespace SKT\Models\Catalog\Order\Traits\Attribute;

use Carbon\Carbon;

/**
 * Trait OrderAttribute.
 */
trait OrderAttribute
{
    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return string
     */
    public function getListItemsAttribute()
    {
        $item = [];

        foreach ($this->items as $value) {
            $item[] = $value->products->name;
        }

        return '<ul style="margin: 0px; padding: 0px;"><li style="margin: 0px; padding: 0px;">' . implode('</li><li>', $item) . '</li></ul>';
    }

    /**
     * @return string
     */
    public function getShelfLifeAttribute()
    {
        $date = Carbon::parse($this->attributes['created_at'])->addMonths(1);
        return date('d/m/Y', strtotime($date));
    }

    /**
     * @return string
     */
    public function getUserAttribute()
    {
        return ucwords(strtolower($this->users->name));
    }

    /**
     * @return string
     */
    public function getAnswerPdfAttribute()
    {
        if (! $this->isActive()) {
            return '<a href="' . route('admin.catalog.order.answer.create', $this) . '" class="btn btn-xs btn-danger"><i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.to_pdf') . '"></i></a>';
        }
    }

    /**
     * @return string
     */
    public function getAnswerButtonAttribute()
    {
        if ($this->isActive()) {
            return '<a href="' . route('admin.catalog.order.answer.create', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-commenting" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.answer') . '"></i></a> ';
        }
        
        return '<a href="' . route('admin.catalog.order.answer.show', ['id' => $this, 'answerId' => $this->answers]) . '" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.view') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getPrintButtonAttribute()
    {
        if (! $this->isActive()) {
            return '<a href="#" id="print00' . $this->id . '" class="btn btn-xs btn-success"><i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Imprimir"></i></a> ';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getAnswerButtonAttribute().
            $this->getPrintButtonAttribute();
    }

    /**
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

    /**
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    /**
     * @return string
     */
    public function getOrderDescAttribute()
    {
        if ($this->isActive()) {
            return "Orçamento <b>#00{$this->attributes['id']}";
        }

        return "<a href='" . route('frontend.user.order.show', $this) . "'>Orçamento <b>#00{$this->attributes['id']}</b></a>";
    }

    /**
     * @return string
     */
    public function getManagerNameAttribute()
    {
        if (! is_null($this->managers)) {
            
            return $this->managers->name;
        }

        return '----';
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if (! $this->isActive()) {
            return "<label class='label label-success'>Respondido</label>";
        }

        return "<label class='label label-warning'>Pendente</label>";
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if ($this->isActive()) {
            return '<a href="#" class="btn btn-xs btn-warning"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="Aguardando Resposta"></i></a> ';
        }

        return '<a href="' . route('frontend.user.order.show', $this) . '" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="Visualizar"></i></a> ';
    }

    /**
     * @return string
     */
    public function getPdfGeneratorAttribute()
    {
        return '<a href="' . route('frontend.user.order.pdf', $this) . '" class="btn btn-xs btn-danger"><i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Gerar PDF"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontActionButtonsAttribute()
    {
        if (is_null($this->managers)) {
            return '';
        }

        return $this->getShowButtonAttribute().
            $this->getPrintButtonAttribute().
            $this->getPdfGeneratorAttribute();
    }
}