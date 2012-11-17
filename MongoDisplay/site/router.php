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

if ( !class_exists('Mongodisplay') ) {
    JLoader::register( "Mongodisplay", JPATH_ADMINISTRATOR.DS."components".DS."com_mongodisplay".DS."defines.php" );
}

Mongodisplay::load( "MongodisplayHelperRoute", 'helpers.route' );

/**
 * Build the route
 * Is just a wrapper for MongodisplayHelperRoute::build()
 * 
 * @param unknown_type $query
 * @return unknown_type
 */
function MongodisplayBuildRoute(&$query)
{
    return MongodisplayHelperRoute::build($query);
}

/**
 * Parse the url segments
 * Is just a wrapper for MongodisplayHelperRoute::parse()
 * 
 * @param unknown_type $segments
 * @return unknown_type
 */
function MongodisplayParseRoute($segments)
{
    return MongodisplayHelperRoute::parse($segments);
}