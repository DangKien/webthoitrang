@extends('layouts.master') @section('content')
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <input type='text' class="form-control" id='datetimepicker1' />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button type="button" id="getValue">get Value</button>
        </div>
    </div>
</div>
@endsection