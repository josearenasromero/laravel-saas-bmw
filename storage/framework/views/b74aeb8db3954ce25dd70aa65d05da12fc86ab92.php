

<?php $__env->startSection('title', 'Purchase Edit'); ?>
<?php $__env->startSection('subtitle', 'Purchase Administration'); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        jQuery(document).ready(function() {
            jQuery("input[name=spend_cost]").inputmask({
                alias: 'numeric',
                groupSeparator: ',',
                digits: 2,
                digitsOptional: false,
                prefix: '$ ',
                placeholder: '0',
                rightAlign: false,
                autoUnmask: false,
                removeMaskOnSubmit: true
            });

            jQuery("input[name=kenp_rate]").inputmask({
                alias: 'numeric',
                groupSeparator: ',',
                digits: 4,
                digitsOptional: false,
                prefix: '$ ',
                placeholder: '0.0045',
                rightAlign: false,
                autoUnmask: false,
                removeMaskOnSubmit: true
            });

            jQuery("select[name=serie_id]").select2({
                width: '100%',
                placeholder: "Select a Series"
            });
            jQuery("select[name=book_id]").select2({
                width: '100%',
                placeholder: "Select a Book"
            });
            jQuery("select[name=promotion_id]").select2({
                width: '100%',
                placeholder: "Select a Promotion"
            });

            jQuery("select[name=approved]").select2({
                width: '100%',
                placeholder: "Select an Option"
            });
            jQuery("select[name=scheduled]").select2({
                width: '100%',
                placeholder: "Select an Option"
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php echo Form::model($purchase, ['route' => ['purchase.update', $purchase->id], 'method' => 'PUT', 'class' => 'form-horizontal row-border', 'id' => 'main-form', 'files' => true]); ?>

        <!--=== Vertical Forms ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Purchase Information</h4>
                </div>
                <div class="widget-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Series</label>
                        <div class="col-md-9">
                            <?php echo Form::select('serie_id', $series, null, ['class' => 'select2 full-width-fix required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Book</label>
                        <div class="col-md-9">
                            <?php echo Form::select('book_id', $books, null, ['class' => 'select2 full-width-fix required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Promotion</label>
                        <div class="col-md-9">
                            <?php echo Form::select('promotion_id', $promotions, null, ['class' => 'select2 full-width-fix required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Promo Site</label>
                        <div class="col-md-9">
                            <?php echo Form::text('promo_site', null, ['class' => 'form-control required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Date Booked</label>
                        <div class="col-md-9">
                            <?php echo Form::text('date_booked', null, ['class' => 'form-control required makepickadate']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Approved</label>
                        <div class="col-md-9">
                            <?php echo Form::select('approved', ['YES' => 'YES', 'NO' => 'NO'], null, ['class' => 'select2 full-width-fix required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Scheduled</label>
                        <div class="col-md-9">
                            <?php echo Form::select('scheduled', ['YES' => 'YES', 'NO' => 'NO'], null, ['class' => 'select2 full-width-fix required']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Paid</label>
                        <div class="col-md-1">
                            <?php echo Form::checkbox('paid', 1, (int) $purchase->paid === 1 ? true : false, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Spend Cost</label>
                        <div class="col-md-9">
                            <?php echo Form::text('spend_cost', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Number Sold</label>
                        <div class="col-md-9">
                            <?php echo Form::number('number_sold', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP reads</label>
                        <div class="col-md-9">
                            <?php echo Form::number('kenp_reads', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP rate</label>
                        <div class="col-md-9">
                            <?php echo Form::text('kenp_rate', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP Tracking Start</label>
                        <div class="col-md-9">
                            <?php echo Form::text('start_date', null, ['class' => 'form-control makepickadate']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KENP Tracking End</label>
                        <div class="col-md-9">
                            <?php echo Form::text('end_date', null, ['class' => 'form-control makepickadate']); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/purchase/edit_purchase.blade.php ENDPATH**/ ?>