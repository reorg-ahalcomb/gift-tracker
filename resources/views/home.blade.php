@extends('layouts.master')

@section('styles')
@parent
<link href="{{ asset('css/template/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/template/datatables/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('full_title', 'Gift Tracker')

@section('content')

@if(session('messages'))
<div class="row">
    <div class="col-md-12">
        @foreach(session('messages') as $message)
        <div class="alert alert-{{ $message['type'] }}">
            <i class="fa fa-{{ $message['icon'] }}"></i> {{ $message['text'] }}
        </div>
        @endforeach
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-bar-chart font-dark"></i>
                    <span class="caption-subject bold uppercase"> General Payment Data <small>2014 Reporting Year</small></span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="{{ url('refresh') }}">
                        <i class="icon-refresh"></i>
                    </a> 
                    <a class="btn btn-circle btn-icon-only btn-default" href="{{ url('download') }}">
                        <i class="icon-cloud-download"></i>
                    </a> 
                    <span style="font-size:1.2rem;">Last updated: {{ $updated }}</span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            @foreach($columns as $key => $column)
                            <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->

    </div>
</div>
@endsection

@section('plugins')
@parent
<script src="{{ asset('js/template/datatable.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/template/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/template/datatables/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection

@section('scripts')
@parent
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#sample_1');

        // begin first table
        table.dataTable({
            "ajax": {
                "url": "{{ url('json/payments') }}",
            },
            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
            "columns": [
                @foreach($columns as $key => $column)
                { "data": "{{ $key }}" },
                @endforeach
            ],
            "lengthMenu": [
                [10, 15, 20, -1],
                [10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,            
            "pagingType": "bootstrap_full_number"
        });
    })
</script>
@endsection