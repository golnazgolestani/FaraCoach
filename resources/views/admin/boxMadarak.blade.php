<!--  *********** Madarek ********************-->
<div class="card">
    <div class="card-header  bg-light">
        <a class="row border-bottom" type="button" data-toggle="collapse" data-target="#madarekAdmin" aria-expanded="false" aria-controls="madarekAdmin">
            <div class="col-8">
                <h6 class="card-title m-0">مدارک</h6>
            </div>
            <div class="col-4 text-right">
                <svg  class="text-dark" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                    <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                    <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </div>
        </a>
    </div>
    <div class="card-body collapse bg-secondary-light" id="madarekAdmin">
        <ul class="list-unstyled team-members">
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-group"></i></btn>
                    </div>
                    <div class="col-md-7 col-7">عکس
                        <br />
                        @if(is_null($user->personal_image))
                            <span class="text-danger"><small>موجود نیست</small></span>
                        @else
                            <span class="text-success"><small>موجود است</small></span>
                        @endif
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        @if(is_null($user->personal_image))
                            <a class="btn btn-sm btn-danger" role="button">
                                <i class="bi bi-exclamation-square-fill"></i>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->personal_image)}}" target="_blank" role="button" title="دانلود">
                                <i class="bi bi-check-lg"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-group"></i></btn>
                    </div>
                    <div class="col-md-7 col-7">شناسنامه
                        <br />
                        @if(is_null($user->shenasnameh_image))
                            <span class="text-danger"><small>موجود نیست</small></span>
                        @else
                            <span class="text-success"><small>موجود است</small></span>
                        @endif
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        @if(is_null($user->shenasnameh_image))
                            <a class="btn btn-sm btn-danger"  role="button">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary text-light" href="{{asset('/documents/users/'.$user->shenasnameh_image)}}" target="_blank" role="button"  title="دانلود">
                                <i class="bi bi-check-lg"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-group"></i></btn>
                    </div>
                    <div class="col-md-7 col-7">کارت ملی
                        <br />
                        @if(is_null($user->cartmelli_image))
                            <span class="text-danger"><small>موجود نیست</small></span>
                        @else
                            <span class="text-success"><small>موجود است</small></span>
                        @endif
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        @if(is_null($user->cartmelli_image))
                            <a class="btn btn-sm btn-danger"  role="button">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->cartmelli_image)}}" target="_blank" role="button"  title="دانلود">
                                <i class="bi bi-check-lg"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-group"></i></btn>
                    </div>
                    <div class="col-md-7 col-7">مدرک تحصیلی
                        <br />
                        @if(is_null($user->education_image))
                            <span class="text-danger"><small>موجود نیست</small></span>
                        @else
                            <span class="text-success"><small>موجود است</small></span>
                        @endif
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        @if(is_null($user->education_image))
                            <a class="btn btn-sm btn-danger"  role="button">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->education_image)}}" target="_blank" role="button"  title="دانلود">
                                <i class="bi bi-check-lg"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-group"></i></btn>
                    </div>
                    <div class="col-md-7 col-7">رزومه
                        <br />
                        @if(is_null($user->resume))
                            <span class="text-danger"><small>موجود نیست</small></span>
                        @else
                            <span class="text-success"><small>موجود است</small></span>
                        @endif
                    </div>
                    <div class="col-md-3 col-3 text-right  text-light">
                        @if(is_null($user->resume))
                            <a class="btn btn-sm btn-danger"  role="button">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->resume)}}" target="_blank" role="button"  title="دانلود">
                                <i class="bi bi-check-lg"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
