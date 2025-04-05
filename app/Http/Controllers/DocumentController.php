<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class DocumentController extends Controller
{
    private $word;
    private $structure;
    private $styles = [
        'paragraph' => [
            'centered' => ['align' => 'center'],
        ],
        'fonts' => [
            'leftFont' => ['color' => 'ffffff'],
            'leftTitleFont' => ['color' => 'ffffff', 'size' => 12, 'bold' => true],
            'titleFont' => ['size' => 12, 'bold' => true],
            'link' => ['size' => 11, 'italic' => true, 'color' => '4444ff'],
        ],
        'tables' => [
            'leftTable' => ['cellMarginRight' => 200,'cellMarginLeft' => 200,'cellMarginTop' => 100,'cellMarginBottom' => 50],
            'rightTable' => ['cellMarginRight' => 100,'cellMarginLeft' => 100,'cellMarginTop' => 50],
            'interestsTable' => ['cellMarginRight' => 50],
            'skillsTable' => ['cellMarginRight' => 100, 'cellMarginLeft' => 100],
        ],
        'section' => ['marginLeft' => 5, 'marginRight' => 5, 'marginTop' => 0, 'marginBottom' => 0],
        'leftPart' => ['bgColor' => '804220'],
        'leftPartHighlighted' => ['bgColor' => 'd5932b'],
    ];
    private $sizes = [
        'photo' => 180,
        'stackPicture' => 40,
        'border' => 24,
        'pageHeight' => 16830,
        'leftWidth' => 4500,
        'rightWidth' => 7500,
        'interestsWidth' => 2000,
    ];

    public function getDocument(Request $request)
    {
        $filename = __('cv.info.name').".docx";
        $objWriter = IOFactory::createWriter($this->getFilledWord(), 'Word2007');
        header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header( 'Content-Disposition: attachment; filename='.$filename);
        $objWriter->save( "php://output");
    }

    private function getFilledWord()
    {
        $this->word = new PhpWord();
        $this->makeWordStyles();
        $this->makeWordStructure();
        $this->fillStructure();
        return $this->word;
    }

    private function makeWordStyles(){
        $this->styles['leftPartBordered'] = ['borderBottomColor' => 'd5932b', 'borderBottomSize' => $this->sizes['border']];
        $this->styles['rightPartBordered'] = ['borderBottomColor' => '804220', 'borderBottomSize' => $this->sizes['border']];
        $this->styles['photo'] = ['width' => $this->sizes['photo'],'height' => $this->sizes['photo'],'align' => 'center'];
        $this->styles['hardSkills'] = ['borderRightColor' => '804220', 'borderRightSize' => $this->sizes['border']];
        foreach ($this->styles['fonts'] as $name => $style){
            $this->word->addFontStyle($name, $style);
        }
        foreach ($this->styles['tables'] as $name => $style){
            $this->word->addTableStyle($name, $style);
        }
        foreach ($this->styles['paragraph'] as $name => $style){
            $this->word->addParagraphStyle($name, $style);
        }
    }

    private function makeWordStructure()
    {
        $section = $this->word->addSection($this->styles['section']);
        $baseRow = $section->addTable()->addRow($this->sizes['pageHeight']);
        $leftTable = $baseRow->addCell($this->sizes['leftWidth'], $this->styles['leftPart'])->addTable('leftTable');
        $rightTable = $baseRow->addCell($this->sizes['rightWidth'])->addTable('rightTable');
        $this->structure = [
            'left' => [
                'photo' => $leftTable->addRow()->addCell($this->sizes['leftWidth']),
                'info' => $leftTable->addRow()->addCell($this->sizes['leftWidth'], $this->styles['leftPartBordered']),
                'contacts' => $leftTable->addRow()->addCell($this->sizes['leftWidth']),
                'languages' => $leftTable->addRow()->addCell($this->sizes['leftWidth'], $this->styles['leftPartHighlighted']),
                'interests' => $leftTable->addRow()->addCell($this->sizes['leftWidth'], $this->styles['leftPartBordered']),
                'bio' => $leftTable->addRow()->addCell($this->sizes['leftWidth']),
            ],
            'right' => [
                'stack' => $rightTable->addRow()->addCell($this->sizes['rightWidth'],  $this->styles['rightPartBordered']),
                'skills' => $rightTable->addRow()->addCell($this->sizes['rightWidth'], $this->styles['rightPartBordered']),
                'projects' => $rightTable->addRow()->addCell($this->sizes['rightWidth']),
            ],
        ];
    }

    private function fillStructure()
    {
        $this->addPhoto();
        $this->addBasicInfo();
        $this->addContacts();
        $this->addLanguages();
        $this->addInterests();
        $this->addStack();
        $this->addSkills();
        $this->addBio();
        $this->addProjects();
    }

    private function addPhoto()
    {
        $this->structure['left']['photo']->addImage(resource_path('images/self-photo.jpg'), $this->styles['photo']);
    }

    private function addBasicInfo()
    {
        $infoText = $this->structure['left']['info']->addTextRun();
        $infoText->addText(__('cv.info.nameTitle').": ", 'leftTitleFont');
        $infoText->addText(__('cv.info.name'), 'leftFont');
        $infoText->addTextBreak();
        $infoText->addText(__('cv.info.birthdateTitle').": ", 'leftTitleFont');
        $infoText->addText($this->personalData['birthdateFormatted'], 'leftFont');
        $infoText->addTextBreak();
        $infoText->addText(__('cv.info.educationTitle').": ", 'leftTitleFont');
        $infoText->addText(__('cv.info.education'), 'leftFont');
    }

    private function addContacts()
    {
        $contactsText = $this->structure['left']['contacts']->addTextRun();
        $contactsText->addText("\t".__('sections.contacts').":", 'leftTitleFont');
        $contactsText->addTextBreak();
        $contactsText->addText(__('social.phone').": ", 'leftTitleFont');
        $contactsText->addText("\t".$this->personalData['phone'], 'leftFont');
        $contactsText->addTextBreak();
        $contactsText->addText(__('social.gmail').": ", 'leftTitleFont');
        $contactsText->addText("\t".$this->personalData['gmail'], 'leftFont');
        foreach ($this->personalData['socialLinks'] as $name => $link){
            $contactsText->addTextBreak();
            $contactsText->addLink($link, "\t\t".__("social.$name"), 'link');
        }
    }

    private function addLanguages()
    {
        $languagesText = $this->structure['left']['languages']->addTextRun();
        $languagesText->addText("\t".__('cv.info.languages-title').":", 'leftTitleFont');
        foreach ($this->personalData['languages'] as $code => $level){
            $languagesText->addTextBreak();
            $languagesText->addText("   ".__("cv.info.languages.$code")."\t- ".__("cv.info.languageLevels.$level"), 'leftFont');
        }
    }

    private function addInterests()
    {
        $interestsTable = $this->structure['left']['interests']->addTable('interestsTable');
        $interestsTable->addRow()->addCell(null, ['gridSpan' => 2])->addText("\t".__('bio.interests.title').":", 'leftTitleFont');
        $interestsRows = array_chunk($this->personalData['interests'], 2, true);
        foreach ($interestsRows as $interests){
            $row = $interestsTable->addRow();
            if(count($interests) < 2){
                $interests[''] = '';
            }
            foreach ($interests as $subject => $value){
                if($subject != '') $row->addCell($this->sizes['interestsWidth'])->addText(__("bio.interests.interests.$subject"), 'leftFont');
            }
        }
    }

    private function addBio()
    {
        $bioText = $this->structure['left']['bio']->addTextRun();
        $bioText->addText("\t".__('bio.bio.title').": ", 'leftTitleFont');
        $bioText->addTextBreak();
        $bioParts = [
            'bornAt',
            'university',
            'army',
            'universityEnds',
            'duringWorkTime',
            'workExperience'
        ];
        $bioText->addText('   ');
        foreach ($bioParts as $part){
            $bioText->addText(__("bio.bio.$part").' ', 'leftFont');
        }
    }

    private function addStack()
    {
        $stackTable = $this->structure['right']['stack']->addTable();
        $stackTable->addRow()->addCell(7500, ['gridSpan' => 5])->addText(__('cv.skills.stack-title'), 'titleFont', 'centered');
        $stack = array_chunk($this->professionalData['stack'], 5);
        foreach ($stack as $listIndex => $list){
            $listRow = $stackTable->addRow();
            $rowStyle = [
                'valign' => 'center'
            ];
            if($listIndex < (count($stack) -1)){
                $rowStyle['borderBottomColor'] = '804220';
                $rowStyle['borderBottomSize'] = intval($this->sizes['border'] / 2);
            }
            foreach ($list as $itemIndex => $item){
                $cellStyle = $rowStyle;
                if($itemIndex < (count($list) -1)){
                    $cellStyle['borderRightColor'] = '804220';
                    $cellStyle['borderRightSize'] = intval($this->sizes['border'] / 2);
                }
                $cell = $listRow->addCell(1500, $cellStyle);
                $image = $this->getResizedStackFile($item);
                $image['parameters']['align'] = 'center';
                $cell->addImage($image['filepath'], $image['parameters']);
            }
        }
    }

    private function getResizedStackFile($stack)
    {
        $result = $this->getStackFileData($stack);
        if($this->isStackFileTooBig($result['parameters'])){

            $result['parameters'] = $this->getResizeFileData($result['parameters']);
        }
        return $result;
    }

    private function getStackFileData($stack)
    {
        $file = resource_path("images/stack/$stack.png");
        $size = getimagesize($file);
        return [
            'filepath' => $file,
            'parameters' => [
                'width' => $size[0],
                'height' => $size[1],
            ],
        ];
    }

    private function isStackFileTooBig($parameters){
        return $parameters['width'] > $this->sizes['stackPicture'] || $parameters['height'] > $this->sizes['stackPicture'];
    }

    private function getResizeFileData($parameters)
    {
        $newSize = [];
        $max = $parameters['width'] > $parameters['height'] ? 'width' : 'height';
        $relation = intval($parameters[$max] / $this->sizes['stackPicture']);
        $newSize['width'] = intval($parameters['width'] / $relation);
        $newSize['height'] = intval($parameters['height'] / $relation);
        return $newSize;

    }

    private function addSkills()
    {
        $skillsRow = $this->structure['right']['skills']->addTable('skillsTable')->addRow();
        $hardText = $skillsRow->addCell(3750, $this->styles['hardSkills'])->addTextRun();
        $hardText->addText("\t".__('cv.skills.hard-title'), 'titleFont');
        foreach ($this->professionalData['hard'] as $skill){
            $hardText->addTextBreak();
            $hardText->addText(__("cv.skills.hard-skills.$skill"));
        }

        $softText = $skillsRow->addCell(3750, ['align' => 'left'])->addTextRun();
        $softText->addText("\t".__('cv.skills.soft-title'), 'titleFont');
        foreach ($this->professionalData['soft'] as $skill){
            $softText->addTextBreak();
            $softText->addText(__("cv.skills.soft-skills.$skill"));
        }
    }

    private function addProjects()
    {
        $this->structure['right']['projects']->addText(__('exp.projects.title').": ", 'titleFont', 'centered');
        foreach ($this->projectsData as $company){
            $itemRun = $this->structure['right']['projects']->addTextRun();
            $itemRun->addLink($company['link'], __("exp.projects.".$company['id'].".name"), 'link');
            $itemRun->addText(" (".$company['year'].")");
            foreach ($company['features'] as $feature){
                $itemRun->addTextBreak();
                $itemRun->addText("  > ".__("exp.projects.".$company['id'].".features.$feature"));
            }
        }
    }
}
