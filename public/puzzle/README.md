##facebook calendar rendering challenge


Given a set of events, render the events on a single day calendar (similar to Outlook, Calendar.app, and Google Calendar). There are several properties of the layout:









####Greedy algorithm (dynamic_rendering.html & index.html)

	2. Group all events by overlapping.

	3. Add new column to events and push to existing one if space is present.

####Interval tree and recursion method (dynamic_rendering_interval_tree.html)
#####Please note this is experimental method but this obey all the rules for rendering.
	
	1. Data from greedy algorithm is used to create interval tree.

	2. Width is calculated per overlapping events.

	3. Recursion is done until all elements seems symmetric.
	
	4. Data pushed to DOM.

	

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
</pre>