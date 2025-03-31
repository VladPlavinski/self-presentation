<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class PageController extends Controller
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
    ];

    public function show()
    {
        if(session('locale')){
            App::setLocale(session('locale'));
        }
        $this->calculatePersonalData();
        $data = [
            'sections' => $this->getPageSectionsData(),
        ];
        return view('page')->with(['data' => $data]);
    }

    private function calculatePersonalData(){
        Carbon::setLocale(App::getLocale());
        $this->personalData['birthdate'] = Carbon::parse($this->personalData['birthdateBase']);
        $this->personalData['yearsOld'] = $this->personalData['birthdate']->diff(Carbon::now())->format('%Y');
        $this->personalData['birthdateFormatted'] = $this->personalData['birthdate']->translatedFormat('d F Y');
        $this->personalData['yearsOldFormatted'] = $this->personalData['yearsOld'].' '.trans_choice("cv.info.years", $this->personalData['yearsOld']);
        $this->personalData['clearPhone'] = Str::replaceMatches('/[ ()-]++/', '', $this->personalData['phone']);
    }

    private function getPageSectionsData()
    {
        $sections = [
            'start' => [
                'id' => 'start',
                'name' => __('sections.welcome'),
                'parts' => ['start'],
                'inMenu' => false,
            ],
            'cv' => [
                'id' => 'cv',
                'name' => __('sections.cv'),
                'parts' => ['skills', 'info'],
                'partsData' => [
                    'skills' => [
                        'stack' => [
                            'html5', 'php', 'laravel',
                            'css3', 'bootstrap', 'tailwind',
                            'javascript', 'jquery', 'vue',
                            'axios', 'mysql', 'redis',
                            'vite', 'git', 'docker',
                        ],
                    ],
                    'info' => [
                        'baseInfo' => [
                            [
                                'name' => 'name',
                                'svg' => 'person',
                            ],
                            [
                                'name' => 'birthdate',
                                'additionalToText' => [
                                    'date' => $this->personalData['birthdateFormatted'],
                                    'years' => $this->personalData['yearsOldFormatted'],
                                ],
                            ],
                            [
                                'name' => 'education',
                            ],
                        ],
                        'languages' => [
                            'ru' => 6,
                            'en' => 4,
                            'fr' => 1,
                        ],
                        'socials' => array_merge(
                            [
                                'phone' => "tel:{$this->personalData['clearPhone']}",
                                'gmail' => "mailto:{$this->personalData['gmail']}",
                            ],
                            $this->personalData['socialLinks']
                        ),
                    ],
                ],
            ],
            'exp' => [
                'id' => 'exp',
                'name' => __('sections.exp'),
                'parts' => ['start', 'projects'],
                'partsData' => [
                    'projects' => [
                        'companies' => [
                            [
                                'id' => 'troinaya',
                                'year' => '2019',
                                'link' => 'https://www.troinaya.ru/',
                            ],
                            [
                                'id' => 'karachay_horse',
                                'year' => '2019',
                                'link' => 'https://karachayhorse.org/',
                            ],
                            [
                                'id' => 'leader-id',
                                'year' => '2020-2021',
                                'link' => 'https://leader-id.ru/',
                            ],
                            [
                                'id' => 'nero',
                                'year' => '2020',
                                'link' => 'https://www.neroelectronics.ru/',
                            ],
                            [
                                'id' => 'rikc',
                                'year' => '2020',
                                'link' => 'https://russia-israel.com/',
                            ],
                            [
                                'id' => 'kokoc_group',
                                'year' => '2021',
                                'link' => 'https://kokocgroup.ru/',
                            ],
                            [
                                'id' => 'korus_consulting',
                                'year' => '2020-2024',
                                'link' => 'https://korusconsulting.ru/',
                                'color' => 'dark',
                            ],
                        ],
                    ],
                ],
            ],
            'bio' => [
                'id' => 'bio',
                'name' => __('sections.bio'),
                'parts' => ['bio', 'interests'],
                'partsData' => [
                    'bio' => [
                        'sections' => [
                            'shortlyAbout',
                            'additionalExp',
                            'postScriptum',
                        ],
                    ],
                    'interests' => [
                        'percentage' => [
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
                    ],
                ],
            ],
            'contacts' => [
                'id' => 'contacts',
                'name' => __('sections.contacts'),
                'parts' => ['contacts'],
                'partsData' => [
                    'contacts' => [
                        'phone' => $this->personalData['phone'],
                        'clearPhone' => $this->personalData['clearPhone'],
                        'gmail' => $this->personalData['gmail'],
                        'socials' => $this->personalData['socialLinks'],
                    ],
                ],
            ],
        ];
        $sections = $this->addPrefixesToSections($sections);
        return $sections;
    }

    private function addPrefixesToSections($sections){
        foreach ($sections as $index => $section){
            if(count($section['parts']) > 0){
                foreach ($section['parts'] as $part){
                    $sections[$index]['partsData'][$part]['prefix'] = "{$section['id']}.{$part}";
                }
            }
        }
        return $sections;
    }

    public function changeLocale(Request $request)
    {
        $newLocale = $request->get('locale', 'ru');
        return redirect(route('page'))->with('locale', $newLocale);
    }
}
