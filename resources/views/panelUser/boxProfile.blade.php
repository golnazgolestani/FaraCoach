
    <div class="card card-user">
        <div class="image"></div>
        <div class="card-body">
            <div class="author">
                <a href="{{asset('/panel/profile')}}">
                    @if(is_null($user->personal_image))
                        <img class="avatar border-gray" src={{asset("/images/default-avatar.jpg")}} alt="..." />
                    @else
                        <img class="avatar border-gray" src={{asset("/documents/users/".$user->personal_image)}} alt="..." />
                    @endif
                    <h5 class="title">{{$user->fname}} {{$user->lname}}</h5>
                </a>
                <p class="d-inline"> تعداد افراد دعوت شده:</p><b> {{$countIntroducedUser}} نفر</b>
                @if ($resourceIntroduce!=null)
                    <p> دعوت شده توسط <a class="btn-modal-introduced" href="{{$resourceIntroduce->id}}" data-toggle="modal" data-target="#modal_introduced_profile" > {{$resourceIntroduce->fname}} {{$resourceIntroduce->lname}}</a></p>
                @endif
            </div>
            <p class="description text-center">
                Everyone needs a coach
            </p>
        </div>

    </div>

    <!-- ************* Modal User introduced -->
    <!-- Modal -->
    <div class="modal fade" id="modal_introduced_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">مشخصات دوستان</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <div class="spinner-border text-primary text-center" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

