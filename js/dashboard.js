// document ready function
$(document).ready(function() { 	

    //------------- Full calendar  -------------//
    $(function () {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
		
        //front page calendar
        $('#calendar').fullCalendar({
            //isRTL: true,
            //theme: true,
            header: {
                left: 'title,today',
                center: 'prev,next',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                prev: '<span class="icon24 icomoon-icon-arrow-left-2"></span>',
                next: '<span class="icon24 icomoon-icon-arrow-right-3"></span>'
            },
            editable: true,
            events: [
            {
                title: 'All Day Event',
                start: new Date(y, m, 1)
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d-5),
                end: new Date(y, m, d-2)
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d-3, 16, 0),
                allDay: false
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d+4, 16, 0),
                allDay: false
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                color: '#9FC569'
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d+1, 19, 0),
                end: new Date(y, m, d+1, 22, 30),
                allDay: false,
                color: '#ED7A53'
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/'
            }
            ]
        });
        if(localStorage.getItem == 1 ) {
            $('#calendar').fullCalendar({
                isRTL: true
            });
        }
    });

    

    var divElement = $('div'); //log all div elements

    //------------- Visitor chart -------------//

    


});//End document ready functions

