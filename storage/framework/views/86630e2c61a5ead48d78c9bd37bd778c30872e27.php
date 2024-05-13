

<?php $__env->startSection('title', 'Series List'); ?>
<?php $__env->startSection('subtitle', 'Series Administration'); ?>
<?php $__env->startSection('javascript'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                    <?php echo Form::open(['route' => ['serie.edit', $serie->id], 'method' => 'GET', 'class' => 'form-action-buttons']); ?>

                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    <?php echo Form::close(); ?>

                                    <?php echo Form::open(['route' => ['serie.destroy', $serie->id], 'method' => 'DELETE', 'class' => 'form-action-buttons']); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/serie/list_serie.blade.php ENDPATH**/ ?>