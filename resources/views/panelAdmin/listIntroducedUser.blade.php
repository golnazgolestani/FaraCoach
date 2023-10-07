<!-- *********** List moarefi shodeha -->
<div class="card">
    <div class="card-header  bg-info">
        <a class="row border-bottom" type="button" data-toggle="collapse" data-target="#scoreAdmin" aria-expanded="false" aria-controls="scoreAdmin">
            <div class="col-8">
                <h6 class="card-title m-0 mb-3">امتیازات</h6>
            </div>
            <div class="col-4">
                <svg  class="float-left text-light" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16">
                    <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
                </svg>
            </div>
        </a>
    </div>
    <div class="card-body collapse" id="scoreAdmin">
        <ul class="list-unstyled team-members">
            <li>
                <div class="row">
                    <div class="col-md-7 col-7">
                        <p class="text-dark">افراد دعوت شده: {{$countIntroducedUser}} نفر</p>
                    </div>
                    <div class="col-md-5 col-5 text-right">
                        <p class="text-dark">{{$scoreIntroducedUser}} امتیاز</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-7 col-7">
                        <p class="text-dark">تایید شماره همراه:</p>
                    </div>
                    <div class="col-md-5 col-5 text-right">
                        <p class="text-dark">{{$scoreTelverify}} امتیاز</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-8 col-8">
                        <p class="text-dark">دانشجوی معرفی شده: {{$SuccessIntroduced}} نفر</p>
                    </div>
                    <div class="col-md-4 col-4 text-right">
                        <p class="text-dark">{{$scoreSuccess}} امتیاز</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
