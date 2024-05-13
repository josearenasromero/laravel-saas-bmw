@extends('layouts.master')

@section('title', 'Book Edit')
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
        {!! Form::model($book, ['route' => ['book.update', $book->id], 'method' => 'PUT', 'class' => 'form-horizontal row-border', 'id' => 'main-form', 'files' => true]) !!}
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
                            {!! Form::select('serie_id', $series, null, ['class' => 'select2 full-width-fix required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            {!! Form::text('title', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mini Description</label>
                        <div class="col-md-9">
                            {!! Form::textarea('mini_description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Short Description</label>
                        <div class="col-md-9">
                            {!! Form::textarea('short_description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Amazon Market URL</label>
                        <div class="col-md-9">
                            {!! Form::text('amazon_url', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">ASIN</label>
                        <div class="col-md-9">
                            {!! Form::text('asin', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cover Image</label>
                        <div class="col-md-9">
                            <img src="{{ URL::asset('assets/books/images') }}/<?php echo $book->cover_image; ?>">
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Usual Price</label>
                        <div class="col-md-9">
                            {!! Form::text('usual_price', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Kindle Term End Date</label>
                        <div class="col-md-9">
                            {!! Form::text('kindle_term_end_date', null, ['class' => 'form-control makepickadate']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::text('status', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Other Notes</label>
                        <div class="col-md-9">
                            {!! Form::textarea('other_notes', null, ['class' => 'form-control']) !!}
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
