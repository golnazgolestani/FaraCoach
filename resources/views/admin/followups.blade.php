@if($user->followups->count()>0)
<div class="card card-user">
    <div class="card-header border-bottom bg-info">
        <h5 class="card-title">پیگیری ها</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            @php
                $i=$user->followups->count();
            @endphp

            @foreach($user->followups as $item)

                <div class="row" style="border-radius: 20px 20px 0px 0px;border:5px solid @if(!is_null($item->problemfollowup)){{ $item->problemfollowup->color}} @endif ;border-bottom:0px;">
                    <div class="col-12">
                        <div class="row px-1">
                            <div class="col-md-12 p-0 pt-1 text-center">
                                <h6>پیگیری {{$i--}}</h6>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>دوره پیگیری شده</label>
                                    <input type="text" class="form-control"  value="@if(!is_null($item->course)){{$item->course->course}} @endif" name="course_id" disabled="disabled"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>وضعیت</label>
                                    <input type="text" class="form-control"  value="@if(!is_null($item->userType['type'])){{$item->userType['type']}} @endif" name="state" disabled="disabled"  />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>کیفیت پیگیری</label>
                                    <input type="text" class="form-control"  value="@if(!is_null($item->problemFollowup)){{$item->problemFollowup->problem}} @endif" name="state" disabled="disabled"  style="background-color: @if($item->problemFollowup){{$item->problemFollowup->color}}  @endif"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>مکالمه(دقیقه)</label>
                                    <input type="number" class="form-control"  value="{{$item->talktime}}" name="state" disabled="disabled"  />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>تگ ها</label>
                                    <ul class="list-group list-group-horizontal">
                                        @if(!is_null($item->tags))
                                            @foreach($item->tags as $tag)
                                                <li class="list-group-item p-1">
                                                    <small class="text-dark">{{$tag}}</small>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>توضیحات</label>
                                <textarea class="form-control textarea" disabled="disabled">{{$item->comment}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row" style="border-radius: 0px 0px 20px 20px;border:5px solid @if($item->problemFollowup){{$item->problemFollowup->color}} @endif;border-top:0px;">


                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>تاریخ پیگیری</label>
                            <input type="text" class="form-control"  value="{{$item->date_fa." ".$item->time_fa}}" name="state" disabled="disabled" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>ثبت شده توسط</label>
                            <input type="text" class="form-control" value="@if(! is_null($item->insertUser)) {{$item->insertUser->fname." ".$item->insertUser->lname}} @endif" name="city" disabled="disabled" />
                        </div>

                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>تاریخ پیگیری بعد</label>
                            <input type="text" class="form-control" value="{{$item->nextfollowup_date_fa}}" name="nextfollowup" disabled="disabled" />
                        </div>
                    </div>
                </div>
                <hr/>
            @endforeach
        </form>
    </div>
</div>
@endif

