$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$('#formWorkHistory').on('submit', function (e) {
  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/user/addWork',
    data: $(this).serialize(),
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

function updateProvinces() {
  let region = $('#select-region').val();

  $.ajax({
    type: 'POST',
    url: '/user/region',
    data: { region },
    success: function (response) {
      // Clear existing options
      $('#select-province').find('option').remove();

      // Populate new options based on the response data
      $(response.data).each(function (i, p) {
        console.log(p.regCode);
        $('#select-province').append('<option value="' + p.provCode + '">' + p.provDesc + '</option>');
      });
    }
  });
}

$('#select-region').on('change', updateProvinces);

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
        success: function (response) {}
      });
    }
  });
});
