@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.catalog.orders.management') . ' | ' . trans('labels.backend.catalog.orders.create'))

@section ('after-styles')
	<!-- CK Editor -->
	<link href="{{ asset('css/backend/plugin/wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.catalog.orders.management') }}
        <small>{{ trans('labels.backend.catalog.orders.title') }}</small>
    </h1>
@endsection

@section ('content')
	<!-- Main content -->
	<section class="invoice">

		@include('backend.catalog.includes.orders', ['model' => $order])

		<div class="row order_method_payment">
			<!-- accepted payments column -->
			<div class="col-xs-12">
			  	<p class="lead">{{ trans('labels.backend.catalog.orders.title') }}:</p>
			  	{!! Form::model($order, ['method' => 'POST', 'route' => ['admin.catalog.order.answer.store', $order->id]]) !!}
			  	{{ Form::hidden('order_id', $order->id) }}
		  		{{ Form::textarea('answer', null, ['class' => 'textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) }}
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		<br><br>
		<div class="row no-print">
			<div class="col-xs-12">
		  		<a href="{{ route('admin.catalog.order.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('buttons.general.cancel') }}</a>

		  		<button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"></i> {{ trans('buttons.general.answer') }}</button>
				{{ Form::close() }}
			</div>
		</div>

	</section>
	<!-- /.content -->
@stop

@section ('after-scripts')
	<!-- CK Editor -->
	<script src="{{ asset('js/backend/plugin/wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script>$(function () {	$(".textarea").wysihtml5();	});</script>
@stop