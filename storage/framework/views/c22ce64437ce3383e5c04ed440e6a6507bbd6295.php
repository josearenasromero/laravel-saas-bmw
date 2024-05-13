

<?php $__env->startSection('title', 'User List'); ?>
<?php $__env->startSection('subtitle', 'User Administration'); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        function confSubmit(event, form) {
            event.preventDefault();
            if (confirm("Do you want to delete this user?")) {
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
                                <th role="columnheader" data-class="expand">User</th>
                                <th role="columnheader" data-class="expand">E-mail</th>
                                <th role="columnheader" data-class="expand">Bio</th>
                                <th role="columnheader" data-class="expand">Website</th>
                                <th role="columnheader" data-class="expand">Facebook</th>
                                <th role="columnheader" data-hide="phone,tablet">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user) { ?>
                            <tr>
                                <td><?php echo $user->name; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->bio; ?></td>
                                <td><a href="<?php echo $user->website; ?>" target="_blank"><?php echo $user->website; ?></a></td>
                                <td><?php echo $user->facebook; ?></td>
                                <td>
                                    <?php echo Form::open(['route' => ['user.edit', $user->id], 'method' => 'GET', 'class' => 'form-action-buttons']); ?>

                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    <?php echo Form::close(); ?>


                                    <?php echo Form::open(['route' => ['user.view_as'], 'method' => 'POST', 'class' => 'form-action-buttons']); ?>

                                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                    <button type="submit" class="btn btn-success btn-xs" <?php if ($user->id == Auth::id()) { ?> disabled
                                        <?php } ?>>
                                        View As
                                    </button>
                                    <?php echo Form::close(); ?>


                                    <?php echo Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE', 'class' => 'form-action-buttons']); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/adminuser/list_user.blade.php ENDPATH**/ ?>