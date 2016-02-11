<?php
$filename = 'test.in.txt';
$filename = 'busy_day.in';
$filename = 'redundancy.in';
// $filename = 'mother_of_all_warehouses.in';
echo $filename."\n";

file_put_contents('./'.$filename.'.out', "");
$data = explode("\n", file_get_contents($filename));

$first = $data[0];
$first = explode(' ', $first);

$rows = $first[0];
echo "Rows:".$rows."\n";
$columns = $first[1];
echo "Columns:".$columns."\n";
$drones = $first[2];
echo "Drones:".$drones."\n";
$turns = $first[3];
echo "Turns:".$turns."\n";
$payload = $first[4];
echo "Payload:".$payload."\n";

$prodTypesCount = $data[1];

$prodWeight = explode(' ', $data[2]);
if($prodTypesCount != count($prodWeight)) {
	die('oops');
}

$whCount = $data[3];
$WH = [];
for ($i=0; $i < $whCount; $i++) {
	$xy = explode(' ', $data[4+$i*2]);
	$WH[$i] = [
		'x' => $xy[0],
		'y' => $xy[1],
	];
	$gdsI = explode(' ', $data[4+$i*2+1]);
	for ($j=0; $j < $prodTypesCount; $j++) { 
		$WH[$i]['goods'][$j] = $gdsI[$j];
	}
}

$Order = [];
$ordersCount = $data[4+$whCount*2];
for ($i=0; $i < $ordersCount; $i++) { 
	$xy = explode(' ', $data[5+$whCount*2+$i*3]);
	$Order[$i] = [
		'x' => $xy[0],
		'y' => $xy[1],
	];
	$itemsCount = $data[6+$whCount*2+$i*3];
	$gdsI = explode(' ', $data[7+$whCount*2+$i*3]);
	for ($j=0; $j < $itemsCount; $j++) { 
		$Order[$i]['goods'][$j] = $gdsI[$j];
	}
}

//wh
//orders
foreach ($Order as $orderId => $orderData) {
	$orderData['x'];
	$orderData['y'];
	foreach ($orderData['goods'] as $ogId) {
		// одна одиниця товару ogId;
		$ogId;

		$targetWHID = null;
		foreach ($WH as $whID => &$whData) {
			if((int) $whData['goods'][$ogId]) {
				$whData['goods'][$ogId]--;
				$targetWHID = $whID;
				break;
			}
		}
		if($targetWHID === null) {
			die('Hello, Gooogle');
		}

		$dronID = 0;
		file_put_contents('./'.$filename.'.out', $dronID.' L '.$targetWHID.' '.$ogId.' 1'."\n", FILE_APPEND);
		file_put_contents('./'.$filename.'.out', $dronID.' D '.$orderId.' '.$ogId.' 1'."\n", FILE_APPEND);		
	}
}

// TODO
