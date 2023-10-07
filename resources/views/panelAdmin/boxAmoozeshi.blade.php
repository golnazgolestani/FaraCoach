<!-- *********** Groohaye Amoozeshi -->
<div class="card">
    <div class="card-header  bg-info">
        <a class="row border-bottom" type="button" data-toggle="collapse" data-target="#amoozeshAdmin" aria-expanded="false" aria-controls="amoozeshAdmin">
            <div class="col-8">
                <h6 class="card-title m-0 mb-3">گروه های آموزشی</h6>
            </div>
            <div class="col-4">
                <svg  class="text-light float-left" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel-fill" viewBox="0 0 16 16">
                    <path d="M8.473.337a.5.5 0 0 0-.946 0L6.954 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h1.85l-1.323 3.837a.5.5 0 1 0 .946.326L4.908 11H7.5v2.5a.5.5 0 0 0 1 0V11h2.592l1.435 4.163a.5.5 0 0 0 .946-.326L12.15 11H14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H9.046L8.473.337z"/>
                </svg>
            </div>
        </a>
    </div>
    <div class="card-body collapse" id="amoozeshAdmin">
        <ul class="list-unstyled team-members">
            @foreach($followUps as $item)

                @if($item->status_followups=='مشتری')
                    <li>
                        <div class="row">
                            <div class="col-md-2 col-2">
                                <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-group"></i></btn>
                            </div>
                            <div class="col-md-7 col-7">{{$item->course_id}}
                                <br />

                            </div>
                            <div class="col-md-3 col-3 text-right">
                                <a class="btn btn-sm btn-primary"  target="_blank" role="button" title="دانلود">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
