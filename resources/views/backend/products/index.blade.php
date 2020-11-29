@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h5 text-primary font-weight-bold">
            Product List
            <a href="javascript:void(0)" class="btn btn-sm btn-danger float-right click" title="Extra Cost"
                data-toggle="modal" data-target="#extra_cost"><i class="fas fa-money-check-alt"></i> &nbsp; Add Extra Cost</i>
            </a>
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            @include('backend.products._excerpt')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#products').DataTable({
            // "processing": true,
            // "serverSide": true,
            // "ajax": "{{ route('products.index') }}",
        });
        // let checkBoxs = document.querySelectorAll("input[type=checkbox]");
        // let checkBox = "";
        // for(let i =0; i < checkBoxs.length; i++) {
        //     checkBox = checkBoxs[i];
        //     console.log(checkBox);
        // }
        let click = document.querySelector('.click');
        click.addEventListener('click', function() {
            let extra = document.querySelector('#extra');
            extra.value = JSON.stringify(attribute);
        })
    });

    var attribute = [];
    function checkBox(key) {
        let check = document.querySelector(`#check_${key}`);
        let id = check.getAttribute("data-id");
        let item = {id : id}
        attribute.push(item);
        // console.log(attribute);
        
        // // let list = array.map((n) {
            
        // // })

        // let preX = "";
        // let list = attribute.filter( x => {
        //     let data = '';
        //     if(x.key != preX) {
        //         data = x;
        //     } else {

        //     }
        //     preX = x.key;
        //     return data;
        // })
        // console.log(list);
        
    }

</script>
@endpush
