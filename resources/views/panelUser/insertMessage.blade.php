
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">پیام ها</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/panel/messages/send" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="subjectMessage">موضوع</label>
                        <input type="text" class="form-control" id="subjectMessage" name="subject" lang="fa" />
                    </div>
                    <div class="form-group">

                        <label for="listMessage">گیرنده پیام</label>
                        <select class="form-control p-0" id="listMessage" name="user_id_recieve">
                            <option disabled selected>انتخاب کنید</option>
                            @if(strlen($resourceIntroduce)>0)
                                @if((strlen($resourceIntroduce->fname)>0)||(strlen($resourceIntroduce->lname)>0))
                                    <option value="{{$resourceIntroduce->id}}">معرف شما - {{$resourceIntroduce->fname}} {{$resourceIntroduce->lname}}</option>
                                @else
                                    <option value="{{$resourceIntroduce->id}}">معرف شما - {{$resourceIntroduce->tel}}</option>
                                @endif
                            @endif
                            @if (strlen($listIntroducedUser)>0)
                                @foreach ($listIntroducedUser as $item)
                                    @if((strlen($item->fname)>0)||(strlen($item->lname)>0))
                                        <option value="{{$item->id}}">دوست شما - {{$item->fname}} {{$item->lname}}</option>
                                    @else
                                        <option value="{{$item->id}}">دوست شما - {{$item->tel}}</option>
                                    @endif

                                @endforeach
                            @endif
                            <!--
                            <option value="3">مالی</option>
                            <option value="4">آموزش</option>
                            <option value="2">مدیریت</option>
                            -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="commentMessage">متن</label>
                        <textarea class="form-control" id="commentMessage" rows="3" name="comment" lang="fa" onkeyup="lengthComment(this.id)" max="250"></textarea>
                        <small class="text-dark">تعداد کارکتر:</small>
                        <small class="text-dark" id="lengthComment">0</small>
                        <small class="text-dark" >/ تعداد کارکتر مجاز 250</small>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="attach"/>
                            <label class="custom-file-label" for="inputGroupFile01">ارسال فایل</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">ارسال پیام</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
