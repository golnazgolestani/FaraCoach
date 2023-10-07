<div class="col-12">
    <div class="card card-chart">
        <div class="card-header">
            <h5 class="card-title">پیام ها</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="/admin/messages/send">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="subjectMessage">موضوع</label>
                    <input type="text" class="form-control" id="subjectMessage" name="subject" lang="fa" />
                </div>
                <div class="form-group">
                    <label for="listMessage">بخش/فرد</label>
                    <select class="form-control p-0" id="listMessage" name="user_id_recieve">
                        <option disabled selected>انتخاب کنید</option>
                        @if(strlen($resourceIntroduce)>0)
                            @if((is_null($resourceIntroduce->fname))||(is_null($resourceIntroduce->lname)))
                                <option value="{{$resourceIntroduce->id}}">معرف شما - {{$resourceIntroduce->fname}} {{$resourceIntroduce->lname}}</option>
                            @elseif((!is_null($resourceIntroduce->fname))||(!is_null($resourceIntroduce->lname)))
                                <option value="{{$resourceIntroduce->id}}">معرف شما -
                                    @if(!is_null($resourceIntroduce->fname))
                                        {{$resourceIntroduce->fname}}
                                    @endif
                                    @if(!is_null($resourceIntroduce->lname))
                                        {{$resourceIntroduce->lname}}
                                    @endif
                                </option>
                            @else
                                <option value="{{$resourceIntroduce->id}}">معرف شما - {{$resourceIntroduce->tel}}</option>
                            @endif
                        @endif
                        @foreach($followby_expert as $item)
                            <option value="{{$item->id}}">{{$item->type}} - {{$item->fname}} {{$item->lname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="commentMessage">متن</label>
                    <textarea class="form-control" id="commentMessage" rows="3" name="comment" lang="fa"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ارسال پیام</button>

            </form>
        </div>
    </div>
</div>

