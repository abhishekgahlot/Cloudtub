/*
    Calendar module divided into three parts:

    @sorted : Sort events by start date

    @group_elements: Group all the elements which overlaps into one.

    @elements : return html data of events with column adjustment to fill up space.

    No external dependency, Packing algorithm can be optimised for specific interval.

*/

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

                maxColumns = [];

                group.forEach(function(elem) {
                    maxColumns.push(elem.column);
                });

                maxColumn = Math.max.apply(Math, maxColumns);  //Find Maximum column in group

                width = (600 / maxColumn) - 5; //Subtract 5px due to border for each event.

                group.forEach(function(elem,groups) {

                    _elements += '<div class="event" style="\
                                     width:' + width + 'px;\
                                     left:' + ((600 / maxColumn) * (elem.column - 1) + 10) + 'px;\
                                     top: ' + elem.start + 'px;\
                                     height:' + (elem.end - elem.start) + 'px;\
                                    "><p>Sample Item</p><p class="mute">Sample Location</p></div>';
                });
            });
            return _elements;
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

        _html = Calendar.elements();

        c.querySelector('.well').innerHTML = _html;

    })();