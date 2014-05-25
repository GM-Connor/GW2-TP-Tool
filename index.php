<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script> 
<script type="text/javascript" src="sort_table/jquery.tablesorter.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
    
</script>
<style type="text/css">
    body {
        margin:0;
    }
	.flat-table {
	    margin-left:auto;
	    margin-right:auto;
	    width:100%;
		border-collapse:collapse;
		font-family: 'Lato', Calibri, Arial, sans-serif;
		border: none;
                border-radius: 3px;
               -webkit-border-radius: 3px;
               -moz-border-radius: 3px;
	}
	.flat-table th, .flat-table td {
		box-shadow: inset 0 -1px rgba(0,0,0,0.25), 
			inset 0 1px rgba(0,0,0,0.25);
	}
	.flat-table th {
		font-weight: normal;
		-webkit-font-smoothing: antialiased;
		padding: .4em 1em .25em;
		color: rgba(0,0,0,0.45);
		text-shadow: 0 0 1px rgba(0,0,0,0.1);
		font-size: 1.5em;
	}
	.flat-table td {
		color: #f7f7f7;
		padding: 0.4em 1em 0.25em 1.15em;
		text-shadow: 0 0 1px rgba(255,255,255,0.1);
		font-size: 1.2em;
	}
	.flat-table a {
	color: #f7f7f7;
	text-decoration:none;
	}
	.flat-table tr {
		-webkit-transition: background 0.3s, box-shadow 0.3s;
		-moz-transition: background 0.3s, box-shadow 0.3s;
		transition: background 0.3s, box-shadow 0.3s;
	}
	.flat-table-1 {
		background: #336ca6;
	}
	.flat-table-1 tr:hover {
		background: rgba(0,0,0,0.19);
	}
	.flat-table-2 tr:hover {
		background: rgba(0,0,0,0.1);
	}
	.flat-table-2 {
		background: #f06060;
	}
	.flat-table-3 {
		background: #52be7f;
	}
	.flat-table-3 tr:hover {
		background: rgba(0,0,0,0.1);
	}
</style>
</head>
<body>
<table id="myTable" class="flat-table flat-table-1">
	<thead>
		<th>Name</th>
		<th>Min Sale</th>
		<th>Max Buy</th>
		<th>Supply</th>
		<th>Demand</th>
		<th>Sale Price Change</th>
		<th>Buy Price Change</th>
	</thead>
	<tbody>

<?php
$json = '{
            "count":25740,
            "results":[
                {
                    "data_id":0,
                    "name":"Extended Potion of Ghost Slaying",
                    "rarity":0,
                    "restriction_level":0,
                    "img":"",
                    "type_id":0,
                    "sub_type_id":0,
                    "price_last_changed":"2013-03-18 17:00:31 UTC",
                    "max_offer_unit_price":0,
                    "min_sale_unit_price":0,
                    "offer_availability":0,
                    "sale_availability":0,
                    "sale_price_change_last_hour":0,
                    "offer_price_change_last_hour":-8
                },
                {
                    "data_id":0,
                    "name":"Eternity",
                    "rarity":0,
                    "restriction_level":0,
                    "img":"",
                    "type_id":0,
                    "sub_type_id":0,
                    "price_last_changed":"2013-03-18 17:00:31 UTC",
                    "max_offer_unit_price":0,
                    "min_sale_unit_price":0,
                    "offer_availability":0,
                    "sale_availability":0,
                    "sale_price_change_last_hour":5,
                    "offer_price_change_last_hour":11
                },
                {
                    "data_id":0,
                    "name":"Twilight",
                    "rarity":0,
                    "restriction_level":0,
                    "img":"",
                    "type_id":0,
                    "sub_type_id":0,
                    "price_last_changed":"2013-03-18 17:00:31 UTC",
                    "max_offer_unit_price":2,
                    "min_sale_unit_price":1,
                    "offer_availability":4,
                    "sale_availability":3,
                    "sale_price_change_last_hour":10,
                    "offer_price_change_last_hour":15
                }
            ]
}';

$entry = json_decode($json,true);
$entry = json_decode(file_get_contents('http://www.gw2spidy.com/api/v0.9/json/all-items/all'),true);
//print_r($entry);

