@extends('layouts.master')

@section('title', 'Promo Track')
@section('subtitle', 'Promo Administration')
@section('javascript')
    <style>
        input[type=text] {
            display: none;
        }
    </style>
    <script>
        jQuery(document).ready(function() {
            jQuery('.table').DataTable({
                "order": [[1,"asc"]],
                iDisplayLength: -1
                // Your other options here...
            });
			
			jQuery('span[class$="-span"]').on('click', function() {
				var custom_id = $(this).attr('custom-id');
                var class_name = $(this).attr('class').split('-');
                var name = class_name[0];
				// console.log(class_name);
				$(this).hide();
				$('#'+name+"-"+custom_id).show();
			});
			
			jQuery('input[type=text]').on('focusout', function() {
				var id = $(this).attr('id');
                var name = $(this).attr('name');
				var custom_id = id.split('-');
				$(this).hide();
				$('span[custom-name='+name+'-'+custom_id[1]+']').show();
				// console.log(custom_id[1]);
			});
			
			jQuery('input[type=text]').on('change', function() {
                var attr = $(this).attr('id').split('-');
                var id = attr[1];
                var name = $(this).attr('name');
                var input = $(this).val();
               				
				$.ajax({
                    url: '{{route("book.inline_edit")}}',
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        id: id,
                        name: name,
                        input: input
                    },
                    success: function(result){
                        $('span[custom-name='+name+"-"+id+']').text(input);
                        console.log(result);
                    }
                });
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
                                <th style="width: 25%" role="columnheader" data-class="expand">Title</th>
                                <th style="width: 10%" role="columnheader" data-class="expand">End Date 1</th>
                                <th style="width: 10%" role="columnheader" data-class="expand">Status</th>
                                <th style="width: 25%" role="columnheader" data-class="expand">Promotion Sites with Purchases</th>
                                {{-- <th role="columnheader" data-class="expand">ASIN</th>
                                <th role="columnheader" data-class="expand">Price</th> --}}
                                <th style="width: 20%" role="columnheader" data-class="expand">Notes</th>
                                <th style="width: 10%" role="columnheader" data-hide="phone,tablet">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>
                                    @if($book->amazon_url != null || $book->amazon_url != '')
                                    <a href="{{$book->amazon_url}}" target="_blank">{{$book->title}}</a>
                                    @else
                                    {{$book->title}}
                                    @endif
                                </td>
                                {{-- <td>{{$book->kindle_term_end_date}}</td> --}}
                                <td><span class='kindle_term_end_date-span' custom-name="kindle_term_end_date-{{$book->id}}" custom-id='<?php echo $book->id; ?>'><?php echo $book->kindle_term_end_date; ?></span>{!! Form::text('kindle_term_end_date', $book->kindle_term_end_date, ['class' => 'form-control makepickadate', 'id' => 'kindle_term_end_date-'.$book->id]) !!}</td>
                                <td><span class='status-span' custom-name="status-{{$book->id}}" custom-id='<?php echo $book->id; ?>'><?php echo $book->status; ?></span>{!! Form::text('status', $book->status, ['class' => 'form-control required', 'id' => 'status-'.$book->id]) !!}</td>
                                <td>{{$book->promo_site}}</td>
                                {{-- <td>{{$book->asin}}</td>
                                <td>${{number_format($book->usual_price, 2)}}</td> --}}
                                <td><span class='other_notes-span' custom-name="other_notes-{{$book->id}}" custom-id='<?php echo $book->id; ?>'><?php echo $book->other_notes; ?></span>{!! Form::text('other_notes', $book->other_notes, ['class' => 'form-control required', 'id' => 'other_notes-'.$book->id]) !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['book.edit',$book->id], 'method' => 'GET', 'class' => 'form-action-buttons']) !!}
                                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
