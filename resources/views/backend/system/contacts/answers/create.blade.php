@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.system.contacts.management') . ' | ' . trans('labels.backend.system.contacts.create'))

@section ('after-styles')
	<!-- CK Editor -->
	<link href="{{ asset('css/backend/plugin/wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
@stop

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
	          		{!! Form::model($contact, ['method' => 'POST', 'route' => ['admin.system.contact.answer.store', $contact->id]]) !!}

		              	<div class="box-body">
		                	<div class="form-group">
		                  		<label>Nome</label>
		                  		<input type="text" class="form-control" value="{{ $contact->name }}" disabled>
		                	</div>
		                	<div class="form-group">
		                  		<label>E-mail</label>
		                  		<input type="text" class="form-control" value="{{ $contact->email }}" disabled>
		                	</div>
		                	<div class="form-group">
		                  		<label>Telefone</label>
		                  		<input type="text" class="form-control" value="{{ $contact->phone }}" disabled>
		                	</div>
		                	<div class="form-group">
		                  		<label>Assunto</label>
		                  		<input type="text" class="form-control" value="{{ $contact->subject }}" disabled>
		                	</div>
		                	<div class="form-group">
		                  		<label>Mensagem</label>
		                  		<input type="text" class="form-control" value="{{ $contact->message }}" disabled>
		                	</div>
		                	<div class="form-group">
		                  		<label>Resposta</label>
				  				{{ Form::hidden('contact_id', $contact->id) }}
			  					{{ Form::textarea('answer', null, ['class' => 'textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; bcontact: 1px solid #dddddd; padding: 10px;']) }}
		                	</div>
		              	</div>

		              	<div class="box-footer">
		                	<a href="{{ route('admin.system.contact.index') }}" class="btn btn-danger">Voltar</a>
		                	<button type="submit" class="btn btn-success">Responder</button>
		              	</div>
	              	{{ Form::close() }}
	          	</div>
	        </div>
		</div>
	</section>
@stop

@section ('after-scripts')
	<!-- CK Editor -->
	<script src="{{ asset('js/backend/plugin/wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script>$(function () {	$(".textarea").wysihtml5();	});</script>
@stop