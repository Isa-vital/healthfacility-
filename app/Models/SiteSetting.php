<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'label', 'icon', 'sort_order'];

    protected static function booted(): void
    {
        static::saved(fn ($s) => static::forgetCache($s));
        static::deleted(fn ($s) => static::forgetCache($s));
    }

    protected static function forgetCache(self $setting): void
    {
        Cache::forget("site_setting.{$setting->key}");
        Cache::forget("site_settings.group.{$setting->group}");
    }

    public static function getValue(string $key, $default = null)
    {
        return Cache::rememberForever("site_setting.$key", function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function group(string $group)
    {
        return Cache::rememberForever("site_settings.group.$group", function () use ($group) {
            return static::where('group', $group)->orderBy('sort_order')->get();
        });
    }
}
