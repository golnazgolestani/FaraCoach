@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card-header">
            <h5 class="card-title">تنظیمات قیمت جلسات</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/settingreserve/update" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="count_meeting">قیمت هر ساعت جلسه کوچ</label>
                    <input type="text" class="form-control" id="count_meeting" name="count_meeting" value="{{$setting[0]->option_value}}"/>
                </div>
                <div class="form-group">
                    <label for="change_customer">قیمت هر یک تبدیل مشتری</label>
                    <input type="text" class="form-control" id="change_customer" name="change_customer" value="{{$setting[2]->option_value}}"/>
                </div>
                <div class="form-group">
                    <label for="customer_satisfaction">قیمت هر رضایت مشتری</label>
                    <input type="text" class="form-control" id="customer_satisfaction" name="customer_satisfaction" value="{{$setting[1]->option_value}}"/>
                </div>
                <div class="form-group">
                    <label for="count_recommendation">قیمت هر توصیه نامه</label>
                    <input type="text" class="form-control" id="count_recommendation" name="count_recommendation" value="{{$setting[3]->option_value}}"/>
                </div>

                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">

    </div>
@endsection
