<div class="row">
    <div class="col-6 mx-auto text-center">
        @if(!is_null($scholarship->user->get_followbyExpert))
            <div class="alert alert-success shadow-sm shadow">

                @if($scholarship->user->get_followbyExpert->type!=3)
                    <img src="{{asset('/documents/users/'.$scholarship->user->followups[$scholarship->user->followups->count()-1]->personal_image)}}"  class="rounded img-fluid" />
                    <p> پشتیبان ویژه برای پیگیری و ثبت نام: {{$scholarship->user->followups[$scholarship->user->followups->count()-1]->insertUser->fname.' '.$scholarship->user->followups[$scholarship->user->followups->count()-1]->insertUser->lname}}</p>
                    <a href="tel:{{$scholarship->user->followups[$scholarship->user->followups->count()-1]->insertUser->tel}}">ارتباط با پشتیبان</a>
                @else
                    <img src="{{asset('/documents/users/'.$scholarship->user->get_followbyExpert->personal_image)}}"  class="rounded img-fluid" />
                    <p> پشتیبان ویژه برای پیگیری و ثبت نام: {{$scholarship->user->get_followbyExpert->fname.' '.$scholarship->user->get_followbyExpert->lname}}</p>
                    <a href="tel:{{$scholarship->user->get_followbyExpert->tel}}">ارتباط با پشتیبان</a>
                @endif

            </div>
        @endif
    </div>
</div>
