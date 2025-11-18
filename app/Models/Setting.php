<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    public static function set(string $key, $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    public static function has(string $key): bool
    {
        return static::where('key', $key)->exists();
    }

    public static function forget(string $key): void
    {
        static::where('key', $key)->delete();
    }

    public static function all(): array
    {
        return static::query()->pluck('value', 'key')->toArray();
    }
}
