<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
</head>
<body>

<script>
    $(function() {
        $("#start_date").datepicker();
	$('#end_date').datepicker();
    });
</script>

<h1>Hotel Booking</h1>
<?php echo form_open('booking/create_booking'); ?>

<p>
Start Date:<?php echo form_input($start_date); ?>
</p>

<p>
End Date:<?php echo form_input($end_date); ?>
</p>

<p>
Child No:<?php echo form_input($num_child); ?>
</p>

<p>
Adult No:<?php echo form_input($num_adult); ?>
</p>

<p>
Room Type: <?php echo form_dropdown('room_type', $room_type_options, 'double'); ?>
</p>

<p>
no. of rooms: <?php echo form_dropdown('num_room', $num_room_options, '1'); ?>
</p>

<!--<p>
<a>+ More Rooms</a>
</p>-->

<p>
<?php echo form_submit($booking_submit); ?>
</p>

<?php echo form_close(); ?>

</body>
