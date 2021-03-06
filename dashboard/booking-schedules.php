<?php include("includes/connection.php");
    include("includes/header.php");
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Booking Schedules</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
    
            <li class="breadcrumb-item">Schedules</li>
            <li class="breadcrumb-item active">Booking Schedules</li>
        </ol>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-body">
                            <h4 class="card-title m-t-10">Legend</h4>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="calendar-events" class="">
                                        <div  data-class="bg-info"><i class="fa fa-circle text-info"></i> Available</div>
                                        <div  data-class="bg-success"><i class="fa fa-circle text-success"></i>Fully Booked</div>
                                        <div  data-class="bg-danger"><i class="fa fa-circle text-danger"></i>Cancelled</div>
                                        <div data-class="bg-warning"><i class="fa fa-circle text-warning"></i>Finished</div>
                                    </div>
                          
                                
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <div class="card-body b-l calender-sidebar">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN MODAL -->
<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Travel And Tour Information</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Package Name: </p>
                <p>Travel Dates: </p>
                <p>Slots: </p>
                <p>Status: </p>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
               
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
            


<?php include("includes/footer.php") ?>

<script type="text/javascript">
    
!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$calendar = $('#calendar'),
        this.$event = ('#calendar-events div.calendar-events'),
        this.$categoryForm = $('#add-new-event form'),
        this.$extEvents = $('#calendar-events'),
        this.$modal = $('#my-event'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$calendarObj = null
    };


    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) { 
        var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
    },
    /* on click on event */
    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
        var $this = this;
            var form = $("<form></form>");
            form.append("<label>Package Name</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' disabled /><span class='input-group-btn'></span></div>");

            form.append("<label>Travel And Tour Id</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.travelAndTourId + "' disabled /><span class='input-group-btn'></span></div>");

            form.append("<label>Travel Dates</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.travelDate + "' disabled /><span class='input-group-btn'></span></div>");

            form.append("<label>Slots Booked</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.slotsBooked + "' disabled /><span class='input-group-btn'></span></div>");

             form.append("<label>Status</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.travelAndTourStatus + "' disabled /><span class='input-group-btn'></span></div>");



            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                    return (ev._id == calEvent._id);
                });
                $this.$modal.modal('hide');
            });
            $this.$modal.find('form').on('submit', function () {
                calEvent.title = form.find("input[type=text]").val();
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                $this.$modal.modal('hide');
                return false;
            });
    },
    /* on select */
    CalendarApp.prototype.onSelect = function (start, end, allDay) {
        var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-purple'>Purple</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-pink'>Pink</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                if (title !== null && title.length != 0) {
                    $this.$calendarObj.fullCalendar('renderEvent', {
                        title: title,
                        start:start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);  
                    $this.$modal.modal('hide');
                }
                else{
                    alert('You have to give a title to your event');
                }
                return false;
                
            });
            $this.$calendarObj.fullCalendar('unselect');
    },
    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }
    /* Initializing */
    CalendarApp.prototype.init = function() {
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

        var defaultEvents =  [
            <?php $qry1 = mysqli_query($connection, "select * from travel_and_tour_view");
            while ($res1 = mysqli_fetch_assoc($qry1)) { ?>

            {   

                travelAndTourStatus: '<?php echo $res1['travelAndTourStatus'] ?>',
                travelAndTourId: '<?php echo $res1['travelAndTourId'] ?>',
                travelDate: '<?php echo $res1['departureDate'] ?>' + " - " + '<?php echo $res1['returnDate']; ?>',
                slotsBooked: '<?php 
                                    $qry13 = mysqli_query($connection, "select COALESCE(sum(numberOfPaxBooked),0) as slotsTaken from booking_table where travelAndTourId = '" . $res1['travelAndTourId'] . "'");
                                    $res13 = mysqli_fetch_assoc($qry13);

                                    echo $res13['slotsTaken'];

                                    ?>/<?php echo $res1['maxPax']; ?>',
                packageId: '<?php echo $res1['packageId'] ?>',
                title: '<?php echo $res1['packageName'] ?>',
                start: '<?php echo $res1['departureDate'] ?>',
                end: '<?php echo $res1['returnDate'] ?>',
                className: 'bg-<?php 

                if ($res1['travelAndTourStatus']== 'Available') {
                 echo 'info'; 
                }
                elseif($res1['travelAndTourStatus']== 'Fully Booked') { 
                echo 'success';
                }
                elseif($res1['travelAndTourStatus']== 'Cancelled due to weather') { 
                echo 'danger';
                }
                elseif($res1['travelAndTourStatus']== 'Cancelled due to unsufficient pax') { 
                echo 'danger';
                }
                elseif($res1['travelAndTourStatus']== 'Finished') { 
                echo 'warning';
                } 


                ?>'
            },

            <?php } ?>
            ];

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',  
            defaultView: 'month',  
            handleWindowResize: true,   
             
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: defaultEvents,
            displayEventTime: false,
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            eventLimit: false, // allow "more" link when too many events
            selectable: false,
            drop: function(date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="calendar-events" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-circle text-' + categoryColor + '"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
</script>