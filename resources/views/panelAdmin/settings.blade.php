@extends('panelAdmin.master.index')
@section('rowcontent')

    <div class="col-xs-12 col-md-6 col-xl-6 col-lg-6">
        <div class="card card-chart">
            <div class="card-header">
                <a type="button" data-toggle="collapse" data-target="#option_IntroducedVerify" aria-expanded="false" aria-controls="option_IntroducedVerify">
                    <h5 class="card-title border-bottom pb-2">متن توافقنامه دعوتنامه</h5>
                </a>
            </div>
            <div class="card-body collapse" id="option_IntroducedVerify">
                <form method="post" action="/admin/options/introduced_verify">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <textarea id="ckeditor" name="introduced_verify">{{$options['introduced_verify']}}</textarea>
                    <button type="submit" class="btn btn-primary" >بروزرسانی</button>
                </form>
            </div>
            <div class="card-footer">
                <hr />
                <div class="card-stats">

                </div>
            </div>
        </div>
    </div>


<div class="col-xs-12 col-md-6 col-xl-6 col-lg-6">
    <div class="card card-chart">
        <div class="card-header">
            <a type="button" data-toggle="collapse" data-target="#settings_followup" aria-expanded="false" aria-controls="settings_followup">
                <h5 class="card-title border-bottom pb-2">نتایج پیگیری</h5>
            </a>
        </div>
        <div class="card-body collapse" id="settings_followup">
            <table class="table">
                <thead class=" text-dark">
                    <th>ردیف </th>
                    <th>نتیجه پیگیری ها</th>
                    <th>رنگ </th>
                    <th>وضعیت </th>
                    <th>ویرایش </th>
                    <th>حذف </th>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    ?>
                    @foreach($problemfollowup as $item)
                            <tr >
                                <td>
                                   {{$i++}}
                                </td>
                                <td>

                                    {{$item->problem}}
                                </td>
                                <td style="background-color:  {{$item->color}}" class="rounded-circle">

                                </td>
                                <td>
                                    {{$item->status}}
                                </td>
                                <td>
                                    <a href="/admin/settings/problemfollowup/edit/{{$item->id}}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td >
                                    <a href="/admin/settings/problemfollowup/delete/{{$item->id}}"  class="del" >
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash2-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.037 3.225l1.684 10.104A2 2 0 0 0 5.694 15h4.612a2 2 0 0 0 1.973-1.671l1.684-10.104C13.627 4.224 11.085 5 8 5c-3.086 0-5.627-.776-5.963-1.775z"/>
                                            <path fill-rule="evenodd" d="M12.9 3c-.18-.14-.497-.307-.974-.466C10.967 2.214 9.58 2 8 2s-2.968.215-3.926.534c-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466zM8 5c3.314 0 6-.895 6-2s-2.686-2-6-2-6 .895-6 2 2.686 2 6 2z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <hr />
            <div class="card-stats">
                <a class="btn btn-primary" href="/admin/settings/problemfollowup/new" role="button">اضافه کردن</a>
            </div>
        </div>
    </div>
</div>

@include('panelAdmin.settingsCategoryTag')
@include('panelAdmin.settingsTags')
@include('panelAdmin.settingCategoryGettingknow')
@include('panelAdmin.settingGettingknow')

@endsection
