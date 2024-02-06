$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$('#formWorkHistory').on('submit', function (e) {
  e.preventDefault();

  let data = {
    year: $('#work-year').val(),
    name: $('#work-name').val(),
    country: $('#work-country option:selected').text(),
    region: $('#select-region option:selected').text().trim(),
    province: $('#select-province option:selected').text(),
    municipality: $('#select-municipality option:selected').text(),
    barangay: $('#select-barangay option:selected').text(),
    company: $('#work-company').val(),
    contact: $('#work-contact').val()
  };

  $.ajax({
    type: 'POST',
    url: '/user/addWork',
    data: { data },
    dataType: 'json',
    success: function (response) {
      if (response.status_code == 0) {
        $('#staticBackdrop').modal('toggle');
        $('#history-record').append(
          '<li class="list-group-item"><span class="text-nowrap"><b>' +
            response.data['year'] +
            '</b> • | ' +
            response.data['name'] +
            ' | ' +
            response.data['address'] +
            ' | ' +
            response.data['company_name'] +
            ' | ' +
            response.data['company_contact'] +
            '</span></li>'
        );
      }
    }
  });
});

//address

function updateProvinces(region, select_name) {
  $.ajax({
    type: 'POST',
    url: '/user/region',
    data: { region },
    success: function (response) {
      $(select_name).find('option').remove();

      $(response.data).each(function (i, p) {
        $(select_name).append('<option value="' + p.provCode + '">' + p.provDesc + '</option>');
      });
    }
  });
}

function updateMunicipality(code, select_name) {
  $.ajax({
    type: 'POST',
    url: '/user/municipality',
    data: { code },
    success: function (response) {
      $(select_name).find('option').remove();
      $(response.data).each(function (i, p) {
        $(select_name).append('<option value="' + p.citymunCode + '">' + p.citymunDesc + '</option>');
      });
    }
  });
}

function updateBarangay(code, select_name) {
  $.ajax({
    type: 'POST',
    url: '/user/barangay',
    data: { code },
    success: function (response) {
      $(select_name).find('option').remove();
      $(response.data).each(function (i, p) {
        $(select_name).append('<option value="' + p.brgyCode + '">' + p.brgyDesc + '</option>');
      });
    }
  });
}

$('#select-region').on('change', function (e) {
  updateProvinces($(this).val(), '#select-province');
  $('#select-province').find('option').remove();
  $('#select-municipality').find('option').remove();
  $('#select-barangay').find('option').remove();
});

$('#select-province').on('change', function (e) {
  updateMunicipality($(this).val(), '#select-municipality');
});

$('#select-municipality').on('change', function (e) {
  updateBarangay($(this).val(), '#select-barangay');
});

$('#formEditAbout').on('submit', function (e) {
  e.preventDefault();
  $('#editAboutModal').modal('toggle');

  Swal.fire({
    title: 'Save Changes?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#90EE90',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Save'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: '/user/editProfileAbout',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) {
          if (response.status_code == 0) {
            $('#profile-address').text(response.new_address);
          } else {
            Swal.fire({
              title: 'An error has occured',
              text: response.Message,
              icon: 'error'
            });
          }
        }
      });
    }
  });
});

$('#formEditContact').on('submit', function (e) {
  e.preventDefault();

  $('#editContactModal').modal('toggle');

  Swal.fire({
    title: 'Save Changes?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#90EE90',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Save'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: '/user/editProfileContact',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) {
          if (response.status_code == 0) {
            $('#profile-facebook').text(response.new_facebook);
            $('#profile-contact').text(response.new_contactNo);
          } else {
            Swal.fire({
              title: 'An error has occured',
              text: response.Message,
              icon: 'error'
            });
          }
        }
      });
    }
  });
});

$('#formEditAccount').on('submit', function (e) {
  e.preventDefault();
  let inputPassword = $('#edit-password').val();

  if (inputPassword.length < 6) {
    $('.confirm-message').text('Password too short');
    $('.confirm-message').css('color', 'tomato');
    $('.confirm-message').css('font-size', '0.7rem');
    return false;
  }

  if ($('#edit-password').val() != $('#edit-confirm-password').val()) {
    $('.confirm-message').text('Password does not match');
    $('.confirm-message').css('color', 'tomato');
    $('.confirm-message').css('font-size', '0.7rem');
    return false;
  }

  $('.confirm-message').html('');

  $('#editAccountModal').modal('toggle');

  Swal.fire({
    title: 'Save Changes?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#90EE90',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Save'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: '/user/editProfileAccount',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) {
          if (response.status_code == 0) {
            $('#profile-email').text(response.data['email']);
          } else {
            Swal.fire({
              title: 'An error has occured',
              text: response.Message,
              icon: 'error'
            });
          }
        }
      });
    }
  });
});

$('#select-region').prop('disabled', true);
$('#select-province').prop('disabled', true);
$('#select-municipality').prop('disabled', true);
$('#select-barangay').prop('disabled', true);

$('#work-country').on('change', function (e) {
  e.preventDefault();

  if ($(this).val() != 'PH') {
    $('#select-region').prop('disabled', true);
    $('#select-province').prop('disabled', true);
    $('#select-municipality').prop('disabled', true);
    $('#select-barangay').prop('disabled', true);
  } else {
    $('#select-region').prop('disabled', false);
    $('#select-province').prop('disabled', false);
    $('#select-municipality').prop('disabled', false);
    $('#select-barangay').prop('disabled', false);
  }
});

$('.btn-delete').click(function (e) {
  e.preventDefault();

  let el = this;
  let id = $(this).attr('sid');

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: '/user/deleteWork',
        data: { id },
        dataType: 'json',
        success: function (response) {
          if (response.status_code == 0) {
            Swal.fire({
              title: 'Deleted!',
              text: response.message,
              icon: 'success'
            });

            $(el)
              .closest('.list-work')
              .fadeOut(1000, function () {
                $(this).remove();
              });
          } else {
            Swal.fire({
              title: 'Error!',
              text: response.message,
              icon: 'error'
            });
          }
        }
      });
    }
  });
});
