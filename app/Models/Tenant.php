<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    protected $fillable = [
        'id',
        'name',
        'subdomain',
        'owner_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Get the owner of the tenant
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the full domain for this tenant
     */
    public function getFullDomainAttribute(): string
    {
        $centralDomain = config('app.url');
        $domain = str_replace(['http://', 'https://'], '', $centralDomain);
        return $this->subdomain . '.' . $domain;
    }

    /**
     * Check if subdomain is available
     */
    public static function isSubdomainAvailable(string $subdomain): bool
    {
        return !static::where('subdomain', $subdomain)->exists();
    }
}
