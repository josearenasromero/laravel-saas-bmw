

<?php $__env->startSection('title', 'Promotion Site List'); ?>
<?php $__env->startSection('subtitle', 'Promotion Site Administration'); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        function confSubmit(event, form) {
            event.preventDefault();
            if (confirm("Do you want to delete this promotion site?")) {
                form.submit();
            }
        }
        jQuery(document).ready(function() {
            jQuery('.table').DataTable({
                iDisplayLength: -1
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
                                <th role="columnheader" data-hide="">Promo Site</th>
                                <th role="columnheader" data-hide="">Link</th>
                                <th role="columnheader" data-hide="">Cost</th>
                                <th role="columnheader" data-hide="">Notes</th>
                                <th role="columnheader" data-hide="phone,tablet">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($promotion_sites as $promotion_site) { ?>
                            <tr>
                                <td><?php echo $promotion_site->promo_site; ?></td>
                                <td><?php echo $promotion_site->link; ?></td>
                                <td>$<?php echo number_format($promotion_site->cost, 2); ?></td>
                                <td><?php echo $promotion_site->notes; ?></td>
                                <td>
                                    <?php echo Form::open(['route' => ['promotionsite.edit', $promotion_site->id], 'method' => 'GET', 'class' => 'form-action-buttons']); ?>

                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    <?php echo Form::close(); ?>

                                    <?php echo Form::open(['route' => ['promotionsite.destroy', $promotion_site->id], 'method' => 'DELETE', 'class' => 'form-action-buttons']); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/promotionsite/list_promotionsite.blade.php ENDPATH**/ ?>