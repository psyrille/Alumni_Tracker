$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

function decodeJwtResponse(token) {
  let base64Url = token.split('.')[1];
  let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
  let jsonPayload = decodeURIComponent(
    atob(base64)
      .split('')
      .map(function (c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
      })
      .join('')
  );
  return JSON.parse(jsonPayload);
}

window.onSignIn = googleUser => {
  var user = decodeJwtResponse(googleUser.credential);
  if (user) {
    // signOut();
    $.ajax({
      url: '/auth/sso',
      method: 'post',
      data: { email: user.email },
      dataType: 'json',
      beforeSend: function () {
        $('#loginmsg').html("<div class = 'alert alert-success'>Redirecting, please wait...</div>");
      },
      success: function (response) {
        console.log(response);
        if (response.status_code == 0) {
          window.location.href = response.Message;
        } else if (response.status_code == 1) {
          $('#loginmsg').html("<div class = 'alert alert-danger'>" + response.Message + '</div>');
          setInterval(() => {
            $('#loginmsg').html('');
          }, 3000);
        }
      }
    });
  } else {
    $('#loginmsg').html("<div class = 'alert alert-danger'>You have no institutional account registered.</div>");
  }
};
