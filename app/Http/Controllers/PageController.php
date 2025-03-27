<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function show()
    {
        if(session('locale')){
            App::setLocale(session('locale'));
        }
        $personalData = [
          'birthdate' => Carbon::parse('1995-02-13'),
          'phone' => '+375 (29) 818-72-60',
          'email' => 'vl.plavinski@gmail.com',
          'socialLinks' => [
              'telegram' => 'https://t.me/vldpl',
              'whatsapp' => 'https://wa.me/qr/RLUGYNVQCXIHI1',
              'linkedin' => 'https://www.linkedin.com/in/vlad-plavinski-0b5721251',
          ],
        ];
        $data = [
            'sections' => [
                [
                    'id' => 'start',
                    'name' => __('sections.welcome'),
                    'parts' => ['start'],
                    'inMenu' => false,
                ],
                [
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
                            'birthdate' => $personalData['birthdate']->format('d.m.Y'),
                            'yearsOld' => $personalData['birthdate']->diff(Carbon::now())->format('%Y'),
                            'phone' => $personalData['phone'],
                            'email' => $personalData['email'],
                            'socials' => $personalData['socialLinks'],
                        ],
                    ],
                ],
                [
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
                                    'link' => 'https://kokocgroup.ru/',
                                    'year' => '2021',
                                ],
                                [
                                    'id' => 'korus_consulting',
                                    'link' => 'https://korusconsulting.ru/',
                                    'year' => '2020-2024',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'bio',
                    'name' => __('sections.bio'),
                    'parts' => ['bio', 'interests'],
                ],
                [
                    'id' => 'contacts',
                    'name' => __('sections.contacts'),
                    'parts' => ['contacts'],
                    'partsData' => [
                        'contacts' => [
                            'phone' => $personalData['phone'],
                            'email' => $personalData['email'],
                            'socials' => $personalData['socialLinks'],
                        ],
                    ],
                ],
            ],
        ];
        foreach ($data['sections'] as $key => $section){
            if(count($section['parts']) > 0){
                foreach ($section['parts'] as $part){
                    $data['sections'][$key]['partsData'][$part]['prefix'] = "{$section['id']}.{$part}";
                }
            }
        }
        return view('page')->with(['data' => $data]);
    }

    public function changeLocale(Request $request)
    {
        $newLocale = $request->get('locale', 'ru');
        return redirect(route('page'))->with('locale', $newLocale);
    }
}
