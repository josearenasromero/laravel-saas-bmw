

<?php $__env->startSection('title', 'Purchase List'); ?>
<?php $__env->startSection('subtitle', 'Purchase Administration'); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        function confSubmit(event, form) {
            event.preventDefault();
            if (confirm("Do you want to delete this purchase?")) {
                form.submit();
            }
        }

        jQuery(document).ready(function() {
            jQuery('.table').DataTable({
                "order": [],
                iDisplayLength: -1
                // Your other options here...
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-content no-padding">
                    <table class="table table-striped table-bordered table-hover table-checkable table-responsive">
                        <thead>
                            <tr>
                                <th role="columnheader" data-class="expand">Series</th>
                                <th role="columnheader" data-class="expand">Book</th>
                                <th role="columnheader" data-class="expand">Promotion</th>
                                <th role="columnheader" data-class="expand">Promo Site</th>
                                <th role="columnheader" data-class="expand">Date Booked</th>
                                <th role="columnheader" data-class="expand">Approved</th>
                                <th role="columnheader" data-class="expand">Scheduled</th>
                                <th role="columnheader" data-class="expand">Paid</th>
                                <th role="columnheader" data-class="expand">Spend Cost</th>
                                <th role="columnheader" data-class="expand">Number Sold</th>
                                <th role="columnheader" data-class="expand">KENP reads</th>
                                <th role="columnheader" data-class="expand">KENP rate</th>
                                <th role="columnheader" data-class="expand">KENP Tracking Start</th>
                                <th role="columnheader" data-class="expand">KENP Tracking End</th>
                                <th role="columnheader" data-class="expand">Profit</th>
                                <th role="columnheader" data-class="expand">ROI</th>
                                <th role="columnheader" data-hide="phone,tablet">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($purchases as $purchase) { 
							$bg_color = ($purchase->approved == "YES" && $purchase->scheduled == "NO") ? "style='background-color:#ff5e00'" : "";
						?>
                            <tr>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->serie->name; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->book->title; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->promotion->name; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->promo_site; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->date_booked; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->approved; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->scheduled; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo (int) $purchase->paid === 1 ? 'YES' : 'NO'; ?></td>
                                <td <?php echo $bg_color; ?>>$<?php echo number_format($purchase->spend_cost, 2); ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->number_sold; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->kenp_reads; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo number_format($purchase->kenp_rate, 4); ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->start_date; ?></td>
                                <td <?php echo $bg_color; ?>><?php echo $purchase->end_date; ?></td>
                                <td <?php echo $bg_color; ?>>$<?php echo number_format($purchase->profit, 2); ?></td>
                                <td <?php echo $bg_color; ?>>$<?php echo number_format($purchase->roi, 2); ?></td>
                                <td <?php echo $bg_color; ?>>
                                    <?php echo Form::open(['route' => ['purchase.edit', $purchase->id], 'method' => 'GET', 'class' => 'form-action-buttons']); ?>

                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    <?php echo Form::close(); ?>

                                    <?php echo Form::open(['route' => ['purchase.destroy', $purchase->id], 'method' => 'DELETE', 'class' => 'form-action-buttons']); ?>

                                    <button type="submit" onClick="confSubmit(event, this.form);"
                                        class="btn btn-danger btn-xs">Delete</button>
                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/purchase/list_purchase.blade.php ENDPATH**/ ?>