@extends('layouts.master')

@section('title', 'New Book')
@section('subtitle', 'Book Administration')
@section('javascript')
    <script>
        jQuery(document).ready(function() {
            jQuery("input[name=usual_price]").inputmask({
                alias: 'numeric',
                groupSeparator: ',',
                digits: 2,
                digitsOptional: false,
                prefix: '$ ',
                placeholder: '0',
                rightAlign: false,
                autoUnmask: true,
                removeMaskOnSubmit: true
            });
            var onlyIntegers = function(value) {
                return value.replace(/[^\d]/g, '').replace(/(\..*)\./g, '$1');
            };

            jQuery("select[name=serie_id]").select2({
                width: '100%',
                placeholder: "Select a Series"
            });
        });
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'book.store', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal row-border', 'id' => 'main-form', 'files' => true]) !!}
        <!--=== Vertical Forms ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Book Information</h4>
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
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" name="title" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mini Description</label>
                        <div class="col-md-9">
                            <textarea name="mini_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Short Description</label>
                        <div class="col-md-9">
                            <textarea name="short_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Amazon Market URL</label>
                        <div class="col-md-9">
                            <input type="text" name="amazon_url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">ASIN</label>
                        <div class="col-md-9">
                            <input type="text" name="asin" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cover Image</label>
                        <div class="col-md-9">
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Usual Price</label>
                        <div class="col-md-9">
                            <input type="text" name="usual_price" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Kindle Term End Date</label>
                        <div class="col-md-9">
                            <input type="text" name="kindle_term_end_date" class="form-control makepickadate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <input type="text" name="status" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Other Notes</label>
                        <div class="col-md-9">
                            <textarea name="other_notes" class="form-control"></textarea>
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
