@extends('mcmis:layouts.app')

@section('htmlheader_title')
    Email templates
@endsection

@section('main-content')
    @if(count($items) > 0)
        <?php  $result = true ?>
    @else
        <?php $result = false ?>
    @endif
    <div class="content-body">
        <h2 class="page-header">@lang('common.email_templates')</h2>

        <div class="row">
            {{-- Left sidebar --}}
            <div class="col-lg-3">
                @include('mcmis:layouts.email.event.template.menu')
            </div>
            {{-- End Left sidebar --}}

            {{-- Category body --}}
            <div class="col-lg-9 bg-white">
                <h3>@lang('common.email_templates')</h3>
                {!!  $result ? '' : '<div class="alert alert-danger"><strong>No result found</strong></div>' !!}
                @if($result)
                    {{-- Categories List --}}
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Event</th>
                            <th>@lang('common.email_subject')</th>
                            {{--<th>Body</th>--}}
                            <th>@lang('labels.updated_at')</th>
                        </tr>
                        </thead>

                        <tbody data-link="row" class="rowlink">
                        @foreach($items as $item)
                            <tr>
                                <td><a href="{{ action('CMS\EmailTemplateController@edit', ['event' => $item->event_alias]) }}">{!! $item->event->title !!}</a></td>
                                <td>{{ str_limit($item->subject, 55, '...') }}</td>
                                {{--<td>{{ str_limit($item->body, 35, '...') }}</td>--}}
                                <td>{!! $item->updated_at !!}</td>
                                <td class="rowlink-skip">
                                    @if(isset($trashed))
                                        {{--{!! Form::open(['action' => ['CMS\EmailTemplateController@eliminate', 'shortcode' => $item->shortcode], 'method' => 'delete', 'class' => 'delete-form']) !!}
                                        <div class="btn-group">--}}
                                            <a href="{{ action('CMS\EmailTemplateController@restore', ['event' => $item->event_alias]) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-refresh"> </i> </a>
                                            {{--{!! Form::submit('Deactivate', ['class' => 'btn btn-danger btn-xs']) !!}
                                        </div>
                                        {!! Form::close() !!}--}}
                                    @else
                                        {!! Form::open(['action' => ['CMS\EmailTemplateController@destroy', 'event' => $item->event_alias], 'method' => 'delete', 'class' => 'delete-form']) !!}
                                        <div class="btn-group">
                                            <a href="{{ action('CMS\EmailTemplateController@edit', ['event' => $item->event_alias]) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"> </i> </a>
                                            {{--{!! Form::submit('Deactivate', ['class' => 'btn btn-danger btn-xs']) !!}--}}
                                        </div>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {{-- End Categories List--}}
                {!! $items->render() !!}
            </div>
            {{-- End Category Body --}}
        </div>
    </div>
@endsection

@section('page_script')
    <script>
        $('.delete-form').on('submit', function(e){
            e.preventDefault();
            $form_obj = this;
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this and also not use this name!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
            }).then(
            function() {
                    $form_obj.submit();
                    swal("Deleting...", "We are processing your request", "info");

            });
        });
    </script>
@endsection
