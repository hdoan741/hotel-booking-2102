<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
  <div class="carousel-inner">
    <div class="item active">
      <img src="/img/hotel1.JPG">
      <div class="container">
        <div class="carousel-caption">
          <h1>Book your next vacation.</h1>
          <p class="lead">Simple hotel booking right at your fingertips.</p>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="/img/hotel2.JPG">
      <div class="container">
        <div class="carousel-caption">
          <h1>Guaranteed lowest price.</h1>
          <p class="lead">Our prices for hotels can't be beat. </p>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="/img/hotel3.JPG">
      <div class="container">
        <div class="carousel-caption">
          <h1>Reliable customer service.</h1>
          <p class="lead">Available 24 hours a day, 7 days a week to help serve you.</p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div><!-- /.carousel -->
<div class="search-form">
  <div class="search-header">
    <h1>Book your hotel</h1>
  </div>
  <br/>
  <form class="form-horizontal" action="/search">
    <div class="control-group">
      <label class="control-label">Location</label>
      <div class="controls">
        <input type="text" name="location" value="Singapore"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Number of Rooms</label>
      <div class="controls">
        <input type="text" name="room_num" value="1"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="reservation">Reservation dates:</label>
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on"><i class="icon-calendar"></i></span>
          <input type="text" id="reservation">
          <input type="hidden" name="start_date" id="booking_start">
          <input type="hidden" name="end_date" id="booking_end">
        </div>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn btn-primary">Search!</button>
    </div>
  </form>
</div>
