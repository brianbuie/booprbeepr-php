<?php


	$number_of_all = count_instances($db,$boop_table,null);


	if ($number_of_all != 0){

		$number_of_outside = count_instances($db,$boop_table,"location='outside'");

		$number_of_boops = count_instances($db,$boop_table,"boop_or_beep='boop'");

		$number_of_beeps = count_instances($db,$boop_table,"boop_or_beep='beep'");

		$number_of_boths = count_instances($db,$boop_table,"boop_or_beep='both'");

		$number_of_boops += $number_of_boths;
		$number_of_beeps += $number_of_boths;

		$success_percentage = round(($number_of_outside/$number_of_all) * 100);
	
		$allactions = get_all_boops( $db , $boop_table , null );

		$allboops = boop_table_query($db, "SELECT * FROM " . $boop_table . " WHERE boop_or_beep='boop' OR boop_or_beep='both' ORDER BY ts DESC");

		$allbeeps = boop_table_query($db, "SELECT * FROM " . $boop_table . " WHERE boop_or_beep='beep' OR boop_or_beep='both' ORDER BY ts DESC");

		$allinside = boop_table_query($db, "SELECT * FROM " . $boop_table . " WHERE location='inside' ORDER BY ts DESC");


	}