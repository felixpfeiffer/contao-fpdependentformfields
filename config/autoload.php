<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package FpDependedFormFields
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'felixpfeiffer',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'felixpfeiffer\DependentFormFields\fpDependedFormFields' => 'system/modules/fpDependedFormFields/classes/fpDependedFormFields.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'form_row' => 'system/modules/fpDependedFormFields/templates',
	'j_dff'    => 'system/modules/fpDependedFormFields/templates',
));
