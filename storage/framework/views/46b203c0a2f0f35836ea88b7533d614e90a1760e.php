

<?php $__env->startSection('title', 'Book Edit'); ?>
<?php $__env->startSection('subtitle', 'Book Administration'); ?>
<?php $__env->startSection('javascript'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php echo Form::model($book, ['route' => ['book.update', $book->id], 'method' => 'PUT', 'class' => 'form-horizontal row-border', 'id' => 'main-form', 'files' => true]); ?>

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
                            <?php echo Form::select('serie_id', $series, null, ['class' => 'select2 full-width-fix required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            <?php echo Form::text('title', null, ['class' => 'form-control required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mini Description</label>
                        <div class="col-md-9">
                            <?php echo Form::textarea('mini_description', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Short Description</label>
                        <div class="col-md-9">
                            <?php echo Form::textarea('short_description', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Amazon Market URL</label>
                        <div class="col-md-9">
                            <?php echo Form::text('amazon_url', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">ASIN</label>
                        <div class="col-md-9">
                            <?php echo Form::text('asin', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cover Image</label>
                        <div class="col-md-9">
                            <img src="<?php echo e(URL::asset('assets/books/images')); ?>/<?php echo $book->cover_image; ?>">
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Usual Price</label>
                        <div class="col-md-9">
                            <?php echo Form::text('usual_price', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Kindle Term End Date</label>
                        <div class="col-md-9">
                            <?php echo Form::text('kindle_term_end_date', null, ['class' => 'form-control makepickadate']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <?php echo Form::text('status', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Other Notes</label>
                        <div class="col-md-9">
                            <?php echo Form::textarea('other_notes', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Update" class="btn btn-primary pull-right">
                    </div>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/book/edit_book.blade.php ENDPATH**/ ?>