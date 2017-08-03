<p>Veja toda a lista dos seus orçamentos abaixo:</p>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-3">
            <col class="col-xs-2">
            <col class="col-xs-1">
            <col class="col-xs-1">
        </colgroup>
        <thead>
            <tr>
                <th>Data</th>
                <th>Orçamento</th>
                <th class="center">Funcionário</th>
                <th class="center">Status</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            <tr>
                <td>{{ $order->created_at }}</td>
                <td>{!! $order->order_desc !!}</td>
                <td class="center">{{ $order->manager_name }}</td>
                <td class="center">{!! $order->status_label !!}</td>
                <td class="center">{!! $order->front_action_buttons !!}</td>
            </tr>
            @empty
            <tr class="center"><td colspan="5">Você ainda não criou nenhum orçamento.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>