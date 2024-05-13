@extends('layouts.master')

@section('title', 'Edit Promotion Site')
@section('subtitle', 'Promotion Site Administration')
@section('javascript')
    <script>
        jQuery(document).ready(function() {
            jQuery("input[name=cost]").inputmask({
                alias: 'numeric',
                groupSeparator: ',',
                digits: 2,
                digitsOptional: false,
                prefix: '$ ',
                placeholder: '0',
                rightAlign: false,
                autoUnmask: false,
                removeMaskOnSubmit: true
            });
        });
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::model($promotion_site, ['route' => ['promotionsite.update', $promotion_site->id], 'method' => 'PUT', 'class' => 'form-horizontal row-border', 'id' => 'main-form']) !!}
        <!--=== Vertical Forms ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Promotion Site Information</h4>
                </div>
                <div class="widget-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Promo Site</label>
                        <div class="col-md-3">
                            {!! Form::text('promo_site', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Link</label>
                        <div class="col-md-3">
                            {!! Form::text('link', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cost</label>
                        <div class="col-md-3">
                            {!! Form::text('cost', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Notes</label>
                        <div class="col-md-3">
                            {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '2']) !!}
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
