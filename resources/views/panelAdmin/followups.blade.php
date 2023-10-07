@if(count($followUps)>0)
<div class="card card-user">
    <div class="card-header border-bottom bg-info">
        <h5 class="card-title">پیگیری ها</h5>
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <?php $i=count($followUps); ?>
            @foreach($followUps as $item)
                <div class="row" style="border-radius: 20px 20px 0px 0px;border:5px solid {{$item->color}};border-bottom:0px;">
                    <div class="col-12">
                        <div class="row px-1">
                            <div class="col-md-2 p-0 pt-4 text-center">
                                <h6>پیگیری {{$i--}}</h6>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>دوره پیگیری شده</label>
                                    <input type="text" class="form-control "  value="{{$item->course_id}}" name="course_id" disabled="disabled"  />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>وضعیت</label>
                                    <input type="text" class="form-control "  value="{{$item->status_followups}}" name="state" disabled="disabled"  />
                                </div>
                            </div>
                            <div class="col-md-3 p-0">
                                <div class="form-group">
                                    <label>کیفیت پیگیری</label>
                                    <input type="text" class="form-control"  value="{{$item->problem}}" name="state" disabled="disabled"  style="background-color: {{$item->color}}"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>مکالمه(دقیقه)</label>
                                    <input type="text" class="form-control"  value="{{$item->talktime}}" name="state" disabled="disabled"  />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>تگ ها</label>
                                    <ul class="list-group list-group-horizontal">
                                        @foreach($item->tags as $tag)
                                            <li class="list-group-item p-2">
                                                <small class="text-dark">{{$tag}}</small>
                                            </li>
                                        @endforeach
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


                <div class="row" style="border-radius: 0px 0px 20px 20px;border:5px solid {{$item->color}};border-top:0px;">


                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label>تاریخ پیگیری</label>
                            <input type="text" class="form-control"  value="{{$item->datetime_fa}}" name="state" disabled="disabled" />
                        </div>
                    </div>
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label>تاریخ ویرایش</label>
                            <input type="text" class="form-control" value="{{$item->updated_at}}" name="city" disabled="disabled"  />
                        </div>
                    </div>
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label>ثبت شده توسط</label>
                            <input type="text" class="form-control" value="{{$item->insert_user_id}}" name="city" disabled="disabled" />
                        </div>
                    </div>
                    <div class="col-md-3 px-1">
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

