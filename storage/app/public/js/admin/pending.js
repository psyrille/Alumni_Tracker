$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$('#pending-accounts').DataTable({
  paging: false,
  ordering: false,
  info: false
});

$('div.dataTables_filter input').addClass('form-control mb-2');

$('.btn-approve').click(function (e) {
  e.preventDefault();

  let sid = $(this).attr('sid');
  let el = this;

  $.ajax({
    type: 'POST',
    url: '/admin/approve-account',
    data: { sid },
    dataType: 'json',
    success: function (response) {
      if (response.status_code == 0) {
        $(el)
          .closest('.table-row')
          .css('--bs-bg-opacity', '.5')
          .addClass('bg-success')
          .fadeOut(400, function () {
            $(this).remove();
          });
      }
    }
  });
});

$('.btn-disapprove').click(function (e) {
  e.preventDefault();

  let sid = $(this).attr('sid');
  let el = this;

  Swal.fire({
    title: 'Disapprove',
    text: 'Are you sure?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Disapprove',
    confirmButtonColor: '#d33'
  }).then(result => {
    if (result.isConfirmed) {
      (async () => {
        const { value: text } = await Swal.fire({
          input: 'textarea',
          inputLabel: 'Reason for disapproval',
          inputPlaceholder: 'Type your reason here...',
          inputAttributes: {
            'aria-label': 'Type your message here'
          },
          showCancelButton: true,
          preConfirm: text => {
            if (!text) {
              Swal.showValidationMessage('Please enter reason');
            }
          }
        });

        if (text) {
          $.ajax({
            type: 'POST',
            url: '/admin/disapprove-account',
            data: { sid, text },
            beforeSend: function () {
              $('.loading').css('display', 'block');
            },
            dataType: 'json',
            success: function (response) {
              if (response.status_code == 0) {
                $('.loading').css('display', 'none');
                Swal.fire({
                  text: response.Message,
                  icon: 'success'
                });

                $(el)
                  .closest('.table-row')
                  .css('--bs-bg-opacity', '.3')
                  .addClass('bg-danger')
                  .fadeOut(400, function () {
                    $(this).remove();
                  });
              }
            }
          });
        }
      })();
    }
  });
});
