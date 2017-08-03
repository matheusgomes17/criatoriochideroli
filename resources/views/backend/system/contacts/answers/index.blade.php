@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.system.contacts.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.system.contacts.management') }}
        <small>{{ trans('labels.backend.system.contacts.answered') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-bcontact">
            <h3 class="box-title">{{ trans('labels.backend.system.contacts.answered') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.system.includes.partials.contact-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    @if ($contacts->count() > 0)
                        <thead>
                            <tr>
                                <th>{{ trans('labels.backend.system.contacts.table.id') }}</th>
                                <th>{{ trans('labels.backend.system.contacts.table.name') }}</th>
                                <th>{{ trans('labels.backend.system.contacts.table.email') }}</th>
                                <th>{{ trans('labels.backend.system.contacts.table.subject') }}</th>
                                <th>{{ trans('labels.backend.system.contacts.table.create') }}</th>
                                <th>{{ trans('labels.backend.system.contacts.table.last_updated') }}</th>
                                <th>{{ trans('labels.general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>{{ $contact->updated_at }}</td>
                                    <td>{!! $contact->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tbody><tr><td>Nenhum contato foi respondido.</td></tr></tbody>
                    @endif
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-bcontact">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('ContactAnswer') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection