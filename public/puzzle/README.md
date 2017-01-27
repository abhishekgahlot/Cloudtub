##facebook calendar rendering challenge


Given a set of events, render the events on a single day calendar (similar to Outlook, Calendar.app, and Google Calendar). There are several properties of the layout:
	1. No events may visually overlap.
		2. If two events collide in time, they must have the same width.
		3. An event should utilize the maximum width available, but constraint 2) 	takes precedence over this constraint.
		4. Always assume valid input.
Each event is represented by a JS object with a start and end attribute. The value of these attributes is the number of minutes since 9am. So {start:30, end:90) represents an event from 9:30am to 10:30am.
The events should be rendered in a container that is 620px wide (600px + 10px padding on the left/right) and 720px (the day will end at 9pm). The styling of the events should match the attached screenshot
You may structure your code however you like, but you must implement the following function in the global namespace. The function takes in an array of events and will lay out the events according to the above description.

##Method used
####Greedy algorithm (dynamic_rendering.html & index.html)	1. Sort events in ascending order by start time.

	2. Group all events by overlapping.

	3. Add new column to events and push to existing one if space is present.

####Interval tree and recursion method (dynamic_rendering_interval_tree.html)
#####Please note this is experimental method but this obey all the rules for rendering.
	
	1. Data from greedy algorithm is used to create interval tree.

	2. Width is calculated per overlapping events.

	3. Recursion is done until all elements seems symmetric.
	
	4. Data pushed to DOM.

	###Code to test calendar rendering with random data

<pre>function cases(){
	function rand(min,max) {
		return Math.floor(Math.random()*(max-min+1)+min);
	}
	array=[];
	for(var i=0; i<=20;i++){
		dict={}
		dict['start']=rand(0,720);
		dict['end']=dict['start']+rand(5,100);
		array.push(dict);
	}
	return array;
}

window.setInterval(function(){
  layOutDay(cases());
}, 3000);
</pre>##