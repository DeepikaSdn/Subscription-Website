@extends('layouts.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Subscription Type</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Subscription Type</h6>
        <a class="btn btn-primary btn-icon-text pull-right" href="{{ route('subscription_type.create') }}">
            <i data-feather="plus-square"></i> Add  </a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Type</th>
                <th>Days</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($types as $subscription_type)

                <tr>
                    <td>{{ $subscription_type->type }}</td>
                    <td>{{ $subscription_type->days }}</td>
                    <td>{{ $subscription_type->amount }}</td>
                   <td>{{ ($subscription_type->status == 1)?'Active':'Inactive'}}</td>
                   <td> <a class="btn btn-warning btn-icon"
                    href="{{ route('subscription_type.edit',$subscription_type->id) }}">
                    <i data-feather="edit"></i>
                </a>
                                                    
                         
             
<form method="POST" action="{{route('subscription_type.destroy',$subscription_type->id)}}" accept-charset="UTF-8" style="display:inline">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
  <button type="submit" class="btn btn-danger btn-icon" title="Delete Subscription Type" onclick="return confirm('Are you sure?')"><i
    data-feather="trash"></i> </button>
</form> 
               
              </td>
                  </tr>
                    
                @endforeach
             
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush