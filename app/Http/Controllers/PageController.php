<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

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
                    'parts' => ['skills', 'bio', 'info'],
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
                        'bio' => [
                            'birthdate' => $personalData['birthdate']->format('d.m.Y'),
                            'yearsOld' => $personalData['birthdate']->diff(Carbon::now())->format('%Y'),
                        ],
                        'info' => [
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
                                    'name' => 'Интернет-магазин «Тройная точка»',
                                    'link' => 'https://www.troinaya.ru/',
                                    'year' => '2019',
                                    'features' => 'Добавил личный кабинет с авторизацией через соц. сети, бонусную программу, рассылки, SEO-оптимизацию, встроил «Яндекс Карты» и добавил обмен с 1С.',
                                ],
                                [
                                    'id' => 'karachay_horse',
                                    'name' => 'Интернет-магазин «KarachayHorse»',
                                    'link' => 'https://karachayhorse.org/',
                                    'year' => '2019',
                                    'features' => 'Доработал главную страницу и личный кабинет, предоставляемые услуги и детальные страницы лошадей.',
                                ],
                                [
                                    'id' => 'nero',
                                    'name' => 'Интернет-магазин «Nero Electronics»',
                                    'link' => 'https://www.neroelectronics.ru/',
                                    'year' => '2019',
                                    'features' => 'Произвёл SEO-оптимизацию: добавил микроразметки open graph и schema.org, а так же настроил корректные карты сайтов и robots.txt для поддоменов',
                                ],
                                [
                                    'id' => 'leader-id',
                                    'name' => 'Площадка «Leader-Id»',
                                    'link' => 'https://leader-id.ru/',
                                    'year' => '2020',
                                    'features' => 'Реализовал высоконагруженную загрузку пользовательских данных с площадки в CRM посредством REST, с использованием OAuth 2.0',
                                ],
                                [
                                    'id' => 'rikc',
                                    'name' => 'Портал «РИКЦ»',
                                    'link' => 'https://russia-israel.com/',
                                    'year' => '2020',
                                    'features' => 'Настроил визуализацию воронки продаж и прочих данных CRM при помощи AmCharts',
                                ],
                                [
                                    'id' => 'kokoc_group',
                                    'name' => 'Компания «Kokoc Group»',
                                    'link' => 'https://kokocgroup.ru/',
                                    'year' => '2021',
                                    'features' => 'Для модуля «Улей. Оценка 360» доработал визуальное отображение элементов и их настройку, а также добавил вкладку активных опросов',
                                ],
                                [
                                    'id' => 'korus_consulting',
                                    'name' => 'Компания «Корус Консалтинг»',
                                    'link' => 'https://korusconsulting.ru/',
                                    'year' => 'c 2020',
                                    'features' => 'Для корпоративного портала реализовал модули корпоративного документооборота, NPS-опросов, Exit-интервью, Feedback-опросов, доработал модули Резюме и бронирования рабочих мест, также были переработаны существовавшие бизнес-процессы онбординга новых сотрудников, заявок на аренду ПО и согласования отпусков.',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'bio',
                    'name' => __('sections.bio'),
                    'parts' => ['earliest', 'middle', 'now'],
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
        return view('page')->with(['data' => $data]);
    }

    public function changeLocale(Request $request)
    {
        $newLocale = $request->get('locale', 'ru');
        return redirect(route('page'))->with('locale', $newLocale);
    }
}
