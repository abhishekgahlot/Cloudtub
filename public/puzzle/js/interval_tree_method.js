/*
	Few necessary functions for interval tree construction
*/
function sortNum (a,b) {
	return ((a < b) ? -1 : ((a > b) ? 1 : 0));
}

/*
	median calculate middle num of all the interval range
	@params events
	return @middle endpoint

*/

function median(events) {
		var endpoints = [];
	   	events.forEach(function(elem){
	        endpoints.push(elem.start);
	        endpoints.push(elem.end);
	    });
	    return endpoints[endpoints.length / 2];
}

function overlaps(a,b) {
	if(a.start <=  b.end && b.start <= a.end) return true;
	return false;
}

/*
	SortByKey is basically for sorting events by start or end
*/
function sortByKey (key) {
    return function(a, b) {
		return ((a[key] < b[key]) ? -1 : ((a[key] > b[key]) ? 1 : 0));
    }
}

/*
	IntervalTreeNode is called everytime recursively by
	IntervalTree.

	construct function takes @params intervals
	and divide again that by finding median.

*/
var IntervalTreeNode=function () {
    this.leftChild = null;
    this.rightChild = null;
    this.mLeftSet = null;
    this.mRightSet = null;
    this.middle = null;

    this.construct = function(intervals) {
        if (intervals.length == 0) {
            return null;
        }
        this.middle = median(intervals);
        var lSet = [];
        this.mLeftSet = [];
        this.mRightSet = [];
        var rSet = [];
        for (var i=0; i < intervals.length; i++) {

            if (intervals[i].end < this.middle) {
                lSet.push(intervals[i]);
            } else if (intervals[i].start > this.middle) {
                rSet.push(intervals[i]);
            } else {
                this.mLeftSet.push(intervals[i]);
                this.mRightSet.push(intervals[i]);
            }
        }
        this.mLeftSet.sort(sortByKey('start'));
        this.mRightSet.sort(sortByKey('end'));
        var nextChild= new IntervalTreeNode();
        if( nextChild.construct(lSet) ) {
            this.leftChild = nextChild;
        }
        nextChild= new IntervalTreeNode();
        if (nextChild.construct(rSet) ) {
            this.rightChild = nextChild;
        }
        return true;
    }
}

/*
	IntervalTree creates node and basically construct whole tree.
	Prototype methods:
		query : @params - node, range, array(in which overlapping event will be pushed)

*/

var IntervalTree=function (events) {
	var root = new IntervalTreeNode();
	root.construct(events);
	this.root=root;
}

