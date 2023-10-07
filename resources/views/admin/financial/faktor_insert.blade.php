@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-6">
        <form method="post" action="/admin/faktor">
            {{csrf_field()}}
            <input type="hidden" value="{{$user->id}}" name="user_id">
            <div class="form-group">
                <label for="fname">صاحب فاکتور:</label>
                <input id="fname" type="text" class="form-control" value="{{$user->fname.' '.$user->lname}}" disabled  />
            </div>
            <div class="form-group">
                <label for="product_id">عنوان فاکتور:
                    <span class="text-danger text-bold">*</span>
                </label>
                <select class="form-control" id="product_id" name="product_id">
                    <option disabled selected>انتخاب کنید</option>
                    @foreach($courses as $item)
                        <option value="{{$item->id}}" @if(old('product_id')==$item->id) selected @endif>{{$item->course}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date_faktor">موعد پرداخت فاکتور:
                    <span class="text-danger text-bold">*</span>
                </label>
                <input id="date_faktor" type="text" class="form-control"  name="date_faktor" autocomplete="off"  value="{{old('date_faktor')}}" />
            </div>
            <div class="form-group">
                <label for="fi">مبلغ فاکتور:</label>
                <input id="fi" type="text" class="form-control"   name="fi"  />
            </div>
            <div class="form-group">
                <label for="status">وضعیت فاکتور:
                    <span class="text-danger text-bold">*</span>
                </label>
                <select class="form-control" id="status" name="status">
                    <option disabled selected>انتخاب کنید</option>
                    <option value="0" @if(old('status')==0) selected @endif>پرداخت نشده </option>
                    <option value="1" @if(old('status')==1) selected @endif >پرداخت شده</option>
                    <option value="2" @if(old('status')==2) selected @endif >تسویه تهاتر</option>
                </select>
            </div>

            <div class="form-group">
                <label for="authority">کد پیگیری پرداخت:</label>
                <input id="authority" type="text" class="form-control"  value="{{old('authority')}}" name="authority"  />
            </div>

            <div class="form-group">
                <label for="date_pardakht">تاریخ پرداخت:</label>
                <input id="date_pardakht" type="text" class="form-control"  value="{{old('date_pardakht')}}" name="date_pardakht"  />
            </div>

            <div class="form-group">
                <label for="time_pardakht">ساعت پرداخت:</label>
                <input id="time_pardakht" type="text" class="form-control"  value="{{old('time_pardakht')}}" name="time_pardakht"  />
            </div>
            <div class="form-group">
                <label for="description">توضیحات پرداخت:</label>
                <input id="description" type="text" class="form-control"  value="{{old('description')}}" name="description"  />
            </div>
            <button type="submit" class="btn btn-success" >ایجاد فاکتور</button>
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
