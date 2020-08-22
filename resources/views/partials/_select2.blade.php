@push('select2')
    <link href="{{ asset('dashboard/css/select2.min.css') }}" rel="stylesheet"/>  
    <script src="{{ asset('dashboard/js/select2.full.min.js') }}"></script> 
    <script>
      $(function () {
        $('select').select2();
      })
    </script>
@endpush
