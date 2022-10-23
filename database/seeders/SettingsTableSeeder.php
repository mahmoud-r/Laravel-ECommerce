<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    protected $settings = [

        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'test@test.com',
        ],
        [
            'key'                       =>  'phone',
            'value'                     =>  '01146562057',
        ],
        [
            'key'                       =>  'address',
            'value'                     =>  '321 Suspendis matti, Visaosang Building VST District, NY Accums , North American',
        ],
        [
            'key'                       =>  'contact_us_desc',
            'value'                     =>  'Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec
                                             sagittis sem nibh id elit. Duis sed odio sit amet nibh vultate cursus a sit amet mauris. Proin gravida nibh vel velit auctor',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon_on_white',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  '',
        ],

        [
            'key'                       =>  'social_facebook',
            'value'                     =>  'https://www.facebook.com/profile.php?id=100004763050731',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  'https://twitter.com/mahmodramadan44',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  'https://www.instagram.com/mahmoud.lla',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  'https://www.linkedin.com/in/mahmoud-ramadan-a05b6b166',
        ],


    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
