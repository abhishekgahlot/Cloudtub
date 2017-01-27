<div class="calendar">
        <h2>Calendar</h2>
            <center><h4>Please Note that event changing not allowed in Beta Version.</h4></center>
        <div id="pad-wrapper">
            <div class="row-fluid calendar-wrapper">
                <div class="span12">
                    <div id='calendar-div'></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

	     	var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
             $.get('/calendar/',function(data){
			   $('#calendar-div').fullCalendar({
                header: {
                    left: 'month,agendaWeek,agendaDay',
                    center: 'title',
                    right: 'today prev,next'
                },
                selectable: true,
                selectHelper: true,
                editable: true,
                events: JSON.parse(data),
                eventBackgroundColor: '#278ccf'
            });
		    });

    </script>