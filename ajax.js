$(document).ready(function() {
  // Get the form and button elements
const form = $('#forma1');
const button = $('#dugme1');

// Add an event listener to the button
button.on('click', function() {
  // Use AJAX to submit the form data
  $.ajax({
    url: 'glasanje.php',
    method: 'POST',
    data: form.serialize(),
    success: function(response) {
      // Update the response element with the server's response
      $('#response').html($('<p>').text(response));
    }
  });
});

const form2 = $('#forma2');
const button2 = $('#dugme2');
// Add an event listener to the button
button2.on('click', function() {
  // Use AJAX to submit the form data
  $.ajax({
    url: 'rezultati.php',
    method: 'POST',
    data: form2.serialize(),
    success: function(response2) {
      // Update the response element with the server's response
      $('#response2').empty();
      $('#response2').html(response2);
    }
  });
});

const form3 = $('#forma3');
const button3 = $('#dugme3');
// Add an event listener to the button
button3.on('click', function() {
  // Use AJAX to submit the form data
  $.ajax({
    url: 'pretrazivanje.php',
    method: 'POST',
    data: form3.serialize(),
    success: function(response3) {
      // Update the response element with the server's response
      $('#response3').empty();
      $('#response3').html(response3);
    }
  });
});


});

