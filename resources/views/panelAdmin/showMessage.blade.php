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
                            <p class="d-block float-left">{{$item->comment}}</p>
                        </div>
                    @else
                        <div class="col-12 text-dark border p-3 mb-2">
                            <small>{{$item->fname}} {{$item->lname}}</small>
                            <small>{{$item->time_fa}} {{$item->date_fa}}:</small>
                            <p class="d-inline">{{$item->comment}}</p>
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
            <form method="POST" action="/admin/messages/reply">
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
                <button type="submit" class="btn btn-primary">ارسال پیام</button>
            </form>
        </div>
    </div>
</div>
