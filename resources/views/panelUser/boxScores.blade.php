
<div class="card">
    <div class="card-header bg-info border-info">
        <h4 class="card-title m-0">امتیازات</h4>
    </div>
    <div class="card-body">
        <label>درصد تکمیل اطلاعات شما</label>
        <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped  progress-bar-animated  bg-success" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
        </div>
        <ul class="list-unstyled team-members p-0">
            <li class="mb-1" >
                <div class="row border pt-2">
                    <div class="col-md-6 col-2">
                        <p title="5 امتیاز">ثبت شماره همراه</p>
                    </div>
                    <div class="col-md-6 col-3 text-right">
                        <p>{{$scoreTelverify}} امتیاز</p>
                    </div>
                </div>
            </li>
            <li class="mb-1">
                <div class="row border pt-2 text-dark">
                    <div class="col-md-6 col-2">
                        <p title="هر دعوت 5 امتیاز"> افراد دعوت شده {{$countIntroducedUser}} نفر</p>
                    </div>
                    <div class="col-md-6 col-3 text-right">
                        <p>{{$scoreIntroducedUser}} امتیاز</p>
                    </div>
                </div>
            </li>
            <li class="mb-1">
                <div class="row border pt-2">
                    <div class="col-md-6 col-2">
                        <p title="هر دانشجو 10 امتیاز">دانشجوی معرفی شده {{$SuccessIntroduced}} نفر</p>
                    </div>
                    <div class="col-md-6 col-3 text-right">
                        <p>{{$scoreSuccess}} امتیاز</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

