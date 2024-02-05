$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

function getQueryParam(url, param) {
  param = param.replace(/[\[\]]/g, '\\$&');
  var regex = new RegExp('[?&]' + param + '(=([^&#]*)|&|#|$)'),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

let currentUrl = window.location.href;

let studentNoValue = getQueryParam(currentUrl, 'studentNo');

let password = getQueryParam(currentUrl, 'password');

$.ajax({
  type: 'GET',
  url: '/auth/getInfo',
  data: { studentNoValue },
  dataType: 'json',
  success: function (response) {
    $('#student-no').val(response.data['studentNo']);
    $('#first-name').val(response.data['firstName']);
    $('#middle-name').val(response.data['middleName']);
    $('#last-name').val(response.data['lastName']);
    $('#email').val(response.data['email']);
    $('#course').val(response.data['course']);
    $('#contact-no').val(response.data['contact']);
    $('#address').val(response.data['address']);
    $('#sex').val(response.data['sex']);
    $('#password').val(password);
  }
});

$('#formFinalRegister').on('submit', function (e) {
  e.preventDefault();

  Swal.fire({
    title: 'Note',
    text: 'If you proceed, you will not be able to access your SIS account; you will now be identified as an alumna/alumnus.',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Proceed'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: '/register-alumni',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) {
          if (response.status_code == 0) {
            $('#message').html("<div class = 'alert alert-success'>Redirecting, please wait...</div>");
            location.href = '/auth/login-basic';
          } else {
            console.log('error');
          }
        }
      });
    }
  });
});
