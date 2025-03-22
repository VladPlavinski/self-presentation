<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function show()
    {
        if(session('locale')){
            App::setLocale(session('locale'));
        }
        $data = [
            'colors' => ['dark', 'light', 'cont'],
            'sections' => [
                [
                    'id' => 'welcome',
                    'name' => __('sections.welcome'),
                    'parts' => ['start'],
                    'partsData' => [
                        'start' => 'Start Data'
                    ],
                ],
                [
                    'id' => 'cv',
                    'name' => __('sections.cv'),
                ],
                [
                    'id' => 'skills',
                    'name' => __('sections.skills'),
                ],
                [
                    'id' => 'bio',
                    'name' => __('sections.bio'),
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
