<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   fpDependedFormFields
 * @author    Felix Pfeiffer - info@felixpfeiffer.com
 * @license   LGPL
 * @copyright 2014 Felix Pfeiffer : Neue Medien
 */



/**
 * Table tl_form_field
 */
foreach($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $k=>$v)
{
    if(is_array($v) || !stristr($v,',label')) continue;

    $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$k] = str_replace(',label',',label,dependentField,dependentFieldRequired',$v);
}


$GLOBALS['TL_DCA']['tl_form_field']['fields']['dependentField'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['dependentField'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback'  => array('tl_fpDependenFormFields','findElements'),
    'eval' => array('includeBlankOption'=>true,'chosen'=>true,'tl_class' => 'w50'),
    'sql' => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['dependentFieldRequired'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['dependentFieldRequired'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'m12 w50'),
    'sql'                     => "char(1) NOT NULL default ''"
);



class tl_fpDependenFormFields extends tl_form_field
{

    public function findElements($dc)
    {
        $objFields = \FormFieldModel::findBy('pid',$dc->activeRecord->pid);

        if($objFields !== null)
        {
            $arrReturn = array();
            while($objFields->next())
            {
                if($objFields->id == $dc->id) continue;
                $arrReturn[$objFields->id] = $objFields->name;
            }

            return $arrReturn;
        }
    }

}