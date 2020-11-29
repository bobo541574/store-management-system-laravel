@extends('backend.templates.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow text-left">
                <div class="card-header h5 text-primary font-weight-bold">
                    Supplier Detail
                </div>
              <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4 offset-md-4">
                        <img src="{{ $supplier->photo }}" width="130px" alt="logo">
                        <h4 class="text-primary font-weight-bold my-4">{{ $supplier->name }}</h4>
                    </div>
                </div>
                <hr style="border: 1px solid #cfcfcf" />
                
                {{-- <table style="width: 100%;" > --}}
                    @foreach ($supplier->contacts as $contact)
                    <div class="row mx-3">
                        <div class="col-md-4 h6 text-dark">
                            <i class="fa fa-phone"></i> &nbsp;&nbsp;phone : 
                        </div>
                        <div class="col-md-8 h6 text-dark">
                           <li><a href="tel://{{ $contact->phone }}">{{ $contact->phone }}</a></li>
                        </div>
                    </div>
                    <div class="row mx-3">
                        <div class="col-md-4 h6 text-dark">
                            <i class="fas fa-mail-bulk"></i> &nbsp;&nbsp;mail : 
                        </div>
                        <div class="col-md-8 h6 text-dark">
                            <li><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a> </li>
                        </div>
                    </div>
                    <div class="row mx-3">
                        <div class="col-md-4 h6 text-dark">
                            <i class="fa fa-address-book" aria-hidden="true"></i> &nbsp;&nbsp;address : 
                        </div>
                        <div class="col-md-8 h6 text-dark">
                            <li>{{ $contact->addressing }}</li>
                        </div>
                    </div>
                    <hr style="border: 1px solid #cfcfcf" />

                    @endforeach
                {{-- </table> --}}
            </div>
        </div>
    </div>
@endsection