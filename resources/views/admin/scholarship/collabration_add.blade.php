@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="col-md-5">

    <form method="post" action="/admin/scholarship/{{$scholarship->user_id}}/detail_collabration/{{$collabration_details->id}}/store" >
        {{csrf_field()}}
        <input type="hidden" value="{{$collabration_details->id}}" name="collabration_detail_id">
        <input type="hidden" value="{{$scholarship->user_id}}" name="user_id">

        <div class="form-group">
            <label for="category">گروه همکاری</label>
            <input type="text" class="form-control" value="{{$collabration_details->collabration_category->category}}"  disabled="disabled" id="category"/>
        </div>
        <div class="form-group">
            <label for="unit">واحد</label>
            <input type="text" class="form-control" value="{{$collabration_details->unit}}"  disabled="disabled" id="unit"/>
        </div>
        <div class="form-group">
            <label for="value">ارزش واحد:</label>
            @if(is_numeric($collabration_details->value))
                <input type="text" class="form-control" value="{{number_format($collabration_details->value)}}"  readonly="readonly" id="value" name="value" />
            @else
                <input type="text" class="form-control" value="{{($collabration_details->value)}}"  readonly="readonly" id="value" name="value" />
            @endif
            <small class="text-muted">مبالغ به تومان می باشد</small>
        </div>
        <div class="form-group">
            <label for="max">حداکثر سرمایه گذاری</label>
            @if(is_numeric($collabration_details->max))
                <input type="text" class="form-control" value="{{number_format($collabration_details->max)}}"  disabled="disabled" id="max"/>
            @else
                <input type="text" class="form-control" value="{{($collabration_details->max)}}"  disabled="disabled" id="max"/>
            @endif
            <small class="text-muted">مبالغ به تومان می باشد</small>
        </div>
        <div class="form-group">
            <label for="collabration_details_count">تعداد/مبلغ:(چنانچه پروژه توافقی بود مبلغ را وارد کنید)
                <span class="text-danger">*</span>
            </label>
            <input type="number" class="form-control" id="collabration_details_count" name="count" onchange="details_calculate(this.value)"  />
        </div>
        <div class="form-group">
            <label for="collabration_details_expire">
                مهلت انجام:
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="collabration_details_expire" name="expire" autocomplete="off" />
        </div>
        <div class="form-group">
            <label for="calculate">محاسبه</label>
            <input type="text" class="form-control" id="collabration_details_calculate" name="calculate" readonly/>
        </div>
        <div class="form-group">
            <label for="description">توضیحات شما:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary"  >ثبت درخواست</button>

    </form>
</div>
@endsection

@section('footerScript')
    <script>
        function details_calculate(vals)
        {
            var check=parseInt($("#value").val().replace(/\,/g,''));

            vals=parseInt(vals);
            if($("#value").val().indexOf('%')!=-1)
            {
                $('#collabration_details_calculate').val(new Intl.NumberFormat().format((vals*check)/100));
            }
            else if(isNaN(check))
            {
                $('#collabration_details_calculate').val(new Intl.NumberFormat().format(vals));
            }
            else
            {
                if(isNaN(vals*check))
                {
                    $('#collabration_details_calculate').val(new Intl.NumberFormat().format(vals));
                }
                else
                {
                    $('#collabration_details_calculate').val(new Intl.NumberFormat().format(vals*check));
                }

            }

        }
    </script>

    <!--  DATE SHAMSI PICKER  --->
    <script src="{{asset('js/kamadatepicker.min.js')}}"></script>
    <script src="{{asset('js/kamadatepicker.holidays.js')}}"></script>
    <script>
        var customOptions={
            gotoToday: true,
            markHolidays:true,
            markToday:true,
            twodigit:true,
            closeAfterSelect:true,
            highlightSelectedDay:true,
            nextButtonIcon: "fa fa-arrow-circle-right",
            previousButtonIcon: "fa fa-arrow-circle-left",
            sync:true,
        }
        kamaDatepicker('collabration_details_expire',customOptions);
    </script>
@endsection

