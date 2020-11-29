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

    /* csrf torken */
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    /* status update */
    function statusUpdate(id) {
        let data = document.querySelector(`#status_${id}`);
        let model = data.getAttribute('data-model');
        fetch(`status/update/${id}`, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'post',
            credentials: "same-origin",
            body: JSON.stringify({status:data.value, model: model}),
        })
        .then(res => res.json())
        .then(result => console.log(result))
    }

    /* number formate */
    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 2) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
  </script>
