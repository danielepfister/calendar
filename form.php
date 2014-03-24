<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="eventsForm">

<p>School Year</p>
	<select name="ud_schoolYear">
        <option value="<?php echo $lastSchoolYear; ?>"><?php echo $lastSchoolYear; ?></option>
        <option value="<?php echo $schoolYear; ?>" selected><?php echo $schoolYear; ?></option>
        <option value="<?php echo $nextSchoolYear; ?>"><?php echo $nextSchoolYear; ?></option>
    </select>

<p>Start Date</p>
	<select name="ud_startMonth">
		<option value="<?php echo $startMonth; ?>" selected><?php echo $startMonth; ?></option>
		<option value='01'>January</option>
		<option value='02'>February</option>
		<option value='03'>March</option>
		<option value='04'>April</option>
		<option value='05'>May</option>
		<option value='06'>June</option>
		<option value='07'>July</option>
		<option value='08'>August</option>
		<option value='09'>September</option>
		<option value='10'>October</option>
		<option value='11'>November</option>
		<option value='12'>December</option>
	</select>

	<select name="ud_startDate">
		<option value="<?php echo $startDate; ?>" selected><?php echo $startDate; ?></option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>

	<select name="ud_startYear">
		<option value="<?php echo $startYear; ?>" selected><?php echo $startYear; ?></option>
		<option value="<?php echo $current_year; ?>"><?php echo $current_year; ?></option>
		<option value="<?php echo $next_year; ?>"><?php echo $next_year; ?></option>
	</select>

<p>End Date</p>
	<select name="ud_endMonth">
		<option value="<?php echo $endMonth; ?>" selected><?php echo $endMonth ?></option>
		<option value='01'>January</option>
		<option value='02'>February</option>
		<option value='03'>March</option>
		<option value='04'>April</option>
		<option value='05'>May</option>
		<option value='06'>June</option>
		<option value='07'>July</option>
		<option value='08'>August</option>
		<option value='09'>September</option>
		<option value='10'>October</option>
		<option value='11'>November</option>
		<option value='12'>December</option>
	</select>

	<select name="ud_endDate">
		<option value="<?php echo $endDate; ?>" selected><?php echo $endDate; ?></option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>

	<select name="ud_endYear">
		<option value="<?php echo $endYear; ?>" selected><?php echo $endYear; ?></option>
		<option value="<?php echo $current_year; ?>"><?php echo $current_year; ?></option>
		<option value="<?php echo $next_year; ?>"><?php echo $next_year; ?></option>
	</select>

<p>Event Title</p>
	<input name="ud_eventTitle" type="text" id="eventTitle" size="55" value="<?php echo $eventTitle; ?>" class="text_field">

<p>Location</p>
	<input name="ud_location" type="text" id="location" size="55" value="<?php echo $location; ?>" class="text_field">

<p>Event Description</p>
	<textarea name="ud_description" id="description" value="<?php echo $description; ?>"></textarea>

<p>Event Link</p>
	<input name="ud_link" type="text" id="link" size="55" value="<?php echo $link; ?>" class="text_field">

<p>Post to Home Page?</p>
	<select name="ud_postToHome">
		<option value="<?php echo $postToHome; ?>" selected><?php echo $postToHome; ?></option>
		<option value="0">No</option>
		<option value="1">Yes</option>
	</select>

<p><input type="Submit" value="<?php echo $submit_label; ?>" name="submit"></p>
<p><input type="button" value="Cancel" onClick="history.go(-1)"></p>

</form>	

