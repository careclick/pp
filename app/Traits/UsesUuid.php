<?php

namespace App\Traits;
use Ramsey\Uuid\Uuid;


trait UsesUuid
{
  public static function bootUsesUuid()
    {
        static::creating(function ($model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}