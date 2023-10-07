
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">پیام ها</h5>
            </div>
            <div class="card-body">

                @foreach($messages as $item)
                        @if((Auth::user()->id==$item->user_id_send))
                            <div class="col-12 text-success  border p-3 mb-2">
                                <small>شما</small>
                                <small>{{$item->time_fa}} {{$item->date_fa}}:</small>
                                <small class="d-block float-left">{{$item->comment}}</small>
                                @if(strlen($item->attach)>0)
                                    <a href="{{asset('/documents/messages/'.$item->attach)}}" target="_blank">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @else
                            <div class="col-12 text-dark border p-3 mb-2">
                                <small>{{$item->fname}} {{$item->lname}}</small>
                                <small>{{$item->time_fa}} {{$item->date_fa}}:</small>
                                <small class="d-inline">{{$item->comment}}</small>
                                @if(strlen($item->attach)>0)
                                    <a href="{{asset('/documents/messages/'.$item->attach)}}" target="_blank">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">ارسال پاسخ</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/panel/messages/reply" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if(Auth::user()->id==$message->user_id_send)
                        <input type="hidden" name="user_id_recieve" value="{{$message->user_id_recieve}}"/>
                    @else
                        <input type="hidden" name="user_id_recieve" value="{{$message->user_id_send}}"/>
                    @endif
                    <input type="hidden" name="message_id_answer" value="{{$message->id}}"/>
                    <div class="form-group">
                        <label for="commentMessage">متن</label>
                        <textarea class="form-control" id="commentMessage" rows="3" name="comment" lang="fa"></textarea>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="attach"/>
                            <label class="custom-file-label" for="inputGroupFile01">ارسال فایل</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">ارسال پیام</button>
                </form>
            </div>
        </div>
    </div>

