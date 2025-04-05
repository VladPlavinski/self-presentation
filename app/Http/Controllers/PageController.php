<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {
        $data = [
            'sections' => $this->getPageSectionsData(),
        ];
        return view('page')->with(['data' => $data]);
    }

    private function getPageSectionsData()
    {
        $sections = [
            'start' => $this->getStartSection(),
            'cv' => $this->getCvSection(),
            'exp' => $this->getExpSection(),
            'bio' => $this->getBioSection(),
            'contacts' => $this->getContactsSection(),
        ];
        $sections = $this->addPrefixesToSections($sections);
        return $sections;
    }

    private function getStartSection()
    {
        return [
            'id' => 'start',
            'name' => __('sections.welcome'),
            'parts' => ['start'],
            'inMenu' => false,
        ];
    }

    private function getCvSection()
    {
        return [
            'id' => 'cv',
            'name' => __('sections.cv'),
            'parts' => ['skills', 'info'],
            'partsData' => [
                'skills' => [
                    'stack' => $this->professionalData['stack'],
                    'hard' => $this->professionalData['hard'],
                    'soft' => $this->professionalData['soft'],
                ],
                'info' => [
                    'baseInfo' => [
                        [
                            'name' => 'name',
                            'svg' => 'person',
                        ],
                        [
                            'name' => 'birthdate',
                            'text' => $this->personalData['birthdateFormatted'].' ('.$this->personalData['yearsOldFormatted'].')',
                        ],
                        [
                            'name' => 'education',
                        ],
                    ],
                    'languages' => $this->personalData['languages'],
                    'socials' => array_merge(
                        [
                            'phone' => "tel:{$this->personalData['clearPhone']}",
                            'gmail' => "mailto:{$this->personalData['gmail']}",
                        ],
                        $this->personalData['socialLinks']
                    ),
                ],
            ],
        ];
    }

    private function getExpSection()
    {
        return [
            'id' => 'exp',
            'name' => __('sections.exp'),
            'parts' => ['start', 'projects'],
            'partsData' => [
                'projects' => [
                    'companies' => $this->projectsData
                ],
            ],
        ];
    }

    private function getBioSection()
    {
        return [
            'id' => 'bio',
            'name' => __('sections.bio'),
            'parts' => ['bio', 'interests'],
            'partsData' => [
                'bio' => [
                    'sections' => [
                        ['bornAt', 'expExceptEducation', 'university', 'army', 'expUniversityEnds'],
                        ['expStartWork', 'duringWorkTime', 'expGetExperience', 'workExperience'],
                        ['postScriptum'],
                    ],
                ],
                'interests' => [
                    'chartData' => $this->personalData['interests'],
                ],
            ],
        ];
    }

    private function getContactsSection()
    {
        return [
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
        ];
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
        return redirect(route('page'))->with('locale', $request->get('locale', 'ru'));
    }
}
