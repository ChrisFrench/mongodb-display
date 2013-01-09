<?php
defined('_JEXEC') or die('Restricted access');
$cursor = $this->items;

foreach ($cursor as $item) {

				var_dump($item);
				echo 'Name: ' . $item['name'] . '<br/>';
				
				echo '<br/>';
			}


 ?>