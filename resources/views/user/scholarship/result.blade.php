@if(($scholarship->view_score==1))

    @if(!is_null($scholarship->financial))
        <div class="alert alert-warning">
            ثبت نام شما در بورسیه کوچینگ با موفقیت به اتمام رسیده است
        </div>
    @else
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <div class="alert alert-danger">سقف بورسیه 30% مبلغ دوره می باشد</div>
                <table class="table table-striped table-bordered text-center">
                    <tr>
                        <th class="text-center">عناوین</th>
                        <th class="text-center">امتیاز</th>
                    </tr>
                    <tr>
                        <td class="text-center">رزومه و سوابق</td>
                        <td class="text-center">
                            <button class="btn btn-secondary btn-block" onclick="document.getElementById('profile-tab').click()">
                                @if(is_null($scholarship->score_profile))
                                    0
                                @else
                                    {{$scholarship->score_profile}}
                                @endif
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">آموزش</td>
                        <td class="text-center">
                            <button class="btn btn-secondary btn-block" onclick="document.getElementById('learn-tab').click()">
                                @if($scholarship->confirm_webinar==1)
                                    5
                                @else
                                    0
                                @endif
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            آزمون
                        </td>
                        <td>
                            <button class="btn btn-secondary btn-block" onclick="document.getElementById('exam-tab').click()">
                                @if(count($scholarship->user->get_scholarshipexam)==0 || $scholarship->user->get_scholarshipexam->last()->score<50)
                                    0
                                @elseif(($scholarship->user->get_scholarshipexam->last()->score) >= 50 && ($scholarship->user->get_scholarshipexam->last()->score) <= 70)
                                    5
                                @elseif(($scholarship->user->get_scholarshipexam->last()->score) > 70)
                                    5
                                @endif
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            مصاحبه
                        </td>
                        <td>
                            <button class="btn btn-secondary btn-block" onclick="document.getElementById('interview-tab').click()">
                                @if(is_null($scholarship->user->get_scholarshipInterview))
                                    0
                                @else
                                    {{$scholarship->user->get_scholarshipInterview->score}}
                                @endif
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">امتیاز معرف</td>
                        <td class="text-center">
                            <button class="btn btn-secondary btn-block" onclick="document.getElementById('introduce-tab').click()">
                                {{$count_scholarshipIntroduce}}
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>معرفی نامه </td>
                        <td>
                            <button class="btn btn-secondary btn-block" onclick="document.getElementById('introductionLetter-tab').click()">

                                @if(is_null($scholarship->score_introductionletter))
                                    0
                                @else
                                    {{$scholarship->score_introductionletter}}
                                @endif
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th>جمع امتیاز</th>
                        <th>{{$result_final}}</th>
                    </tr>
                </table>
            </div>
        </div>
    @endif
@else
    <div class="alert alert-warning">امتیازات شما در سیستم ثبت نشده است</div>
@endif


