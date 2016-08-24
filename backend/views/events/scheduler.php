    
    
<div id='calendar'></div>
this is a calendar div

<?php
$script = <<< JS

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    });
        
JS;
$this->registerJS($script);
