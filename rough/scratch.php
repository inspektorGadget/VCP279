<?php
try {
		$result = $pdo->query('SELECT id, serialNo, name, addedDate, type, description, status, rentedTo FROM equipment ORDER BY type ASC');
	}
$items[] = array('id'=>$row['id'], 'serialNo'=>$row['serialNo'], 'name'=>$row['name'], 'addedDate'=>$row['addedDate'], 'type'=>$row['type'],
										 'description'=>$row['description'], 'status'=>$row['status'], 'rentedTo'=>$row['rentedTo']);
	