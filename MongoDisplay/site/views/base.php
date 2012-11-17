
<?php
/**
 * @version	1.5
 * @package	Mongodisplay
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

class MongodisplayViewBase extends DSCViewSite
{
    function display($tpl=null)
    {
        $config = Mongodisplay::getInstance();
        if ($config->get('include_site_css')) 
        {
            JHTML::_('stylesheet', 'common.css', 'media/com_mongodisplay/css/');
        }
        JHTML::_('script', 'common.js', 'media/com_mongodisplay/js/');
    
        parent::display($tpl);
    }
}