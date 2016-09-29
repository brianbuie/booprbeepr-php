<?php 

//
// ===========================================
// ========== VIEW FUNCTIONS =================
// ===========================================
//


/* displays an html select element with value selected if $_POST returns that value
 * 
 * @param		string			 name of select element, also used by $_POST and $_GET
 * @param 		array of strings values for all of the different option tags
 * @return 		html 		 	 formatted select element with option tags inside
 */

	function display_select($select_name,$values_array){

		// return html select element with $select_name passed in as name
		echo '<select class="form-control" name="' . $select_name . '">';

		// foreach of the values passed in to the function, separate key and value
		foreach ($values_array as $key => $value){

			// create option tag with the key's value
		 	echo '<option value="' . $value . '"';
		  	echo '>' . $value . '</option>';
		}
		echo '</select>';
	}

	function relative_day($date){
		$today = date("Y-m-d");
		$yesterday = date("Y-m-d", strtotime( '-1 days'));
		if ($date == $today){return "today";}
		if ($date == $yesterday){return "yesterday";}
		return strtolower(date("l", strtotime($date)));
	}


	function day_display_select(){
		$current = date("Y-m-d");
		$daysoriginal = array(
			0 => date("Y-m-d", strtotime( '-6 days')),
			1 => date("Y-m-d", strtotime( '-5 days')),
			2 => date("Y-m-d", strtotime( '-4 days')),
			3 => date("Y-m-d", strtotime( '-3 days')),
			4 => date("Y-m-d", strtotime( '-2 days')),
			5 => date("Y-m-d", strtotime( '-1 days')),
			6 => date("Y-m-d")
		);

		$days = array_reverse($daysoriginal);
		
		echo '<select class="form-control" name="day">';
		foreach ($days as $date){
		  echo '<option value="' . $date . '"';
		  if ($date == $current){echo 'selected="selected" ';}
		  echo '>' . relative_day($date) . '</option>';
		}
		echo '</select>';
	}

	function h_display_select(){
		$current = date('g');
		echo '<select class="form-control" name="hour">';

		$i = 1;
		while($i < 13){
			echo '<option value="' . $i . '"';
			if ($i == $current){echo 'selected="selected" ';}
		  	echo '>' . $i . '</option>';
		  	$i++;
		}
		echo '</select>';
	}


	function m_display_select(){
		$current = date("i");
		$key_counter = 0;
		echo '<select class="form-control" name="min">';

		while($key_counter < 60){
			echo '<option value="' . sprintf('%02d', $key_counter) . '"';
			if ($key_counter == $current){echo 'selected="selected" ';}
		  	echo '>' . sprintf('%02d', $key_counter) . '</option>';
		  	$key_counter++;
		}

		echo '</select>';
	}

	function am_pm_display_select(){
		$current_hour = date("G");
		if ($current_hour < 12){$active = "am";}
		else{$active = "pm";}
		$options = array("am","pm");

		echo '<div class="btn-group" data-toggle="buttons">';
		foreach ($options as $option){
			echo '<label class="btn btn-default';
			if ($active == $option){
				echo ' active">';
				echo '<input type="radio" name="am_pm" id="am_pm" value="' . $option . '" checked>' . $option;
			}
			else{
				echo '">';
				echo '<input type="radio" name="am_pm" id="am_pm" value="' . $option . '">' . $option;
			}
			echo '</label>';
		}
		echo '</div>';
	}

	function undo_remove_link($boop_array,$action_url){

		$boop_link = '<form class="form-inline" role="form" method="post" action="' . $action_url . '">';
		$boop_link .= '<input type="hidden" name="boop_or_beep" value="' . $boop_array["boop_or_beep"] . '" />';
		$boop_link .= '<input type="hidden" name="location" value="' . $boop_array["location"] . '" />';
		$boop_link .= '<input type="hidden" name="ts" value="' . $boop_array["ts"] . '" />';
		$boop_link .= '<button type="submit" class="btn btn-success btn-xs btn-inline">undo</button></form>';

		return $boop_link;
	}

	function small_stat_box_display($value,$description,$color){
		echo '<div class="col-lg-4 col-sm-4 col-xs-4">';
        	echo '<div class="small-box bg-' . $color . '">';
                echo '<div class="inner">';
                    echo '<h3>' . $value . '</h3>';
                    echo '<p>' . $description . '</p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}



	function last_action_display($array){

		if (!isset($array[0])){ echo '<i>never</i>'; } 

		else { echo '<time data-momentjs>' . $array[0]['ts'] . '</time>'; }
	
	}

	function callout_hours_increase_danger($array_to_check, $warning_threshold, $danger_threshold){

		if (!isset($array_to_check[0])){
			return "callout-success";
		}

		$date1 = new DateTime("now");
		$date2 = new DateTime($array_to_check[0]['ts']);
		$diff = $date2->diff($date1);
		$hours = $diff->h;
		$hours = $hours + ($diff->days*24);

		if ($hours < $warning_threshold){

			return "callout-success";

		} else {

			if ($hours < $danger_threshold){

				return "callout-warning";

			} else {

				return "callout-danger";
			}
		}	
	}

	function callout_days_increase_success($array_to_check, $warning_threshold, $success_threshold){

		if (!isset($array_to_check[0])){
			return "callout-success";
		}

		$date1 = new DateTime("now");
		$date2 = new DateTime($array_to_check[0]['ts']);
		$diff = $date2->diff($date1);
		$days = $diff->d;

		if ($days > $warning_threshold){

			return "callout-success";

		} else {

			if ($days > $danger_threshold){

				return "callout-warning";

			} else {

				return "callout-danger";
			}
		}

	}






