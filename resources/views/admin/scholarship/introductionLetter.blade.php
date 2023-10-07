@if(is_null($scholarship->introductionletter))
    <div class="alert alert-warning">
        کاربر معرفی نامه ارسال نکرده است
    </div>
@else
    <div class="alert alert-success">
        کاربر معرفی نامه ارسال کرده است
        <a href="{{'/documents/scholarship/'.$scholarship->introductionletter}}" class="btn btn-primary">دانلود</a>
    </div>
@endif

<form method="post" action="/admin/scholarship/{{$scholarship->id}}/score_store">
    {{csrf_field()}}
    <div class="row">
        <div class="mx-auto col-12 col-md-4 text-center">
            <small class="text-muted">امتیاز بین 0 تا 5</small>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1"> درج امتیاز معرفی نامه</button>
                </div>
                <input type="number" class="form-control" name="score_introductionletter" min="0" max="30" value="{{$scholarship->score_introductionletter}}"  />
            </div>
        </div>
    </div>

</form>

<hr/>
<form method="post" action="/admin/scholarship/{{$scholarship->id}}/changestatusIntroductionLetter">
    {{csrf_field()}}
    <div class="form-group col-6">
        <label for="confirm_introductionletter">وضعیت</label>
        <select class="form-control" id="confirm_introductionletter" name="confirm_introductionletter">
            <option selected disabled>انتخاب کنید</option>
            <option value="1" @if($scholarship->confirm_introductionletter==1) selected @endif>قبول معرفی نامه</option>
            <option value="2" @if($scholarship->confirm_introductionletter==2) selected @endif>رد معرفی نامه</option>
            <option value="3" @if($scholarship->confirm_introductionletter==3) selected @endif>در حال بررسی</option>
            <option value="4" @if($scholarship->confirm_introductionletter==4) selected @endif>اصلاح معرفی نامه</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">توضیحات:</label>
        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
    </div>
    <input type="submit" value="ارسال" class="btn btn-success" />
</form>
@foreach($messages->where('type','=','scholarship_introductionletter') as $item)
    <div class="form-group">
        <label for="exampleFormControlTextarea1">{{$item->date_fa.' '.$item->time_fa}}</label>
        <textarea class="form-control"  rows="3" disabled>{{$item->comment}}</textarea>
    </div>
@endforeach
