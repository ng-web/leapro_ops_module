
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Mini calendar outside the scheduler</title>
	
<?php
$script = <<< JS
	var prev = null;
	var curr = null;
	var next = null;
  var d = new Date();

	function doOnLoad() {
		scheduler.config.multi_day = true;
		scheduler.config.xml_date="%Y-%m-%d %H:%i";

		scheduler.init('scheduler_here',d,"week");
		//scheduler.load("./data/events.xml");

		var calendar = scheduler.renderCalendar({
			container:"cal_here",
			navigation:true,
			handler:function(date){
				scheduler.setCurrentView(date, scheduler._mode);
			}
		});
		scheduler.linkCalendar(calendar);
		scheduler.setCurrentView(scheduler._date, scheduler._mode);
	}

JS;
$this->registerJS($script);
?>

<style type="text/css" media="screen">
html, body{
	margin:0px;
	padding:0px;
	height:100%;
	overflow: hidden;
}

.dhx_calendar_click {
	background-color: #C2D5FC !important;
}
</style>

</head>


<body onload="doOnLoad();">
	<div style='float: left; padding:10px;'>
		<div id="cal_here" style='width:250px;'></div>
	</div>
	<div id="scheduler_here" class="dhx_cal_container" style='width:auto; height:100%;'>
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>
	</div>
</body>
</html>
