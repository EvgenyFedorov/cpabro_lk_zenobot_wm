@extends('Webmaster.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div style="margin: 0 0 20px 0;">
                        <span>
                            <a href="{{url('/')}}">Главная</a>
                        </span>&nbsp;-&nbsp;
                            <span>
                            Задания
                        </span>
                    </div>
                </div>
            </div>
            <div class="card">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="nav-home-tab" href="{{ url('/users') }}" role="tab" aria-controls="nav-home" aria-selected="true">Профиль</a>
                        <a class="nav-item nav-link active" id="nav-contact-tab" href="{{ url('/logs') }}" role="tab" aria-controls="nav-contact" aria-selected="false">Задания</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">Список приложений</div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="{{url('/logs/create')}}" style="color: #ffffff;" type="submit" class="btn btn-primary">
                                        {{ __('Добавить задание') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0; margin: 0;">
                            <table class="table table-hover table-bordered" style="margin: -1px 0 0 0;">
                                <tr>
                                    <th>ID</th>
{{--                                    <th>Имя приложения</th>--}}
                                    <th>Имя прилы Для Бота</th>
                                    <th>Код</th>
                                    <th>Статус</th>
                                    <th>Создан</th>
{{--                                    <th>Изменен</th>--}}
{{--                                    <th>Вкл/Выкл</th>--}}
                                </tr>
                                @if(isset($data_jobs) AND count($data_jobs) > 0)

                                    @foreach($data_jobs as $data_job)

                                        <?php
                                            $class = ($data_job->jobs_enable == 1) ? "default" : "table-danger";
                                        ?>

                                        <tr id="tr_job_{{$data_job->jobs_id}}" class="{{$class}}">
                                            <td>
                                                <a href="{{url('/logs/edit/' . $data_job->jobs_id)}}">{{$data_job->jobs_id}}</a>
                                            </td>
{{--                                            <td>--}}
{{--                                                <a target="_blank" href="{{url('/programs/edit/' . $data_job->programs_id)}}">{{$data_job->programs_name}}</a>--}}
{{--                                            </td>--}}
                                            <td>{{$data_job->bot_name}}</td>
                                            <td>{{$data_job->code_id}}</td>
                                            <td>
                                                @if($data_job->status == 0)
                                                    Ожидает
                                                @else
                                                    Отгружен
                                                @endif
                                            </td>
                                            <td>{{$data_job->jobs_created_at}}</td>
{{--                                            <td>{{$data_job->jobs_updated_at}}</td>--}}
{{--                                            <td>--}}
{{--                                                <label class="switch">--}}
{{--                                                    @if($data_job->enable == 1)--}}
{{--                                                        <input class="jobs_enable" id="{{$data_job->jobs_id}}" type="checkbox" checked>--}}
{{--                                                    @else--}}
{{--                                                        <input class="jobs_enable" id="{{$data_job->jobs_id}}" type="checkbox">--}}
{{--                                                    @endif--}}
{{--                                                    <span class="slider round"></span>--}}
{{--                                                </label>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" style="text-align: center;">Заданий не найдено!</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        <div style="display: inline-block;">
                                            <?=$data_jobs->render(); ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
