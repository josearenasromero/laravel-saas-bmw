@extends('layouts.master')

@section('title', 'Promotion Edit')
@section('subtitle', 'Promotion Administration')
@section('javascript')
    <script>
        function generateTitle() {
            var name = jQuery("input[name=name]").val();
            var start_date = jQuery("input[name=start_date]").val();
            var end_date = jQuery("input[name=end_date]").val();
            var price_during_sale = jQuery("input[name=price_during_sale]").val();
            var usual_price = jQuery("input[name=usual_price]").val();
            var final_name = name + " - " + start_date + " - " + end_date + " - " + price_during_sale + " usually " +
                usual_price;
            return final_name;
        }

        jQuery(document).ready(function() {
            jQuery('input[name=color]').colorpicker().on('changeColor', function(ev) {
                jQuery(this).css("background-color", ev.color.toHex());
            });

            jQuery("input[name=price_during_sale]").inputmask({
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
            jQuery("input[name=usual_price]").inputmask({
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
            jQuery("input[name=profit_rate]").inputmask({
                alias: 'percentage',
                placeholder: '0',
                rightAlign: false,
                autoUnmask: true,
                removeMaskOnSubmit: true
            });

            jQuery("input[name=name], input[name=price_during_sale], input[name=usual_price]").on("keyup",
            function() {
                var new_title = generateTitle();
                jQuery("input[name=title]").val(new_title);
                jQuery("input[name=title_hidden]").val(new_title);
            });

            jQuery("input[name=start_date], input[name=end_date]").on("change", function() {
                var new_title = generateTitle();
                jQuery("input[name=title]").val(new_title);
                jQuery("input[name=title_hidden]").val(new_title);
            });

            var onlyIntegers = function(value) {
                return value.replace(/[^\d]/g, '').replace(/(\..*)\./g, '$1');
            };
            jQuery("select[name=serie_id]").select2({
                width: '100%',
                placeholder: "Select a Series"
            });
            jQuery("select[name=book_id]").select2({
                width: '100%',
                placeholder: "Select a Book"
            });
        });
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::model($promotion, ['route' => ['promotion.update', $promotion->id], 'method' => 'PUT', 'class' => 'form-horizontal row-border', 'id' => 'main-form', 'files' => true]) !!}
        <!--=== Vertical Forms ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Promotion Information</h4>
                </div>
                <div class="widget-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Series</label>
                        <div class="col-md-9">
                            {!! Form::select('serie_id', $series, null, ['class' => 'select2 full-width-fix required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Book</label>
                        <div class="col-md-9">
                            {!! Form::select('book_id', $books, null, ['class' => 'select2 full-width-fix required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            {!! Form::text('title', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                            {!! Form::hidden('title_hidden', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Promo Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Color</label>
                        <div class="col-md-9">
                            {!! Form::text('color', null, ['class' => 'form-control required bs-colorpicker', 'data-colorpicker-guid' => '1', 'style' => 'background-color:' . $promotion->color]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Start Date</label>
                        <div class="col-md-9">
                            {!! Form::text('start_date', null, ['class' => 'form-control required makepickadate']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">End Date</label>
                        <div class="col-md-9">
                            {!! Form::text('end_date', null, ['class' => 'form-control required makepickadate']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Price During Sale</label>
                        <div class="col-md-9">
                            {!! Form::text('price_during_sale', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Usual Price</label>
                        <div class="col-md-9">
                            {!! Form::text('usual_price', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Profit Rate</label>
                        <div class="col-md-9">
                            {!! Form::text('profit_rate', null, ['class' => 'form-control required']) !!}
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
