<?php

namespace Aptitus\Fairs\Application\Base;

use Aptitus\Fairs\Domain\Model\Fairs\Enum\StandTypeRules;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeAmphitryonRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeModelRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeRuleRepository;
use Aptitus\Fairs\Presentation\StandTypePresentation;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class StandTypeService
 *
 * @package Aptitus\Fairs\Application\Base
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class StandTypeService
{
    protected $standTypeModelRepository;
    protected $standTypeAmphitryonRepository;
    protected $standTypeRuleRepository;

    public function __construct(
        StandTypeModelRepository $repositoryModel,
        StandTypeAmphitryonRepository $repositoryAmphitryon,
        StandTypeRuleRepository $repositoryRule
    ) {
        $this->standTypeModelRepository = $repositoryModel;
        $this->standTypeAmphitryonRepository = $repositoryAmphitryon;
        $this->standTypeRuleRepository = $repositoryRule;
    }

    public function getModelsByStandTypeId($standTypeId)
    {
        return $this->standTypeModelRepository->findByStandTypeId($standTypeId);
    }

    public function getAmphitryonsByStandTypeId($standTypeId)
    {
        return $this->standTypeAmphitryonRepository->findByStandTypeId($standTypeId);
    }

    public function getRulesByStandTypeId($standTypeId)
    {
        return $this->standTypeRuleRepository->findByStandTypeId($standTypeId);
    }

    public function getDataDependenceRules($standTypeId)
    {
        return [
            'list' => [
                'models' => $this->getModelsByStandTypeId($standTypeId),
                'amphitryons' => $this->getAmphitryonsByStandTypeId($standTypeId)
            ],
            'rules' => StandTypePresentation::formatRules($this->getRulesByStandTypeId($standTypeId))
        ];
    }

    /**
     * @param $dataStand
     * @return bool
     * @throws BadRequestHttpException
     */
    public function validateRulesByStandTypeId($dataStand){
        $rules = StandTypePresentation::formatRulesValidateBack($this->getRulesByStandTypeId($dataStand['type_id']));
        $totalRulesToValidate = count($rules);
        $totalRulesValidated = 0;
        $rulesNotValidated = [];

        //VALIDATE IMAGES
        foreach ($dataStand['images'] as $item) {
            if(isset($rules[$item['type']])){
                if($rules[$item['type']]){
                    if($item['name'] != ''){
                        $totalRulesValidated++;
                    } else {
                        $rulesNotValidated[] = StandTypeRules::getValue($item['type']);
                    }
                } else {
                    $totalRulesValidated++;
                }
                unset($rules[$item['type']]);
            }
        }

        //VALIDATE COLORS
        foreach ($dataStand['colors'] as $key => $value) {
            if(isset($rules[$key])){
                if($rules[$key]){
                    if($value != ''){
                        $totalRulesValidated++;
                    } else {
                        $rulesNotValidated[] = StandTypeRules::getValue($key);
                    }
                } else {
                    $totalRulesValidated++;
                }
                unset($rules[$key]);
            }
        }

        //VALIDATE VIDEO - VALIDATE AMPHITRYON
        $rulesToValidate = ['video', 'amphitryon'];
        foreach ($rulesToValidate as $item) {
            if(isset($rules[$item])){
                if($rules[$item]){
                    if(isset($dataStand[$item]) && $dataStand[$item] != ''){
                        $totalRulesValidated++;
                    } else {
                        $rulesNotValidated[] = StandTypeRules::getValue($item);
                    }
                } else {
                    $totalRulesValidated++;
                }
                unset($rules[$item]);
            }
        }

        if( $totalRulesToValidate != $totalRulesValidated ){
            if(count($rulesNotValidated) > 0){
                throw new BadRequestHttpException(
                    'Parámetros no válidos: ' . implode(' - ', array_values($rulesNotValidated))
                );
            }
            if(count($rules) > 0){
                $paramsNotSend = [];
                foreach ($rules as $key => $item) {
                    $paramsNotSend[] = StandTypeRules::getValue($key);
                }
                throw new BadRequestHttpException(
                    'Parámetros no enviados: ' . implode(' - ', array_values($paramsNotSend))
                );
            }
        }
    }
}