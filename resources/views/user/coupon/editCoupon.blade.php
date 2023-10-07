@extends('user.master.index')
@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header bg-secondary">
            <h5 class="card-title text-light">بروزرسانی کوپن</h5>
        </div>
        <div class="card-body bg-secondary-light">
            <form method="post" action="/panel/coupon/{{$coupon->id}}" >
                {{csrf_field()}}
                {{method_field('PATCH')}}

                <div class="form-group">
                    <label for="coupon">نام کوپن:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('coupon') is-invalid @enderror" id="coupon" name="coupon" value="{{old('coupon',$coupon->coupon)}}" />
                    <small class="text-muted">نام کوپن تخفیف را به انگلیسی وارد کنید</small>
                </div>

                <div class="input-group">
                    <label for="discount">میزان تخفیف<span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{old('discount',$coupon->discount)}}"/>
                    <select id="type_discount" class="form-control p-0 @error('type_discount') is-invalid @enderror" name="type_discount">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="%" @if(old('type_discount',$coupon->type_discount)=='%') selected  @endif>%</option>
                        <option value="تومان" @if(old('type_discount',$coupon->type_discount)=='تومان') selected  @endif>تومان</option>
                    </select>
                </div>

                <div id="app" class="form-group">
                    <label for="expire_date">تاریخ انقضا: <span class="text-danger">*</span></label>
                    <date-picker
                        type="date"
                        v-model="dates"
                        format="jYYYY-jMM-jDD"
                        display-format="jYYYY/jMM/jDD"
                        :disable="[]"
                        name="expire_date"
                        min="{{$dateNow}}"
                    ></date-picker>
                    <small class="text-muted">تاریخ انقضای کوپن تخفیف را وارد کنید</small>
                </div>
                <div class="form-group">
                    <label for="product">نوع محصول: <span class="text-danger">*</span></label>
                    <select id="product" class="form-control p-0 @error('product') is-invalid @enderror" name="product">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" @if($coupon->product==1) selected @endif>معارفه</option>
                        <option value="2" @if($coupon->product==2) selected @endif>جلسه</option>
                        <option value="0" @if($coupon->product==0) selected @endif>هردو</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="limit_user"> تعداد استفاده برای هر نفر: <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('limit_user') is-invalid @enderror" id="limit_user" name="limit_user" min="0" value="{{$coupon->limit_user}}"/>
                    <small class="text-muted">تعداد استفاده هر نفر این کوپن</small>
                </div>
                <div class="form-group">
                    <label for="count">تعداد کوپن:</label>
                    <input type="number" class="form-control @error('count') is-invalid @enderror" id="count" name="count" min="0" value="{{$coupon->count}}"/>
                    <small class="text-muted">تعداد کوپن تخفیف در صورت وارد نکردن تعداد بینهایت خواهد بود</small>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection

@section('footerScript')

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-jalaali@0.7.4/build/moment-jalaali.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-persian-datetime-picker/dist/vue-persian-datetime-picker-browser.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            components: {
                DatePicker: VuePersianDatetimePicker
            },
            data: {
                time:"{{old('time')}}",
                dates: ['{{$coupon->expire_date}}'],
                message:'asdasdasd'
            }

        });


    </script>
@endsection
