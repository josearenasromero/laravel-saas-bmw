

<?php $__env->startSection('title', 'Book Report'); ?>
<?php $__env->startSection('subtitle', 'Report Administration'); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        jQuery(document).ready(function() {
            var onlyIntegers = function(value) {
                return value.replace(/[^\d]/g, '').replace(/(\..*)\./g, '$1');
            };

            jQuery("select[name=serie_id]").select2({
                width: '100%',
                placeholder: "Select a Series"
            });
            jQuery("select[name=book_id]").select2({
                width: '100%',
                placeholder: "Select a Book"
            });

            <?php
            $jsonbooks = json_encode($books);
            echo 'var jsonbooks = ' . $jsonbooks . ';';
            ?>

            jQuery("select[name=serie_id]").on("change", function() {
                jQuery("select[name=book_id]").empty();
                jQuery("select[name=book_id]").val('').trigger('change');
                var newOption = new Option("", '', false, false);
                jQuery("select[name=book_id]").append(newOption).trigger('change');
                var serie_id = jQuery(this).val();
                var books = jsonbooks.filter(x => x.serie_id === parseInt(serie_id));

                for (i = 0; i < books.length; i++) {
                    var newOption = new Option(books[i].title, books[i].id, false, false);
                    jQuery("select[name=book_id]").append(newOption).trigger('change');
                }
            });
            <?php
			if(isset($selected_book)) {
				?>
            jQuery("select[name=serie_id]").trigger('change');
            jQuery("select[name=book_id]").val(<?php echo $selected_book; ?>).trigger('change');
            <?php
			}
		?>
            jQuery('.table').DataTable({
                iDisplayLength: -1
            });
        });
        
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php echo Form::open(['route' => 'report.bookhistory_post', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal row-border', 'id' => 'main-form']); ?>

        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Filters</h4>
                </div>
                <div class="widget-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Series</label>
                        <div class="col-md-3">
                            <select name="serie_id" class="required" required>
                                <option></option>
                                <?php foreach($series as $serie) { ?>
                                <option value="<?php echo $serie->id; ?>" <?php echo isset($selected_serie) && $selected_serie == $serie->id ? 'selected' : ''; ?>><?php echo $serie->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label class="col-md-3 control-label">Book</label>
                        <div class="col-md-3">
                            <select name="book_id" class="required" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Show" class="btn btn-primary pull-right">
                    </div>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <?php if(isset($report_header)) { ?>
    <div class="row">
        <form class="form-horizontal row-border">
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header">
                        <h4><i class="icon-reorder"></i> Book Information</h4>
                    </div>
                    <div class="widget-content">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Series</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" value="<?php echo $report_header['serie']->name; ?>" disabled>
                            </div>
                            <label class="col-md-1 control-label">Title</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="<?php echo $report_header['book']->title; ?>" disabled>
                            </div>
                            <label class="col-md-1 control-label">ASIN</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" value="<?php echo $report_header['book']->asin; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-content no-padding">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable table-responsive">
                        <thead>
                            <tr>
                                <th role="columnheader" data-class="expand">Site</th>
                                <th role="columnheader" data-class="expand">Date Booked</th>
                                <th role="columnheader" data-class="expand">Number Sold</th>
                                <th role="columnheader" data-class="expand">ROI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reports as $report) { ?>
                            <tr>
                                <td><?php echo $report->promo_site; ?></td>
                                <td><?php echo $report->date_booked; ?></td>
                                <td><?php echo $report->number_sold; ?></td>
                                <td><?php echo number_format($report->roi, 2); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/authorsxp/bmw/resources/views/report/bookhistory.blade.php ENDPATH**/ ?>