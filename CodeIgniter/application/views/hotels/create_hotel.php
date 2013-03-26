<head>
</head>

<body>

	<h1>Create A New Hotel</h1>
	<?php echo form_open('hotels_controller/create'); ?>

	<p>
		Hotel Code:<?php echo form_input($hotel_code); ?>
	</p>

	<p>
		Name:<?php echo form_input($name); ?>
	</p>

	<p>
		Location:<?php echo form_input($location); ?>
	</p>

	<p>
		<?php echo form_submit($hotel_submit); ?>
	</p>

	<?php echo form_close(); ?>

</body>
