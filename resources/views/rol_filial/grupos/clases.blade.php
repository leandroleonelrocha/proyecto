@extends('template')


@section('content')
	
	<div class="row">
		<div class="col-md-3">

				
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Clases</h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <div id="external-events">
                   
                    <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">Go home</div>
                    <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">Do homework</div>
                   
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Nueva clase</h3>
                </div>
                <div class="box-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                    </ul>
                  </div><!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                    <div class="input-group-btn">
                      <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                    </div><!-- /btn-group -->
                  </div><!-- /input-group -->
                </div>
              </div>
            </div>


             <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->

	</div>

@endsection

@section('js')

<script src="{{asset('js/calendario/moment.min.js') }}"></script>
<script src="{{asset('js/calendario/jquery.min.js') }}"></script>
<script src="{{asset('js/calendario/jquery-ui.min.js') }}"></script>
<script src="{{asset('js/calendario/fullcalendar.min.js') }}"></script>

<script>

  $(document).ready(function() {
 

    var zone = "05:30";  //Change this to your timezone

	  $.ajax({
	    url: 'process',
	        type: 'POST', // Send post data
	        data: 'type=fetch',
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        async: false,
	        success: function(s){
	         
	          json_events = s;
	        }
	  });


  var currentMousePos = {
      x: -1,
      y: -1
  };
    jQuery(document).on("mousemove", function (event) {
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;
    });

    /* initialize the external events
    -----------------------------------------------------------------*/


      /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

             $(this).data('event', {
		        title: $.trim($(this).text()), // use the element's text as the event title
		        stick: true // maintain when user navigates (see docs on the renderEvent method)
		      });

		      // make the event draggable using jQuery UI
		      $(this).draggable({
		        zIndex: 999,
		        revert: true,      // will cause the event to go back to its
		        revertDuration: 0  //  original position after the drag
		      });

          });
        }
        ini_events($('#external-events div.external-event'));



       /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event ui-draggable ui-draggable-handle");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });


    /* initialize the calendar
    -----------------------------------------------------------------*/

    $('#calendar').fullCalendar({
      events: JSON.parse(json_events),
      //events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
      utc: true,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      droppable: true, 
      slotDuration: '00:30:00',
      eventReceive: function(event){
        var grupo_id = 1;
        var title = event.title;
        var start = event.start.format("YYYY-MM-DD");
        var docente_id = 3;
        var dia = 1;
        var hora_desde = '01:00:00';
        var hora_hasta = '03:00:00';

        $.ajax({
            url: 'process',
            data: 'type=new&grupo_id='+grupo_id+'&fecha='+start+'&descripcion='+title+'&docente_id='+docente_id+'&dia='+dia+'&hora_desde='+hora_desde+'&hora_hasta='+hora_hasta,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            success: function(response){
              event.id = response.eventid;
              $('#calendar').fullCalendar('updateEvent',event);
            },
            error: function(e){
              console.log(e.responseText);

            }
          });
        $('#calendar').fullCalendar('updateEvent',event);
        console.log(event);
      },
      eventDrop: function(event, delta, revertFunc) {
            var title = event.title;
            var start = event.start.format();
            var end = (event.end == null) ? start : event.end.format();
            $.ajax({
          url: 'process',
          data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          dataType: 'json',
          success: function(response){
            if(response.status != 'success')                
            revertFunc();
          },
          error: function(e){             
            revertFunc();
            alert('Error processing your request: '+e.responseText);
          }
        });
        },
        eventClick: function(event, jsEvent, view) {
          	console.log(event.id);
            document.location = "clases/matricula";

      },
      eventResize: function(event, delta, revertFunc) {
        console.log(event);
        var title = event.title;
        var end = event.end.format();
        var start = event.start.format();
            $.ajax({
          url: 'process',
          data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          dataType: 'json',
          success: function(response){
            if(response.status != 'success')                
            revertFunc();
          },
          error: function(e){             
            revertFunc();
            alert('Error processing your request: '+e.responseText);
          }
        });
        },
      eventDragStop: function (event, jsEvent, ui, view) {
          if (isElemOverDiv()) {
            var con = confirm('Are you sure to delete this event permanently?');
            if(con == true) {
            $.ajax({
                url: 'process',
                data: 'type=remove&eventid='+event.id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                success: function(response){
                  console.log(response);
                  if(response.status == 'success'){
                    $('#calendar').fullCalendar('removeEvents');
                        getFreshEvents();
                      }
                },
                error: function(e){ 
                  alert('Error processing your request: '+e.responseText);
                }
              });
          }   
        }
      }
    });

  function getFreshEvents(){
    $.ajax({
      url: 'process',
          type: 'POST', // Send post data
          data: 'type=fetch',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          async: false,
          success: function(s){
            freshevents = s;
          }
    });
    $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
  }


  function isElemOverDiv() {
        var trashEl = jQuery('#trash');

        var ofs = trashEl.offset();

        var x1 = ofs.left;
        var x2 = ofs.left + trashEl.outerWidth(true);
        var y1 = ofs.top;
        var y2 = ofs.top + trashEl.outerHeight(true);

        if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
            currentMousePos.y >= y1 && currentMousePos.y <= y2) {
            return true;
        }
        return false;
    }

  

  });



</script>

@endsection