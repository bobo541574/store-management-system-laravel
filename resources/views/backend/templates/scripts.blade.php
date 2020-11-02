<!-- Bootstrap core JavaScript-->
<script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>

{{-- <!-- Page level plugins -->
<script src="{{ asset('/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('/js/demo/chart-pie-demo.js') }}"></script> --}}

  <!-- Page level plugins -->
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /* single image uploade */
    /* event => addEventListener, image => input[type=file] & preview image, box => image container */
    function photoUpload(event, preview, box, sample) { 
      event.addEventListener('change', function () {
          const file = this.files[0];
          if (file) {
              const reader = new FileReader();
              reader.readAsDataURL(file);
              reader.onload = () => {
                  const result = reader.result;
                  preview.src = result;
                  preview.style.display = 'block';
                  (sample == false) ? (document.querySelector('#sample').style.display = 'none') : '';
              }

          }
      })
    }

    
  </script>
