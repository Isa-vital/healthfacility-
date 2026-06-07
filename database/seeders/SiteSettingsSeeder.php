<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $socials = [
            ['key' => 'social_facebook',  'label' => 'Facebook',  'icon' => 'bi-facebook',  'sort_order' => 10],
            ['key' => 'social_twitter',   'label' => 'X (Twitter)', 'icon' => 'bi-twitter-x', 'sort_order' => 20],
            ['key' => 'social_instagram', 'label' => 'Instagram', 'icon' => 'bi-instagram', 'sort_order' => 30],
            ['key' => 'social_linkedin',  'label' => 'LinkedIn',  'icon' => 'bi-linkedin',  'sort_order' => 40],
            ['key' => 'social_youtube',   'label' => 'YouTube',   'icon' => 'bi-youtube',   'sort_order' => 50],
            ['key' => 'social_tiktok',    'label' => 'TikTok',    'icon' => 'bi-tiktok',    'sort_order' => 60],
        ];

        foreach ($socials as $s) {
            SiteSetting::updateOrCreate(
                ['key' => $s['key']],
                array_merge($s, ['group' => 'social', 'value' => null])
            );
        }
    }
}
