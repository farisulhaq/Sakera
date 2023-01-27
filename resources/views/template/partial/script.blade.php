<script src={{ asset('assets/js/bootstrap.js') }}></script>
<script src={{ asset('assets/js/app.js') }}></script>

<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>

{{-- confirmasi delete --}}
<script type="text/javascript">
  $('table tbody').on('click', '.showConfirm', function(event) {
    var form = $(this).next();
    console.log(form)
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Apakah kamu yakin untuk menghapus`,

        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
</script>
{{-- sweatalert success --}}
@if (session()->has('success'))
  <script>
    swal({
      icon: 'success',
      title: '{{ session()->get('success') }}',
      buttons: false,
      timer: 1500
    });
  </script>
@endif
{{-- sweatalert success --}}

@if (session()->has('error'))
  <script>
    swal({
      icon: 'error',
      title: '{{ session()->get('error') }}',
      buttons: false,
      timer: 1500
    });
  </script>
@endif
