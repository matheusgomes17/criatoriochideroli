@extends('frontend.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="col-sm-9">

                    <a href="{{ route('frontend.user.account') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{ trans('buttons.general.back') }}</a>

                    <a href="#" id="print" class="btn btn-success"><i class="fa fa-print"></i> {{ trans('buttons.general.print') }}</a>

                    <div class="invoice">
                        @include('backend.catalog.includes.orders', ['model' => $order])

                        <div class="row order_method_payment">
                            <!-- accepted payments column -->
                            <br>
                            <div class="col-xs-12" style="border: 1px solid #999; padding: 10px">
                                <p class="lead"><b>{{ trans('labels.backend.catalog.orders.reply_to') }} {{ $order->answers->users->name }}:</b></p>
                                {!! $order->answers->message !!}
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>

                <div class="line visible-xs-block"></div>

                <div class="col-sm-3 clearfix">

                    <div class="list-group">
                        <a href="{{ route('frontend.user.account') }}" title="Perfil" class="list-group-item clearfix">Perfil <i class="icon-user pull-right"></i></a>
                        <a href="{{ route('frontend.auth.logout') }}" title="Sair" class="list-group-item clearfix">Sair <i class="icon-line2-logout pull-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->
@endsection

@section('after-scripts')
<script>
    $(function() { 
        $('#print').click(function(){   
            window.open('{{ route('frontend.user.order.print', $order->id) }}', '_blank');
        });
    });
</script>
@endsection