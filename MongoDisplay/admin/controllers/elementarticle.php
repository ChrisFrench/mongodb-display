<?php
/**
 * @version	1.5
 * @package	Mongodisplay
 * @media 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

class MongodisplayControllerElementArticle extends MongodisplayController 
{
	function __construct() 
	{
		parent::__construct();
		
		$this->set('suffix', 'elementarticle');
	}
	
    function display($cachable=false, $urlparams = false)
    {
        $this->hidefooter = true;
        
        $object = JRequest::getVar('object');
        $view = $this->getView( $this->get('suffix'), 'html' );
        $view->assign( 'object', $object );
        $view->setTask(true);
        parent::display();
    }
}

?>