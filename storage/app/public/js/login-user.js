$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$('#formLogin').on('submit', function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '/user-login',
    data: $(this).serialize(),
    dataType: 'json',
    success: function (response) {
      if (response.status_code == 0) {
        $('#message').html('<div class="alert alert-success">Redirecting Please wait...</div>');
        $('#error-message').html('');
        location.href = '/';
      } else if (response.status_code == 2) {
        $('#message').html('');
        $('#error-message').html(response.Message);
        $('#error-message').css('color', 'tomato');
        $('#error-message').css('font-size', '0.7rem');
      } else {
        $('#message').html('');
        $('#error-message').html(response.Message);
        $('#error-message').css('color', 'tomato');
        $('#error-message').css('font-size', '0.7rem');
      }
    }
  });
});
