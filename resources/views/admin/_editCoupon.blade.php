@extends('admin.master.index')
@section('content')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">بروزرسانی کوپن</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/coupon/{{$coupon->id}}" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="coupon">کوپن  *</label>
                    <input type="text" class="form-control @error('coupon') is-invalid @enderror" id="coupon" name="coupon" value="{{$coupon->coupon}}" />
                </div>
                <div class="form-group">
                    <label for="discount">میزان تخفیف (درصد) *</label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{$coupon->discount}}" />
                    <small class="text-muted"> مقدار ورودی بین 0 تا 100 به عنوان مثال 20 معادل 20درصد تخفیف میباشد</small>
                </div>

                <div id="app" class="form-group">
                    <label for="expire_date">تاریخ انقضا *</label>
                    <date-picker
                        type="date"
                        v-model="dates"
                        format="jYYYY-jMM-jDD"
                        display-format="jYYYY/jMM/jDD"
                        :disable="[]"
                        name="expire_date"
                        min="{{$dateNow}}"
                    ></date-picker>
                </div>
                <div class="form-group">
                    <label for="product">نوع محصول *</label>
                    <select id="product" class="form-control p-0 @error('product') is-invalid @enderror" name="product">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="1" @if($coupon->product==1) selected @endif>معارفه</option>
                        <option value="2" @if($coupon->product==2) selected @endif>جلسه</option>
                        <option value="0" @if($coupon->product==0) selected @endif>هردو</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="limit_user"> تعداد استفاده برای هر نفر *</label>
                    <input type="number" class="form-control @error('limit_user') is-invalid @enderror" id="limit_user" name="limit_user" min="0" value="{{$coupon->limit_user}}"/>
                    <small class="text-muted">تعداد استفاده هر نفر این کوپن</small>
                </div>
                <div class="form-group">
                    <label for="count">تعداد استفاده</label>
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
