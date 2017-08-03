@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.system.contacts.management') . ' | ' . trans('labels.backend.system.contacts.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.system.contacts.management') }}
        <small>{{ trans('labels.backend.system.contacts.title') }}</small>
    </h1>
@endsection

@section ('content')
	<section class="content">
		<div class="row">
			<div class="col-md-12">
	          	<div class="box box-primary">

			        <div class="box-body">
			            <div class="table-responsive">
			                <table class="table table-condensed table-hover">
						        <colgroup>
						            <col class="col-xs-2">
						            <col class="col-xs-10">
						        </colgroup>
	                        	<tr>
	                        		<td><strong>Nome</strong></td>
	                        		<td>{{ $contact->name }}</td>
	                        	</tr>
	                        	<tr>
	                        		<td><strong>E-mail</strong></td>
	                        		<td>{{ $contact->email }}</td>
	                        	</tr>
	                        	<tr>
	                        		<td><strong>Telefone</strong></td>
	                        		<td>{{ $contact->phone }}</td>
	                        	</tr>
	                        	<tr>
	                        		<td><strong>Assunto</strong></td>
	                        		<td>{{ $contact->subject }}</td>
	                        	</tr>
	                        	<tr>
	                        		<td><strong>Mensagem</strong></td>
	                        		<td>{{ $contact->message }}</td>
	                        	</tr>
			                </table>
			            </div><!--table-responsive-->

	                	<div class="form-group">
				            <h2>Resposta:</h2>
				            {!! $contact->answers->msg !!}
			            </div>
			        </div><!-- /.box-body -->

	              	<div class="box-footer">
	                	<a href="{{ route('admin.system.contact.answer.index') }}" class="btn btn-danger">Voltar</a>
	              	</div>
	          	</div>
	        </div>
		</div>
	</section>
@stop