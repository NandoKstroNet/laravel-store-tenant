<?php

namespace App\Traits;

use App\Models\Tenant;
use App\Scopes\TenantScope;

trait BelongsTenantScope
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function bootBelongsTenantScope()
    {
        static::addGlobalScope(new TenantScope());

        static::creating(function($model) {
            if(session()->has('tenant'))
                $model->tenant_id = session()->get('tenant');
        });
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
