<div class='col-6 col-md-4  mb-1'>
    <button type='button' class='collabration_category btn btn-secondary ' data='0' onclick='collabration_category(0)'>بازگشت</button>
</div>
<div class="col-12 col-md-4 mx-auto">
    <p style="line-height: 0">توضیحات: </p>
    <textarea class="form-control" disabled  style="background-color: transparent;min-height: 250px !important;">{{$collabration_details->description}}</textarea>

    <form id="collabration_details_accept" method="post" onsubmit="return collabration_details_accept()" >
        {{csrf_field()}}
        <input type="hidden" value="{{$collabration_details->id}}" name="collabration_detail_id">
        <div class="form-group">
            <label for="details">زمینه همکاری</label>
            <input type="text" class="form-control" value="{{$collabration_details->title}}"  disabled="disabled" id="details"/>
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
            <input type="text" class="form-control" id="collabration_details_expire" name="expire" />
        </div>
        <div class="form-group">
            <label for="calculate">محاسبه</label>
            <input type="text" class="form-control" id="collabration_details_calculate" name="calculate" readonly/>
        </div>
        <div class="form-group">
            <label for="description">توضیحات شما:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        @if(!is_null(Auth::user()->scholarship->financial))
            <button type="submit" class="btn btn-primary"  >ثبت درخواست</button>
        @endif
    </form>
</div>
