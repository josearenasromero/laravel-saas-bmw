@extends('layouts.master')
@section('javascript')
    <script>
        jQuery(document).ready(function() {
            var purchase_events = <?php echo json_encode($events, JSON_HEX_APOS); ?>;
            console.log(purchase_events);

            var h = {};

            if (jQuery('#calendar').width() <= 400) {
                h = {
                    left: 'title',
                    center: '',
                    right: 'prev,next'
                };
            } else {
                h = {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                };
            }

            jQuery('#calendar').fullCalendar({
                header: h,
                events: purchase_events
            });
        });
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Book Marketing Wizard (BMW)</div>

                    <div class="panel-body">
                        Welcome <b>{{ Auth::user()->name }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <h4><i class="icon-calendar"></i> Calendar</h4>
                    </div>
                    <div class="widget-content">
                        <div id="calendar"></div>
                    </div>
                </div> <!-- /.widget box -->
            </div> <!-- /.col-md-6 -->
        </div>
    </div>
@endsection
