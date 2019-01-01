<?php
	function getMemberList()
	{
		$json = file_get_contents('http://politicsandwar.com/api/alliances/');
		$data = json_decode($json);
		$memberList = array();

		foreach($data->alliances as $alliance)
		{
			if($alliance->ircchan != 1) //  Just need somthing here
			{
				array_push($memberList, json_decode(json_encode($alliance)));
			}
		}
		
		return $memberList;
	}
	
	$allianceFile = fopen('Cache/alliances_' . (new DateTime)->format('n_j_Y') . '.json', 'w'); 
	fwrite($allianceFile, json_encode(getMemberList()));
	fclose($allianceFile);
?>