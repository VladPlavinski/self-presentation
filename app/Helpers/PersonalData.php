<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class PersonalData
{
    private $personalData = [
        'birthdateBase' => '1995-02-13',
        'phone' => '+375 (29) 818-72-60',
        'gmail' => 'vl.plavinski@gmail.com',
        'socialLinks' => [
            'telegram' => 'https://t.me/vldpl',
            'whatsapp' => 'https://wa.me/qr/RLUGYNVQCXIHI1',
            'linkedin' => 'https://www.linkedin.com/in/vlad-plavinski-0b5721251',
        ],
        'languages' => [
            'ru' => 6,
            'en' => 4,
            'fr' => 1,
        ],
        'interests' => [
            'programming' => 10,
            'sport' => 5,
            'gaming' => 12,
            'handmade' => 8,
            'boardGames' => 11,
            'travelling' => 9,
            'reading' => 13,
            'nature' => 7,
            'music' => 12,
        ],
    ];
    private $professionalData = [
        'stack' => [
            'html5',
            'php',
            'laravel',
            'css3',
            'bootstrap',
            'tailwind',
            'javascript',
            'jquery',
            'vue',
            'axios',
            'mysql',
            'redis',
            'vite',
            'git',
            'docker',
        ],
        'hard' => [
            'org',
            'principles',
            'workflow',
            'patterns',
            'code',
            'speech',
        ],
        'soft' => [
            'punctuality',
            'response',
            'efficiency',
            'learn',
            'communication',
            'team',
            'result',
        ],
    ];
    private $projectsData = [
        [
            'id' => 'troinaya',
            'year' => '2019',
            'link' => 'https://www.troinaya.ru/',
            'features' => [
                'profile',
                'auth',
                'bonuses',
                'seo',
                'maps',
                'exchange',
            ],
        ],
        [
            'id' => 'karachay_horse',
            'year' => '2019',
            'link' => 'https://karachayhorse.org/',
            'features' => [
                'main',
                'personal',
                'services',
                'detail',
            ],
        ],
        [
            'id' => 'leader-id',
            'year' => '2020-2021',
            'link' => 'https://leader-id.ru/',
            'features' => [
                'exchange',
                'rest',
                'auth',
                'logs',
            ],
        ],
        [
            'id' => 'nero',
            'year' => '2020',
            'link' => 'https://www.neroelectronics.ru/',
            'features' => [
                'markups',
                'domains',
                'discounts',
            ],
        ],
        [
            'id' => 'rikc',
            'year' => '2020',
            'link' => 'https://russia-israel.com/',
            'features' => [
                'funnel',
                'diagram',
                'amcharts',
            ],
        ],
        [
            'id' => 'kokoc_group',
            'year' => '2021',
            'link' => 'https://kokocgroup.ru/',
            'features' => [
                'feedback',
                'active',
                'settings',
            ],
        ],
        [
            'id' => 'korus_consulting',
            'year' => '2020-2024',
            'link' => 'https://korusconsulting.ru/',
            'features' => [
                'modules',
                'rework',
                'processes',
            ],
            'color' => 'dark',
        ],
    ];

    public function __construct()
    {
        $this->calculatePersonalData();
    }

    private function calculatePersonalData()
    {
        Carbon::setLocale(App::getLocale());
        $this->personalData['birthdate'] = Carbon::parse($this->personalData['birthdateBase']);
        $this->personalData['yearsOld'] = $this->personalData['birthdate']->diff(Carbon::now())->format('%Y');
        $this->personalData['birthdateFormatted'] = $this->personalData['birthdate']->translatedFormat('d F Y');
        $this->personalData['yearsOldFormatted'] = $this->personalData['yearsOld'].' '.trans_choice("cv.info.years", $this->personalData['yearsOld']);
        $this->personalData['clearPhone'] = Str::replaceMatches('/[ ()-]++/', '', $this->personalData['phone']);
    }

    public function getPersonal()
    {
        return $this->personalData;
    }

    public function getProfessional()
    {
        return $this->professionalData;
    }

    public function getProjects()
    {
        return $this->projectsData;
    }
}
