@extends('layout.master_layout')

@section('body')
<style>
    .mtop {
        margin-top: -15px;
    }
</style>

<div class="row">
    <div class="col-md-2">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="page-header" style="border-bottom: 1px solid #04401f;">
                        <h4>Menu</h4>
                    </div>
                    <div class="mt-3" style="font-size: 13pt;">
                        @include('control.side_menu_report')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="page-header" style="border-bottom: 1px solid #04401f;">
                    <h4>Reports </h4>
                </div>
                <label class="badge badge-secondary">Search Patient:</label><br>
                <select class="form-control form-control-sm select2" id="patient-select" name="ext_name">
                    <option disabled selected> --Select-- </option>
                    @foreach($patients as $p)
                        <option value="{{ $p->id }}" @if(isset($id)) {{ ($p->id == $id) ? 'selected' : ''}} @endif>{{ strtoupper($p->lname) }} {{ strtoupper($p->fname) }} {{ strtoupper($p->mname) }}</option>
                    @endforeach
                </select>
                <br>
                @if(isset($id))
                    <iframe src="{{ route('peheReport', $id) }}" frameborder="0" height="1000" width="100%"></iframe>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection