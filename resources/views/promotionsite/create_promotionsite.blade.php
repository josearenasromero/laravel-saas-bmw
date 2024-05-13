@extends('layouts.master')

@section('title', 'New Promotion Site')
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
        {!! Form::open(['route' => 'promotionsite.store', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal row-border', 'id' => 'main-form']) !!}
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
                            <input type="text" name="promo_site" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Link</label>
                        <div class="col-md-3">
                            <input type="text" name="link" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cost</label>
                        <div class="col-md-3">
                            <input type="text" name="cost" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Notes</label>
                        <div class="col-md-3">
                            <textarea name="notes" class="form-control" rows="2"></textarea>
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
