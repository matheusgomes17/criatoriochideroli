<!DOCTYPE html>
<html>
<head>
    <title>Orçamento #00{{ $order->id }}</title>

    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="invoice">

            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        {{ app_name() }}
                        <small class="pull-right">Data: {{ $order->created_at }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <b>N° Orçamento:</b> #00{{ $order->id }}<br><br>
                    <b>Quantidade:</b> {{ $order->items->count() }} @if($order->items->count() > 1) produtos @else produto @endif<br>
                    <b>Prazo de entrega:</b> 15 dias úteis<br>
                    <b>Validade do Orçamento:</b> {{ $order->shelf_life }}
                </div>
                <div class="col-sm-4 invoice-col">
                    Para:
                    <address>
                        <strong>{{ $order->users->name }}</strong><br>
                        Telefone: {{ $order->users->full_phone }}<br>
                        E-mail: {{ $order->users->email }}
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    De:
                    <address>
                        <strong>{{ app_name() }}</strong><br>
                        Est. Vicinal Arlindo Pizzo, S/N,<br>
                        KM 1,1 Lado Direito, Água Limpa<br>
                        Glicério - SP, 16270-000<br>
                        Telefone: (18) 99777-1101<br>
                        E-mail: criatoriochideroli@gmail.com
                    </address>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Animal</th>
                                <th>Categoria</th>
                                <th>Nº de Registro</th>
                                <th>Idade</th>
                                <th>Altura</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->products->name }}</td>
                                <td>{{ $item->products->categories->name }}</td>
                                <td>{{ $item->products->code }}</td>
                                <td>{{ $item->products->birth_day }}</td>
                                <td>{{ $item->products->height }}</td>
                                <td><img alt="{{ $item->products->name }}" width="60" src="{{ $item->products->getImageUrl('thumb') }}" /></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-12">
                    <p class="lead"><b>Métodos de Pagamento:</b></p>
                    <img src="{{ asset('img/backend/credit/visa.png') }}" alt="Visa">
                    <img src="{{ asset('img/backend/credit/mastercard.png') }}" alt="Mastercard">
                    <img src="{{ asset('img/backend/credit/american-express.png') }}" alt="American Express">
                    <img src="{{ asset('img/backend/credit/paypal2.png') }}" alt="Paypal">

                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
            </div>

            <div class="row order_method_payment">
                <!-- accepted payments column -->
                <div class="col-xs-12" style="border: 1px solid #999; padding: 10px">
                    <p class="lead"><b>{{ trans('labels.backend.catalog.orders.reply_to') }} {{ $order->answers->users->name }}:</b></p>
                    {!! $order->answers->message !!}
                </div>
                <!-- /.col -->
            </div>

        </div>
    </div>

    <script src="{{ asset('js/frontend/jquery.js') }}"></script>
    <script>$(function() { window.print(); });</script>
</body>
</html>