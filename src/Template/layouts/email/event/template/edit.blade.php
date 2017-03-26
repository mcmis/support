@extends('layout::app')

@section('htmlheader_title')
    Email Template Edit
@endsection

@section('main-content')
    <div class="content-body">
        <h2 class="page-header">@lang('common.email_template_edit')</h2>

        <div class="row">
            {{-- Left sidebar --}}
            <div class="col-lg-3">
                @include('layout::email.event.template.menu')
            </div>
            {{-- End Left sidebar --}}

            {{-- Team body --}}
            <div class="col-lg-9 bg-white">
                <h3>{!! $item->event->title !!} - @lang('common.email_template')</h3>

                <div class="row">
                    <div class="col-md-12">
                        {{-- Error Print --}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- End Error Print --}}
                    </div>
                </div>

                {{-- Content Body --}}
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::model($item, ['route' => ['email.event.template.update', $item->event_alias ], 'method' => 'put']) }}

                        @include('layout::email.event.template.form')

                        <div class="form-group pull-right">
                            {{--{!! Form::hidden('editid', $item->id) !!}--}}
                            {!! Form::submit(trans('labels.buttons.update'), ['class' => 'btn btn-info']) !!}
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
                {{-- End Content Body --}}

            </div>

        </div>

    </div>
@endsection
