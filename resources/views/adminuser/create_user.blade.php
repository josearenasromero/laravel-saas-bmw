@extends('layouts.master')

@section('title', 'New User')
@section('subtitle', 'User Administration')
@section('javascript')
    <script>
        jQuery(document).ready(function() {

        });
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'user.store', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal row-border', 'id' => 'main-form']) !!}
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
                            <input type="text" name="name" class="form-control required">
                        </div>

                        <label class="col-md-1 control-label">E-mail</label>
                        <div class="col-md-3">
                            <input type="email" name="email" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-3">
                            <input type="password" name="password" class="form-control required">
                        </div>
                        <label class="col-md-1 control-label">Bio</label>
                        <div class="col-md-3">
                            <textarea name="bio" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Website</label>
                        <div class="col-md-3">
                            <input type="text" name="website" class="form-control">
                        </div>
                        <label class="col-md-1 control-label">Facebook</label>
                        <div class="col-md-3">
                            <input type="text" name="facebook" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Twitter</label>
                        <div class="col-md-3">
                            <input type="text" name="twitter" class="form-control">
                        </div>
                        <label class="col-md-1 control-label">Amazon Page</label>
                        <div class="col-md-3">
                            <input type="text" name="amazon_page" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Instagram</label>
                        <div class="col-md-3">
                            <input type="text" name="instagram" class="form-control">
                        </div>
                        <label class="col-md-1 control-label">Bookbub</label>
                        <div class="col-md-3">
                            <input type="text" name="bookbub" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Goodreads</label>
                        <div class="col-md-3">
                            <input type="text" name="goodreads" class="form-control">
                        </div>
                        <label class="col-md-1 control-label">Pinterest</label>
                        <div class="col-md-3">
                            <input type="text" name="pinterest" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Notes</label>
                        <div class="col-md-7">
                            <textarea name="notes" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-3 control-label">Administrator</label>
						<div class="col-md-3">
                            <input type="checkbox" name="admin" class="form-control">
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
