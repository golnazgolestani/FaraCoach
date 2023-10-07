@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-6">
        <form method="post" action="/admin/faktor/{{$faktor->id}}">
            {{method_field('PATCH')}}
            {{csrf_field()}}
            <div class="form-group">
                <label for="id">شماره فاکتور:</label>
                <input id="id" type="text" class="form-control"  value="{{$faktor->id}}" disabled  />
            </div>
            <div class="form-group">
                <label for="fname">صاحب فاکتور:</label>
                <input id="fname" type="text" class="form-control"  value="{{$faktor->user->fname.' '.$faktor->user->lname}}" disabled  />
            </div>
            <div class="form-group">
                <label for="product_id">عنوان فاکتور:</label>
                <select class="form-control" id="product_id" name="product_id">
                    <option disabled selected>انتخاب کنید</option>
                    @foreach($courses as $item)
                        <option value="{{$item->id}}" @if(old('product_id',$faktor->product_id)==$item->id) selected @endif>{{$item->course}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date_createfaktor">تاریخ ایجاد فاکتور:</label>
                <input id="date_createfaktor" type="text" class="form-control"  value="{{$faktor->date_createfaktor}}" disabled  />
            </div>
            <div class="form-group">
                <label for="date_faktor">موعد پرداخت فاکتور:</label>
                <input id="date_faktor" type="text" class="form-control"  value="{{$faktor->date_faktor}}" name="date_faktor"  />
            </div>
            <div class="form-group">
                <label for="fi">مبلغ فاکتور:</label>
                <input id="fi" type="text" class="form-control"  value="{{$faktor->fi}}" name="fi"  />
            </div>
            <div class="form-group">
                <label for="status">وضعیت فاکتور:
                    <span class="text-danger text-bold">*</span>
                </label>
                <select class="form-control" id="status" name="status">
                    <option disabled selected>انتخاب کنید</option>
                    <option value="0" @if(old('status',$faktor->status)==0) selected @endif>پرداخت نشده </option>
                    <option value="1" @if(old('status',$faktor->status)==1) selected @endif >پرداخت شده</option>
                </select>
            </div>
            <div class="form-group">
                <label for="authority">کد پیگیری پرداخت:</label>
                <input id="authority" type="text" class="form-control"  value="{{old('authority',$faktor->authority)}}" name="authority"  />
            </div>

            <div class="form-group">
                <label for="date_pardakht">تاریخ پرداخت:</label>
                <input id="date_pardakht" type="text" class="form-control"  value="{{old('date_pardakht',$faktor->date_pardakht)}}" name="date_pardakht"  />
            </div>

            <div class="form-group">
                <label for="time_pardakht">ساعت پرداخت:</label>
                <input id="time_pardakht" type="text" class="form-control"  value="{{old('time_pardakht',$faktor->time_pardakht)}}" name="time_pardakht"  />
            </div>
            <div class="form-group">
                <label for="description">توضیحات پرداخت:</label>
                <input id="description" type="text" class="form-control"  value="{{old('description',$faktor->description)}}" name="description"  />
            </div>
            <button type="submit" class="btn btn-success" >بروزرسانی</button>
        </form>
    </div>

@endsection

@section('footerScript')
    <script src="{{asset('js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('js/kamadatepicker.holidays.js')}}"></script>
    <script>
        kamaDatepicker('date_faktor',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });
        kamaDatepicker('date_pardakht',
            {
                markHolidays:true,
                markToday:true,
                twodigit:true,
                closeAfterSelect:true,
                nextButtonIcon: "fa fa-arrow-circle-right",
                previousButtonIcon: "fa fa-arrow-circle-left"
            });

    </script>
    <script src="{{asset('js/timepicker.js')}}"></script>
    <script>
        $(document).ready(function()
        {
            jQuery.noConflict();
            jQuery('#time_pardakht').timepicker();
        });
    </script>
@endsection
