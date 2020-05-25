<?php

namespace Aptitus\Fairs\Presentation;

/**
 * Class StandType
 *
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class StandTypePresentation
{
    /**
     * Formatea las reglas para el envío a front
     * @param $dataRules
     * @return array
     */
    public static function formatRules($dataRules)
    {
        $rules = [];
        foreach ($dataRules as $item) {
            $rules[$item['rule']] = [
                'required' => $item['required']
            ];
        }

        return $rules;
    }

    /**
     * Formatea las reglas para la validacion en back
     * @param $dataRules
     * @return array
     */
    public static function formatRulesValidateBack($dataRules)
    {
        $rules = [];
        foreach ($dataRules as $item) {
            $rules[$item['rule']] = $item['required'];
        }

        return $rules;
    }
}
