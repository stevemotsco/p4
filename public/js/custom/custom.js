


$(function() {
  // Enable Pickadate on an input field and 
  // specifying date format for hidden input field
  $('#event_date').pickadate({
  	labelMonthNext: 'Go to the next month',
    labelMonthPrev: 'Go to the previous month',
    selectMonths: true,
    selectYears: true
    formatSubmit : 'yyyy/mm/dd'
  });
});


