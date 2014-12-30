<?php
//Draw Calendar
function draw_calendar($month,$year){

// format month parameter into name
$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F'); // March

$calendar = '<div class="calendar-header-container">
		<a href="#" class="change-month-btn" data-dir="prev"><</a><div class="calendar-month-head">'.$monthName.'</div><a href="#" class="change-month-btn" data-dir="next">></a>

		<div class="calendar-day-head">s</div><div class="calendar-day-head">m</div><div class="calendar-day-head">t</div><div class="calendar-day-head">w</div><div class="calendar-day-head">t</div><div class="calendar-day-head">f</div><div class="calendar-day-head">s</div>
</div>

<div style="text-align:center;">

<div class="maindiv">
<form method="post">


<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" align="left" valign="middle"></td>
    </tr>
  <tr>
    <td colspan="3" align="left" valign="middle">';

	// Draw table for Calendar 
	$calendar.= '<table cellpadding="0" cellspacing="0" class="calendar">';

	// Draw Calendar table headings 
	//$headings = array('s','m','t','w','t','f','s');
	//$calendar.= '<tr class="calendar-row" id="day-header-bar"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	//days and weeks variable for now ... 
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	// row for week one 
	$calendar.= '<tr class="calendar-row">';

	// Display "blank" days until the first of the current week 
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		$days_in_this_week++;
	endfor;

	// Show days.... 
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		if($list_day==date('d') && $month==date('n'))
		{
			$currentday='currentday';
		}else
		{
			$currentday='';
		}
		$calendar.= '<td class="calendar-day '.$currentday.'">';
		
			// Add in the day number
			if($list_day<date('d') && $month==date('n'))
			{
				$showtoday= $list_day;
			}else
			{
				$showtoday=$list_day;
			}
			$calendar.= '<a href="#" class="day-number" data-date="'.date('Y').'-'.$month.'-'.$showtoday.'">'.$showtoday.'</a>';

		// Draw table end
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="spacer-row"></tr><tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	// Finish the rest of the days in the week
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		endfor;
	endif;

	// Draw table final row
	$calendar.= '</tr>';

	// Draw table end the table 
	$calendar.= '</table>';

	$calendar.='</td>
  				</tr>
  			</table>
			</form>
		</div>';

	
	// Finally all done, return result 
	return $calendar;
}

$param_month = $_POST['month'];

echo draw_calendar($param_month,date('Y'));
?>