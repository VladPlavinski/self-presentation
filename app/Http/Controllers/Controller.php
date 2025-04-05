<?php

namespace App\Http\Controllers;

use App\Helpers\PersonalData;
use Illuminate\Support\Facades\App;

abstract class Controller
{
    protected $personalData, $professionalData, $projectsData;

    public function __construct()
    {
        $value = session('locale') ?? app('request')->get('locale');
        if($value){
            App::setLocale($value);
        }
        $dataContainer = app('personalData');
        $this->personalData = $dataContainer->getPersonal();
        $this->professionalData = $dataContainer->getProfessional();
        $this->projectsData = $dataContainer->getProjects();
    }
}
