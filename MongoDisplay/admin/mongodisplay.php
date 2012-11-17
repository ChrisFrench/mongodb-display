<?php
/**
 * @package Mongodisplay
 * @author  Dioscouri Design
 * @link    http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

// Check the registry to see if our Mongodisplay class has been overridden
if ( !class_exists('Mongodisplay') ) 
    JLoader::register( "Mongodisplay", JPATH_ADMINISTRATOR.DS."components".DS."com_mongodisplay".DS."defines.php" );

// before executing any tasks, check the integrity of the installation
Mongodisplay::getClass( 'MongodisplayHelperDiagnostics', 'helpers.diagnostics' )->checkInstallation();

// Require the base controller
Mongodisplay::load( 'MongodisplayController', 'controller' );

// Require specific controller if requested
$controller = JRequest::getWord('controller', JRequest::getVar( 'view' ) );
if (!Mongodisplay::load( 'MongodisplayController'.$controller, "controllers.$controller" ))
    $controller = '';

if (empty($controller))
{
    // redirect to default
	$default_controller = new MongodisplayController();
	$redirect = "index.php?option=com_mongodisplay&view=" . $default_controller->default_view;
    $redirect = JRoute::_( $redirect, false );
    JFactory::getApplication()->redirect( $redirect );
}

DSC::loadBootstrap();

JHTML::_('stylesheet', 'common.css', 'media/dioscouri/css/');
JHTML::_('stylesheet', 'admin.css', 'media/com_mongodisplay/css/');

$doc = JFactory::getDocument();
$uri = JURI::getInstance();
$js = "var com_mongodisplay = {};\n";
$js.= "com_mongodisplay.jbase = '".$uri->root()."';\n";
$doc->addScriptDeclaration($js);

$parentPath = JPATH_ADMINISTRATOR . '/components/com_mongodisplay/helpers';
DSCLoader::discover('MongodisplayHelper', $parentPath, true);

$parentPath = JPATH_ADMINISTRATOR . '/components/com_mongodisplay/library';
DSCLoader::discover('Mongodisplay', $parentPath, true);

// load the plugins
JPluginHelper::importPlugin( 'mongodisplay' );

// Create the controller
$classname = 'MongodisplayController'.$controller;
$controller = Mongodisplay::getClass( $classname );
    
// ensure a valid task exists
$task = JRequest::getVar('task');
if (empty($task))
{
    $task = 'display';
    JRequest::setVar( 'layout', 'default' );
}
JRequest::setVar( 'task', $task );

// Perform the requested task
$controller->execute( $task );

// Redirect if set by the controller
$controller->redirect();
?>