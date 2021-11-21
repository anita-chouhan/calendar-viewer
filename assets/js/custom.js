/**
 * Main Calendar Viewer Methods
 *
 * initialView: Layout to initialize calendar
 * initialDate: Date to initialize calendar
 * headerToolbar: Header Toolbar
 * customButtons: Hidden button to fetch custom events
 * events: Load events data from database
 * dateClick: To open day view on clicking a cell
 * eventDidMount: To set background color for event cell
 */

/* (start) Main method to  load calendar display*/
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: '2021-11-07',
    headerToolbar: {
      left: 'prev,next today,custom1',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    customButtons: {
      custom1: {
        text: 'custom 1',
        click: function() {
          var month = document.getElementById("month").value;
          var year = document.getElementById("year").value;
          var newDateStr = year+'-'+month+'-01';
          calendar.gotoDate(new Date(newDateStr));  
        }
      }
    },
   events: 'api.php',
   dateClick: function(info){
        calendar.gotoDate(new Date(info.dateStr));  
        calendar.changeView("timeGridDay");
    },
    eventDidMount: function (event) {
      $(event.el).closest('.fc-daygrid-day').css('background-color', '#FAA732');
    }
  });

  calendar.render();
  
});
/* (end) Main method to  load calendar display*/


/* (start)Method to fetch events on click of button */
function fetchEvents(){
  $('.fc-custom1-button').click();
}
/* (end) Method to fetch events on click of button */
