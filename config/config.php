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
 * Hooks
 */
$GLOBALS['TL_HOOKS']['loadFormField'][] = array('fpDependedFormFields', 'addAttributes');