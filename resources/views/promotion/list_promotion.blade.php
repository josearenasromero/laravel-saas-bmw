@extends('layouts.master')

@section('title', 'Promotion List')
@section('subtitle', 'Promotion Administration')
@section('javascript')
    <script>
        function confSubmit(event, form) {
            event.preventDefault();
            if (confirm("Do you want to delete this promotion?")) {
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
                                <th role="columnheader" data-class="expand">Series</th>
                                <th role="columnheader" data-class="expand">Book</th>
                                <th role="columnheader" data-class="expand">Title</th>
                                <th role="columnheader" data-class="expand">Promo Name</th>
                                <th role="columnheader" data-class="expand">Start Date</th>
                                <th role="columnheader" data-class="expand">End Date</th>
                                <th role="columnheader" data-class="expand">Sale Price</th>
                                <th role="columnheader" data-class="expand">Usual Price</th>
                                <th role="columnheader" data-class="expand">Profit Rate</th>
                                <th role="columnheader" data-class="expand">Profit</th>
                                <th role="columnheader" data-class="expand">ROI</th>
                                <th role="columnheader" data-hide="phone,tablet">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($promotions as $promotion) { ?>
                            <tr>
                                <td><?php echo $promotion->serie->name; ?></td>
                                <td><?php echo $promotion->book->title; ?></td>
                                <td><?php echo $promotion->title; ?></td>
                                <td><?php echo $promotion->name; ?></td>
                                <td><?php echo $promotion->start_date; ?></td>
                                <td><?php echo $promotion->end_date; ?></td>
                                <td>$<?php echo number_format($promotion->price_during_sale, 2); ?></td>
                                <td>$<?php echo number_format($promotion->usual_price, 2); ?></td>
                                <td><?php echo $promotion->profit_rate; ?>%</td>
                                <td>$<?php echo number_format($promotion->profit, 2); ?></td>
                                <td>$<?php echo number_format($promotion->roi, 2); ?></td>
                                <td>
                                    <a href="{{ url('/purchase/create?serie_id=' . $promotion->serie->id . '&book_id=' . $promotion->book->id . '&promotion_id=' . $promotion->id) }}">
                                        <button type="submit" class="btn btn-success btn-xs">Add Purchase</button>
                                    </a>
                                    {!! Form::open(['route' => ['promotion.edit', $promotion->id], 'method' => 'GET', 'class' => 'form-action-buttons']) !!}
                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => ['promotion.destroy', $promotion->id], 'method' => 'DELETE', 'class' => 'form-action-buttons']) !!}
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
