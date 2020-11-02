<!-- Custom fonts for this template-->
{{-- <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css" rel="stylesheet') }}" type="text/css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<link rel="icon" type="image/png" sizes="16x16" href="/img/inventory.svg">

<!-- Custom styles for this template-->
<link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for datatable -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<style>
    #box {
        height: 70%;
        width: 50%;
        position: relative;
        margin-top: 5px;
        /* display: none; */
    }

    #custom-file {
        width: 50%;
        position: relative;
        /* display: none; */
    }

    #box #sample {
        position: relative;
        height: 140px;
        width: 100%;
        border-radius: 10px;
        background: #c2c2c2;
        /* border: 1px solid #232323; */
        display: flex;
        color: #f2f2f2;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    #preview {
        display: none;
        position: relative;
        height: 100%;
        width: 100%;
        border-radius: 10px;
        background: #f4f4f4;
        padding: 10px;
        /* border: 1px solid #232323; */
    }

    #photo {
        /* height: 160px; */
        width: 80%;
    }

    .type_file {
        height: 0;
        /* overflow: hidden; */
        display: none;
        width: 0;
    }

    .type_file+#label {
        content: url('/img/photo-camera-interface-symbol-for-button.svg');
        background: #f2f2f2;
        border: none;
        border-radius: 10px;
        border: 1px solid #232323;
        color: #232323;
        cursor: pointer;
        display: inline-block;
        font-family: 'Rubik', sans-serif;
        font-size: inherit;
        font-weight: 500;
        outline: none;
        width: 100%;
        height: 28px;
        padding: 3px 0;
        position: relative;
        vertical-align: middle;
    }

    .table-header {
        background: #2C5364;
        color: white;
    }
</style>
