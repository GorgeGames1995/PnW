<?php
	function getMemberList()
	{
		$json = file_get_contents('http://politicsandwar.com/api/nations/');
		$data = json_decode($json);
		$memberList = array();

		foreach($data->nations as $nation)
		{
			if($nation->nationid != 1) //  Just need somthing here
			{
				array_push($memberList, json_decode(json_encode($nation)));
			}
		}
		
		return $memberList;
	}
	
	$allianceFile = fopen('Cache/nations_' . (new DateTime)->format('n_j_Y') . '.json', 'w'); 
	fwrite($allianceFile, json_encode(getMemberList()));
	fclose($allianceFile);
?>