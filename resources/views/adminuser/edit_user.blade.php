@extends('layouts.master')

@section('title', 'User Edit')
@section('subtitle', 'User Administration')
@section('javascript')
    <script>
        jQuery(document).ready(function() {});
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal row-border', 'id' => 'main-form']) !!}
        <!--=== Vertical Forms ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> User Information</h4>
                </div>
                <div class="widget-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username</label>
                        <div class="col-md-3">
                            {!! Form::text('name', null, ['class' => 'form-control required']) !!}
                        </div>
                        <label class="col-md-1 control-label">E-mail</label>
                        <div class="col-md-3">
                            {!! Form::text('email', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-3">
                            {!! Form::password('password', null, ['class' => 'form-control required']) !!}
                        </div>
                        <label class="col-md-1 control-label">Bio</label>
                        <div class="col-md-3">
                            {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => '2']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Website</label>
                        <div class="col-md-3">
                            {!! Form::text('website', null, ['class' => 'form-control']) !!}
                        </div>
                        <label class="col-md-1 control-label">Facebook</label>
                        <div class="col-md-3">
                            {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Twitter</label>
                        <div class="col-md-3">
                            {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                        </div>
                        <label class="col-md-1 control-label">Amazon Page</label>
                        <div class="col-md-3">
                            {!! Form::text('amazon_page', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Instagram</label>
                        <div class="col-md-3">
                            {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
                        </div>
                        <label class="col-md-1 control-label">Bookbub</label>
                        <div class="col-md-3">
                            {!! Form::text('bookbub', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Goodreads</label>
                        <div class="col-md-3">
                            {!! Form::text('goodreads', null, ['class' => 'form-control']) !!}
                        </div>
                        <label class="col-md-1 control-label">Pinterest</label>
                        <div class="col-md-3">
                            {!! Form::text('pinterest', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Notes</label>
                        <div class="col-md-7">
                            {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '3']) !!}
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
