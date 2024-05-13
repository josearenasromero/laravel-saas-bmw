

<?php $__env->startSection('title', 'Book List'); ?>
<?php $__env->startSection('subtitle', 'Book Administration'); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        function confSubmit(event, form) {
            event.preventDefault();
            if (confirm("Do you want to delete this book?")) {
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
                                <th role="columnheader" data-class="expand">Series</th>
                                <th role="columnheader" data-class="expand"></th>
                                <th role="columnheader" data-class="expand">Title</th>
                                <th role="columnheader" data-class="expand">Mini Desc</th>
                                <th role="columnheader" data-class="expand">Short Desc</th>
                                <th role="columnheader" data-class="expand">Amazon Marketing URL</th>
                                <th role="columnheader" data-class="expand">ASIN</th>
                                <th role="columnheader" data-class="expand">Price</th>
                                <th role="columnheader" data-class="expand">End Date 1</th>
                                <th role="columnheader" data-class="expand">End Date 2</th>
                                <th role="columnheader" data-class="expand">Status</th>
                                <th role="columnheader" data-class="expand">Other Notes</th>
                                <th role="columnheader" data-hide="phone,tablet">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($books as $book) { ?>
                            <tr>
                                <td><?php echo $book->serie->name; ?></td>
                                <td><a href="<?php echo e(URL::asset('assets/books/images')); ?>/<?php echo $book->cover_image; ?>"
                                        target="_blank"><img
                                            src="<?php echo e(URL::asset('assets/books/images')); ?>/<?php echo $book->cover_image; ?>"
                                            style="max-width:150px;height:auto"></a></td>
                                <td><?php echo $book->title; ?></td>
                                <td><?php echo $book->mini_description; ?></td>
                                <td><?php echo $book->short_description; ?></td>
                                <td><a href="<?php echo e($book->amazon_url); ?>" target="_blank"><?php echo e($book->amazon_url); ?></a></td>
                                <td><?php echo $book->asin; ?></td>
                                <td>$<?php echo number_format($book->usual_price, 2); ?></td>
                                <td><?php echo $book->kindle_term_end_date; ?></td>
                                <td><?php echo $book->kindle_term_end_expiration_date; ?></td>
                                <td><?php echo $book->status; ?></td>
                                <td><?php echo $book->other_notes; ?></td>
                                <td>
                                    <?php echo Form::open(['route' => ['book.edit', $book->id], 'method' => 'GET', 'class' => 'form-action-buttons']); ?>

                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    <?php echo Form::close(); ?>

                                    <?php echo Form::open(['route' => ['book.destroy', $book->id], 'method' => 'DELETE', 'class' => 'form-action-buttons']); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/book/list_book.blade.php ENDPATH**/ ?>