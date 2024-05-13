@extends('layouts.master')

@section('title', 'New Purchase')
@section('subtitle', 'Purchase Administration')
@section('javascript')
    <script>
        jQuery(document).ready(function() {
            jQuery("input[name=spend_cost]").inputmask({
                alias: 'numeric',
                groupSeparator: ',',
                digits: 2,
                digitsOptional: false,
                prefix: '$ ',
                rightAlign: false,
                autoUnmask: false,
                removeMaskOnSubmit: true
            });

            jQuery("input[name=kenp_rate]").inputmask({
                alias: 'numeric',
                groupSeparator: ',',
                digits: 4,
                digitsOptional: false,
                prefix: '$ ',
                rightAlign: false,
                autoUnmask: false,
                removeMaskOnSubmit: true
            });

            jQuery("select[name=serie_id]").select2({
                width: '100%',
                placeholder: "Select a Series"
            });
            jQuery("select[name=book_id]").select2({
                width: '100%',
                placeholder: "Select a Book"
            });
            jQuery("select[name=promotion_id]").select2({
                width: '100%',
                placeholder: "Select a Promotion"
            });

            jQuery("select[name=approved]").select2({
                width: '100%',
                placeholder: "Select an Option"
            });
            jQuery("select[name=scheduled]").select2({
                width: '100%',
                placeholder: "Select an Option"
            });

            <?php
            $jsonbooks = json_encode($books);
            echo 'var jsonbooks = ' . $jsonbooks . ';';
            
            $jsonpromotions = json_encode($promotions);
            echo 'var jsonpromotions = ' . $jsonpromotions . ';';
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

            jQuery("select[name=book_id]").on("change", function() {
                jQuery("select[name=promotion_id]").empty();
                jQuery("select[name=promotion_id]").val(null).trigger('change');
                var newOption = new Option("", null, false, false);
                jQuery("select[name=promotion_id]").append(newOption).trigger('change');
                var book_id = jQuery(this).val();
                var serie_id = jQuery("select[name=serie_id]").val();
                var promotions = jsonpromotions.filter(x => x.book_id === parseInt(book_id) && x
                    .serie_id === parseInt(serie_id));

                for (var j = 0; j < promotions.length; j++) {
                    var newOption = new Option(promotions[j].name, promotions[j].id, false, false);
                    jQuery("select[name=promotion_id]").append(newOption);
                }
                jQuery("select[name=promotion_id]").trigger('change');
            });

            <?php
			if(isset($selected_serie, $selected_book, $selected_promotion) && $selected_serie != "" && $selected_book != "" && $selected_promotion != "") {
				?>
            jQuery("select[name=serie_id]").val(<?php echo $selected_serie; ?>).trigger('change');
            jQuery("select[name=book_id]").val(<?php echo $selected_book; ?>).trigger('change');
            jQuery("select[name=promotion_id]").val(<?php echo $selected_promotion; ?>).trigger('change');
            <?php
			}
		?>
        });
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'purchase.store', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal row-border', 'id' => 'main-form', 'files' => true]) !!}
        <!--=== Vertical Forms ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Purchase Information</h4>
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
                        <label class="col-md-3 control-label">Promotion</label>
                        <div class="col-md-9">
                            <select name="promotion_id" class="required" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Promo Site</label>
                        <div class="col-md-9">
                            <input type="text" name="promo_site" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Date Booked</label>
                        <div class="col-md-9">
                            <input type="text" name="date_booked" class="form-control required makepickadate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Approved</label>
                        <div class="col-md-9">
                            <select name="approved" class="required">
                                <option></option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Scheduled</label>
                        <div class="col-md-9">
                            <select name="scheduled" class="required">
                                <option></option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Paid</label>
                        <div class="col-md-1">
                            <input type="checkbox" name="paid" value="1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Spend / Cost</label>
                        <div class="col-md-9">
                            <input type="text" name="spend_cost" class="form-control" value="0.00">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Number Sold</label>
                        <div class="col-md-9">
                            <input type="number" name="number_sold" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP reads</label>
                        <div class="col-md-9">
                            <input type="number" name="kenp_reads" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP rate</label>
                        <div class="col-md-9">
                            <input type="text" name="kenp_rate" class="form-control" value="0.0045">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP Tracking Start</label>
                        <div class="col-md-9">
                            <input type="text" name="start_date" class="form-control makepickadate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP Tracking End</label>
                        <div class="col-md-9">
                            <input type="text" name="end_date" class="form-control makepickadate">
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
