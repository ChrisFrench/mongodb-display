<?php
/**
 * @version	0.1
 * @package	Mongodisplay
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

class MongodisplayControllerDisplay extends MongodisplayController 
{
   /**
	 * constructor
	 */
	function __construct()
	{
		parent::__construct();

		$this->set('suffix', 'display');
	}
   
   /**
	 * Sets the model's state
	 *
	 * @return array()
	 */
	function _setModelState()
	{
		$state = parent::_setModelState();
		$app = JFactory::getApplication();
		$model = $this->getModel( $this->get('suffix') );
		$ns = $this->getNamespace();

		$state['server'] 	= $app->getUserStateFromRequest($ns.'server', 'server', '', '');
		$state['database'] 		= $app->getUserStateFromRequest($ns.'database', 'database', '', '');
		$state['collection'] 		= $app->getUserStateFromRequest($ns.'collection', 'collection', '', '');
		$state['username'] 		= $app->getUserStateFromRequest($ns.'username', 'username', '', '');
		$state['password'] 		= $app->getUserStateFromRequest($ns.'password', 'password', '', '');
		$state['find'] 		= $app->getUserStateFromRequest($ns.'find', 'find', '', '');
		$state['filter'] 	= $app->getUserStateFromRequest($ns.'filter', 'filter', '', '');
		
		foreach (@$state as $key=>$value)
		{
			$model->setState( $key, $value );
		}
		return $state;
	}
}

?>