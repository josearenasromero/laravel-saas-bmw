@extends('layouts.master')

@section('title', 'Series List')
@section('subtitle', 'Series Administration')
@section('javascript')
    <script>
        function confSubmit(event, form) {
            event.preventDefault();
            if (confirm("Do you want to delete this series?")) {
                form.submit();
            }
        }
        jQuery(document).ready(function() {
            jQuery('.table').DataTable({
                iDisplayLength: -1
            });
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-content no-padding">
                    <table class="table table-striped table-bordered table-hover table-checkable table-responsive">
                        <thead>
                            <tr>
                                <th role="columnheader" data-hide="">Name</th>
                                <th role="columnheader" data-hide="phone,tablet">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($series as $serie) { ?>
                            <tr>
                                <td><?php echo $serie->name; ?></td>
                                <td>
                                    {!! Form::open(['route' => ['serie.edit', $serie->id], 'method' => 'GET', 'class' => 'form-action-buttons']) !!}
                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => ['serie.destroy', $serie->id], 'method' => 'DELETE', 'class' => 'form-action-buttons']) !!}
                                    <button type="submit" onClick="confSubmit(event, this.form);"
                                        class="btn btn-danger btn-xs">Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
