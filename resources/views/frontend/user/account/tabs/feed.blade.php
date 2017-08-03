
<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium harum ea quo! Nulla fugiat earum, sed corporis amet iste non, id facilis dolorum, suscipit, deleniti ea. Nobis, temporibus magnam doloribus. Reprehenderit necessitatibus esse dolor tempora ea unde, itaque odit. Quos.</p>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
      <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
      </colgroup>
      <thead>
        <tr>
          <th>Data</th>
          <th>Atividade</th>
        </tr>
      </thead>
      <tbody>
        @if ($orders->count() > 0)
          @foreach ($orders as $order)
          <tr>
              <td><code>{{ $order->created_at }}</code></td>
              <td>
              Você criou um orçamento <b>#00{{ $order->id }}</b>
              </td>
          </tr>
          @endforeach
        @else
          <tr><td class="center" colspan="2">Você não criou nenhum orçamento.</td></tr>
        @endif
        <tr>
      </tbody>
    </table>
</div>