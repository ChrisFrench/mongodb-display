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

Mongodisplay::load('MongodisplayModelBase', 'models.base');

class MongodisplayModelDisplay extends MongodisplayModelBase {
	function getTable($name = 'Config', $prefix = 'MongodisplayTable', $options = array()) {
		return parent::getTable($name, $prefix, $options);
	}

	function getList($refresh = false) {

		try {
			
			$server = $this -> getState('server', 'localhost');
			$database = $this -> getState('database', 'test');
			$collection = $this -> getState('collection', 'items');
			$username = $this -> getState('username', '');
			$password = $this -> getState('password', '');
			$find = $this -> getState('find', 'find');
			$filter = $this -> getState('filter', '');
			
			$auth = array();
			//$auth['username'] = $username;
			//$auth['password'] = $password;
			//$auth['database'] = $database;
			$auth['persist'] = 'x';
			
			$conn = new Mongo("mongodb://{$username}:{$password}@{$server}/{$database}",$auth);
			
			// access database
			$db = $conn -> $database;
			// access collection
			$collection = $db -> $collection;
			// retrieve all documents
			$cursor = $collection -> $find();
			
			return $cursor;
			
			// disconnect from server
			//$conn -> close();
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e) {
			die('Error: ' . $e -> getMessage());
		}

	}

}
