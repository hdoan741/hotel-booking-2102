$(document).ready(function() {
  var start_date = $('#booking_start').attr('value') || Date.today().add({ days: 1 });
  var end_date = $('#booking_end').attr('value') || Date.today().add({ days: 2 });
  $('#reservation').daterangepicker(
    {
      format: 'dd/MM/yyyy',
      startDate: start_date,
      endDate: end_date
    },
    function(start, end) {
      $('#booking_start').attr('value', start.toString('dd/MM/yyyy'));
      $('#booking_end').attr('value', end.toString('dd/MM/yyyy'));
    }
  );
  $('#reservation').attr('value', start_date.toString('dd/MM/yyyy') + ' - ' + end_date.toString('dd/MM/yyyy'));
  $('#booking_start').attr('value', start_date.toString('dd/MM/yyyy'));
  $('#booking_end').attr('value', end_date.toString('dd/MM/yyyy'));
});

