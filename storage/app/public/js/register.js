$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$('#btn-register').click(function (e) {
  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/register',
    data: $('#form-register').serialize(),
    dataType: 'json',
    beforeSend: function () {
      $('#message').html("<div class = 'alert alert-success'>Redirecting, please wait...</div>");
    },
    success: function (response) {
      if (response.status_code == 0) {
        location.href = '/auth/register-edit?studentNo=' + response.studentNo + '&password=' + response.password + '';
      } else if (response.status_code == 2) {
        $('#message').html("<div class = 'alert alert-danger'>" + response.Message + '</div>');
        setInterval(() => {
          $('#message').html('');
        }, 10000);
      } else {
        $('#message').html("<div class = 'alert alert-danger'>" + response.Message + '</div>');
        setInterval(() => {
          $('#message').html('');
        }, 10000);
      }
    }
  });
});
