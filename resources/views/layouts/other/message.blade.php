<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
  if ("{{ Session::has('success') }}") {
    Toast.fire({
      icon: 'success',
      title: "{{ Session::get('success') }}",
    })
  }
  if ("{{ Session::has('info') }}") {
    Toast.fire({
      icon: 'info',
      title: "{{ Session::get('info') }}",
    })
  }
  if ("{{ Session::has('warning') }}") {
    Toast.fire({
      icon: 'warning',
      title: "{{ Session::get('warning') }}",
    })
  }
  if ("{{ Session::has('error') }}") {
    Swal.fire({
      icon: 'error',
      title: "{{ Session::get('error') }}",
      showConfirmButton: false,
      timer: 2000
    })
  }
</script>
