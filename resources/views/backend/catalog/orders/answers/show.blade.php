@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.catalog.orders.order') . ' #00' . $order->id)

@section('page-header')
    <h1>
        {{ trans('labels.backend.catalog.orders.management') }}
        <small>{{ trans('labels.backend.catalog.orders.title') }}</small>
    </h1>
@endsection

@section('content')
<!-- Main content -->
<section class="invoice">

	@include('backend.catalog.includes.orders', ['model' => $order])

	<div class="row order_method_payment">
		<!-- accepted payments column -->
		<div class="col-xs-12" style="border: 1px solid #999; padding: 10px">
		  	<p class="lead"><b>{{ trans('labels.backend.catalog.orders.reply_to') }} {{ $order->answers->users->name }}:</b></p><br>
		  	{!! $order->answers->message !!}
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<br><br><br>
	<div class="row no-print">
		<div class="col-xs-12">
	  		<a href="{{ route('admin.catalog.order.answer.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('buttons.general.back') }}</a>

	  		<button onclick="window.print();" class="btn btn-primary"><i class="fa fa-print"></i> {{ trans('buttons.general.print') }}</button>
		</div>
	</div>
</section>
<!-- /.content -->
@stop