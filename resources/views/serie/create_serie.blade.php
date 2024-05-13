@extends('layouts.master')

@section('title', 'New Series')
@section('subtitle', 'Series Administration')
@section('javascript')

@endsection

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'serie.store', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal row-border', 'id' => 'main-form']) !!}
        <!--=== Vertical Forms ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Series Information</h4>
                </div>
                <div class="widget-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-3">
                            <input type="text" name="name" class="form-control required">
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Create" class="btn btn-primary pull-right">
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