foreach ($entry['results'] as $item) {
    if ((($item['offer_price_change_last_hour'] > 15) OR ($item['offer_price_change_last_hour'] < -15)) OR (($item['sale_price_change_last_hour'] > 50) OR ($item['sale_price_change_last_hour'] < -50))) { ?>
        <tr>
            <td>
                <?php 
                if ($item['rarity'] == 3) { echo "<a style=\"color:lime;\" href=\"http://www.gw2spidy.com/item/" . $item['data_id'] . "\" target=\"_blank\">" . $item['name'] . "</a>"; }
                elseif ($item['rarity'] == 4) { echo "<a style=\"color:#ff0;\" href=\"http://www.gw2spidy.com/item/" . $item['data_id'] . "\" target=\"_blank\">" . $item['name'] . "</a>"; }
                elseif ($item['rarity'] == 5) { echo "<a style=\"color:#FDA500;\" href=\"http://www.gw2spidy.com/item/" . $item['data_id'] . "\" target=\"_blank\">" . $item['name'] . "</a>"; }
                elseif ($item['rarity'] == 6) { echo "<a style=\"color:#F48;\" href=\"http://www.gw2spidy.com/item/" . $item['data_id'] . "\" target=\"_blank\">" . $item['name'] . "</a>"; }
                elseif ($item['rarity'] == 7) { echo "<a style=\"color:#d2b;\" href=\"http://www.gw2spidy.com/item/" . $item['data_id'] . "\" target=\"_blank\">" . $item['name'] . "</a>"; }
                else {echo "<a href=\"http://www.gw2spidy.com/item/" . $item['data_id'] . "\" target=\"_blank\">" . $item['name'] . "</a>"; }
                ?>
            </td>
            <td>
                <?php 
                $ori = $item['min_sale_unit_price'];
                $ori1 = floor($ori/10000);
                $ori2 = $ori - ($ori1*10000);
                $ori2 = floor($ori2/100);
                $ori3 = $ori - ($ori1*10000) - ($ori2*100);
                if (($ori1 == 0) && ($ori2 == 0)) { $oriall = $ori3 . "c"; }
                elseif (($ori1 == 0) && ($ori2 != 0)) { $oriall = $ori2 . "s " . $ori3 . "c"; }
                elseif (($ori1 != 0) && ($ori2 != 0)) { $oriall = $ori1 . "g " . $ori2 . "s " . $ori3 . "c"; }
                echo $oriall; 
                ?>
            </td>
            <td>
                <?php 
                $ori = $item['max_offer_unit_price'];
                $ori1 = floor($ori/10000);
                $ori2 = $ori - ($ori1*10000);
                $ori2 = floor($ori2/100);
                $ori3 = $ori - ($ori1*10000) - ($ori2*100);
                if (($ori1 == 0) && ($ori2 == 0)) { $oriall = $ori3 . "c"; }
                else if (($ori1 == 0) && ($ori2 != 0)) { $oriall = $ori2 . "s " . $ori3 . "c"; }
                else if (($ori1 != 0) && ($ori2 != 0)) { $oriall = $ori1 . "g " . $ori2 . "s " . $ori3 . "c"; }
                echo $oriall;
                ?>
            </td>
            <td><?php echo $item['sale_availability']; ?></td>
            <td><?php echo $item['offer_availability']; ?></td>
            <td><?php if ($item['sale_price_change_last_hour'] > 50) {echo "<span style='color:lime'>" . $item['sale_price_change_last_hour'] . "%</span>";} elseif ($item['sale_price_change_last_hour'] < -50) {echo "<span style='color:#ff0'>" . $item['sale_price_change_last_hour'] . "%</span>";} else {echo $item['sale_price_change_last_hour'] . "%";} ?></td>
            <td><?php if ($item['offer_price_change_last_hour'] > 15) {echo "<span style='color:lime'>" . $item['offer_price_change_last_hour'] . "%</span>";} elseif ($item['offer_price_change_last_hour'] < -15) {echo "<span style='color:#ff0'>" . $item['offer_price_change_last_hour'] . "%</span>";} else {echo $item['offer_price_change_last_hour'] . "%";} ?></td>
        </tr>
        <?php
    }
}
?>

	</tbody>
</table>
</body>
</html>