IntervalTree.prototype.query=function (node,range,array) {

	var intervalSet;

	if(node == null){
		return ;
	}

	if (range.start <= node.middle){
		intervalSet=node.mLeftSet;
	}else if (range.start >= node.middle) {
		intervalSet=node.mRightSet;
	}


	if(typeof intervalSet !== 'undefined')
	{
		for(var i=0; i < intervalSet.length; i++)
		{
			if(overlaps(intervalSet[i],range))
			{
				array.push(intervalSet[i]);
			}
		}

	}

	this.query(node.leftChild,range,array);
	this.query(node.rightChild,range,array);
}


 var Calendar = {
        //Default events
        events: [{
            start: 30,
            end: 150
        }, {
            start: 540,
            end: 600
        }, {
            start: 560,
            end: 620
        }, {
            start: 610,
            end: 670
        }],

        sorted: function() {
          /*
            Sort event by start date.
          */
            events = Calendar.events.sort(function(obj1, obj2) {
                var a = obj1.start,
                    b = obj2.start;
                return ((a < b) ? -1 : ((a > b) ? 1 : 0));
            });
            return events;
        },


        group_elements: function() {
            events = Calendar.sorted(Calendar.events);
            var groups = [],
                tmp, maxEnd = -1; // event can start from 0 therefore -1

                /*
                   Iterate over events and group them if they overlaps
                */
            events.forEach(function(elem, index) {
                var start = elem.start;
                var end = elem.end;
                /*
                    If maxEnd is smaller than next event start, Event doesnt overlap then.
                    New array has to be created for next group.
                */
                if (maxEnd < start) {
                    tmp = [];
                    groups.push(tmp);
                }
                tmp.push(elem);
                maxEnd = Math.max(maxEnd, end);
            });
            return groups;
        },


        elements: function() {
            groups = Calendar.group_elements();

            var _elements = '';

            groups.forEach(function(group) {

                group[0].column = 1;

                group.hasOwnProperty(1) ? group[1].column = 2 : true;

                /*
                    group[i] is current group element
                    group[a] include previous elements before group[i]

                */

                for (var i = 2; i < group.length; i++) {

                    /*
                        Arrays to manage non overlapping and overlapping events to adjust columns.
                    */
                    no_overlap = [], overlap = [];

                    for (var a = 0; a < i; a++) {

                        if ((group[a].start < group[i].end && group[i].start < group[a].end)) {

                            group[i].column = group[a].column + 1;  //Overlap with previous add next column

                            overlap.push(group[i].column);

                            if (no_overlap.length !== 0 && no_overlap.indexOf(group[a].column) > -1) {

                                no_overlap.splice( no_overlap.indexOf(group[a].column) ,1 );//Overlap contains same column in non overlap. Column is removed.

                            }

                        } else {
                            group[i].column = group[a].column; //No overlap with previous column add it to current and push to array.

                            if(no_overlap.indexOf(group[a].column) == -1){

                                no_overlap.push(group[a].column);  //Avoid duplicate entries

                                }
                        }
                    }

                    if (overlap.length !== 0) {
                        group[i].column = Math.max.apply(Math, overlap); //Overlap with previous element add next column.
                    }

                    if (no_overlap.length !== 0) {
                        group[i].column = Math.min.apply(Math, no_overlap); //No overlap and column is empty push event to that column.
                    }
                }

            });
            //Flatten array for simplifying calculation.
            return [].concat.apply([],groups);
        }
    };



	window.c = document.getElementById('calendar');

	(window.layOutDay = function(events) {

        /*
          If events specified change Calendar module events default property
        */
        if (typeof events !== 'undefined') {
            Calendar.events = events;
        }

        groups = Calendar.elements();

        tree=new IntervalTree(groups);

		/*
			Initiate recurse function after dividing events according to their overlapping
			events maximum column.

		*/
		width_array=[];
		groups.forEach(function (e) {

				overlap_Array=[];
				tree.query(tree.root, e, overlap_Array);
				max=0;
				overlap_Array.forEach(function (e,i,a) {
					if(e.column > max){
						max=e.column;
					}
				});
				width=600/max;
				e.width=width;
				width_array.push(e);
		});

		/*
			This is experimental method i used to solve instead of greedy algorithm.
			It definitely can be improved for more accuracy. But greedy algorithm is faster than this.

			First it checks if events are symmetric if not recursively adjust width of events.

		*/
		function recurse(data,count){

			/*
				Array to check if element doesn't overlap with previous one or next one
				If column is less or greater.
				If no such case found recursion is stop and assumes structure of events are symmetric.
			*/
			width_column=[];
			data.forEach(function(e,i,a){
				if(typeof a[i-1] !== 'undefined' && typeof a[i+1] !== 'undefined'){
					if (e.column > a[i-1].column && e.width < a[i-1].width){
							width_column.push(e);
					}
					if(e.column < a[i+1].column && e.width > a[i+1].width){
						width_column.push(e);
					}
				}
			});

			if(count < 0 && width_column.length == 0){
					//Prepare html string when all events are symmetric.
					html='';
					data.forEach(function(e){

						html += '<div class="event" style="\
                                  width:' + (e.width-5) + 'px;\
                                  left:' + ((e.width) * (e.column - 1) + 10) + 'px;\
                                  top: ' + e.start + 'px;\
                                  height:' + (e.end - e.start) + 'px;\
                                 "><p>Sample Item</p><p class="mute">Sample Location</p></div>';

					});
					return html;

			}else{

				new_data=[];
				data.forEach(function(e){

					overlapping_elements=[];
					tree.query(tree.root, e, overlapping_elements);
					min=[];
					overlapping_elements.forEach(function(a){
							min.push(a.width);
					});
					min=Math.min.apply(Math,min);
					e.width=min;
					new_data.push(e);

				});
				count--;
				return recurse(new_data,count);
			}
		}

		_html=recurse(width_array,0); //0 means recurse function will run atleast once

        c.querySelector('.well').innerHTML = _html;

    })();