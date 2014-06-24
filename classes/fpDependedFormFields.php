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
 * Class fpDependedFormFields
 */
class fpDependedFormFields extends \Frontend
{
    /**
     * Add attributes to form field
     * @param object
     * @param string
     * @param array
     * @return object
     * called from loadFormField HOOK
     */
    public function addAttributes(Widget $objWidget, $strForm, $arrForm)
    {
        if(is_array($GLOBALS['hiddenFormFields']) && in_array($objWidget->id,$GLOBALS['hiddenFormFields']))
        {
            $objWidget->class = 'hiddenField';
        }

        if(strlen($objWidget->dependentField) < 1 || TL_MODE != 'FE')
        {
            return $objWidget;
        }

        $objTrigger = \FormFieldModel::findByPk($objWidget->dependentField);

        $objWidget->addAttribute('data-trigger',$objTrigger->name);

        if($objWidget->dependentFieldRequired)
        {
            $objWidget->addAttribute('data-require','1');
        }

        $GLOBALS['hiddenFormFields'][] = $objWidget->dependentField;

        return $objWidget;
    }
}