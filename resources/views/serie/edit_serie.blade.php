@extends('layouts.master')

@section('title', 'Edit Series')
@section('subtitle', 'Series Administration')
@section('javascript')

@endsection

@section('content')
    <div class="row">
        {!! Form::model($serie, ['route' => ['serie.update', $serie->id], 'method' => 'PUT', 'class' => 'form-horizontal row-border', 'id' => 'main-form']) !!}
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
                            {!! Form::text('name', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Update" class="btn btn-primary pull-right">
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
