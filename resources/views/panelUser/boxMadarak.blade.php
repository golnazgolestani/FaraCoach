<!--  *********** Madarek ********************-->
<div class="card">
    <div class="card-header">
        <h4 class="card-title">مدارک</h4>
    </div>
    <div class="card-body">
        <ul class="list-unstyled team-members">
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-group"></i></btn>
                    </div>
                    <div class="col-md-7 col-7">عکس
                        <br />
                        @if(is_null($user->getOriginal('personal_image')))
                            <span class="text-danger"><small>موجود نیست</small></span>
                        @else
                            <span class="text-success"><small>موجود است</small></span>
                        @endif
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        @if(is_null($user->getOriginal('personal_image')))
                            <a class="btn btn-sm btn-danger" role="button">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->personal_image)}}" target="_blank" role="button" title="دانلود">
                                <i class="fa fa-download"></i>
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
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->shenasnameh_image)}}" target="_blank" role="button"  title="دانلود">
                                <i class="fa fa-download"></i>
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
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->cartmelli_image)}}" target="_blank" role="button"  title="دانلود">
                                <i class="fa fa-download"></i>
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
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->education_image)}}" target="_blank" role="button"  title="دانلود">
                                <i class="fa fa-download"></i>
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
                    <div class="col-md-3 col-3 text-right">
                        @if(is_null($user->resume))
                            <a class="btn btn-sm btn-danger"  role="button">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </a>
                        @else
                            <a class="btn btn-sm btn-primary" href="{{asset('/documents/users/'.$user->resume)}}" target="_blank" role="button"  title="دانلود">
                                <i class="fa fa-download"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
