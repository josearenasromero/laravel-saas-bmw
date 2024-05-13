@extends('layouts.master')

@section('title', 'New Promotion')
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

            jQuery("select[name=serie_id]").select2({
                width: '100%',
                placeholder: "Select a Series"
            });
            jQuery("select[name=book_id]").select2({
                width: '100%',
                placeholder: "Select a Book"
            });

            <?php
            $jsonbooks = json_encode($books);
            echo 'var jsonbooks = ' . $jsonbooks . ';';
            ?>

            jQuery("select[name=serie_id]").on("change", function() {
                jQuery("select[name=book_id]").empty();
                jQuery("select[name=book_id]").val(null).trigger('change');
                var newOption = new Option("", null, false, false);
                jQuery("select[name=book_id]").append(newOption).trigger('change');
                var serie_id = jQuery(this).val();
                var books = jsonbooks.filter(x => x.serie_id === parseInt(serie_id));

                for (i = 0; i < books.length; i++) {
                    var newOption = new Option(books[i].title, books[i].id, false, false);
                    jQuery("select[name=book_id]").append(newOption).trigger('change');
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'promotion.store', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal row-border', 'id' => 'main-form', 'files' => true]) !!}
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
                            <select name="serie_id" class="required" required>
                                <option></option>
                                <?php foreach($series as $serie) { ?>
                                <option value="<?php echo $serie->id; ?>"><?php echo $serie->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Book</label>
                        <div class="col-md-9">
                            <select name="book_id" class="required" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" name="title" class="form-control" readonly>
                            <input type="hidden" name="title_hidden" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Promo Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Color</label>
                        <div class="col-md-9">
                            <input type="text" name="color" class="form-control required bs-colorpicker"
                                data-colorpicker-guid="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Start Date</label>
                        <div class="col-md-9">
                            <input type="text" name="start_date" class="form-control required makepickadate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">End Date</label>
                        <div class="col-md-9">
                            <input type="text" name="end_date" class="form-control required makepickadate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Price During Sale</label>
                        <div class="col-md-9">
                            <input type="text" name="price_during_sale" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Usual Price</label>
                        <div class="col-md-9">
                            <input type="text" name="usual_price" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Profit Rate</label>
                        <div class="col-md-9">
                            <input type="text" name="profit_rate" class="form-control required">
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
