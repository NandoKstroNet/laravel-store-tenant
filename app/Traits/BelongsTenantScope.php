<?php

namespace App\Traits;

use App\Scopes\TenantScope;

trait BelongsTenantScope
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope());
    }
}
