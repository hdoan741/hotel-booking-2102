<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
</head>
<body>

<script>
    $(function() {
        $("#start_date").datepicker({dateFormat:'yy-mm-dd'});
	$('#end_date').datepicker({dateFormat:'yy-mm-dd'});
	
    });
</script>

<h1>Hotel Booking</h1>
<?php echo form_open('booking/create_booking'); ?>

<p>
Location:<?php echo form_input($location); ?>
</p>

<p>
Check-in:<?php echo form_input($start_date); ?>
</p>

<p>
Check-out:<?php echo form_input($end_date); ?>
</p>

<p>
Room Type: <?php echo form_dropdown('room_type', $room_type_options, 'double'); ?>
</p>

<p>
Rooms: <?php echo form_dropdown('num_room', $num_room_options, '1'); ?>
</p>

<p>
Child No:<?php echo form_input($num_child); ?>
</p>

<p>
Adult No:<?php echo form_input($num_adult); ?>
</p>

<!--<p>
<a>+ More Rooms</a>
</p>-->

<p>
<?php echo form_submit($booking_submit); ?>
</p>

<?php echo form_close(); ?>

</body>
