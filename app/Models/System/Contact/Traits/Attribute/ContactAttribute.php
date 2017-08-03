<?php

namespace SKT\Models\System\Contact\Traits\Attribute;

use Carbon\Carbon;

/**
 * Class ContactAttribute.
 */
trait ContactAttribute
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
    public function getNameAttribute()
    {
        return ucwords(strtolower($this->attributes['name']));
    }

    /**
     * @return string
     */
    public function getEmailAttribute()
    {
        return strtolower($this->attributes['email']);
    }

    /**
     * @return string
     */
    public function getSubjectAttribute()
    {
        return ucfirst(strtolower($this->attributes['subject']));
    }

    /**
     * @return string
     */
    public function getPhoneAttribute()
    {
        if (! is_null($this->attributes['phone'])) {
            return $this->attributes['phone'];
        }
        return 'Não foi informado um telefone';
    }

    /**
     * @return string
     */
    public function getMessageAttribute()
    {
        return ucfirst($this->attributes['message']);
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
    public function getAnswerButtonAttribute()
    {
        if ($this->isActive()) {
            return '<a href="' . route('admin.system.contact.answer.create', $this) . '" class="btn btn-xs btn-success"><i class="fa fa-commenting" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.answer') . '"></i></a> ';
        }
        
        return '<a href="' . route('admin.system.contact.answer.show', ['id' => $this, 'answerId' => $this->answers]) . '" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.view') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getAnswerButtonAttribute();
    }
}