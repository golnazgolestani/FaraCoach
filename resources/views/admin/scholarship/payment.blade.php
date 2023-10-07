@if(is_null($scholarship->financial) )
    <div class="alert alert-warning">
        پرداختی انجام نشده است
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseFinancial" role="button" aria-expanded="false" aria-controls="collapseFinancial">
            ثبت اطلاعات پرداخت
        </a>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto mb-4">
            <div class="collapse" id="collapseFinancial">
                <form method="post" action="/admin/scholarship/{{$scholarship->id}}/register/financial">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="course_id_payment">دوره  ثبت نام</label>
                        <select class="form-control" id="course_id_payment" name="course_id">
                            <option disabled selected>انتخاب کنید</option>
                            @foreach($courses as $item)
                                <option value="{{$item->id}}" @if($item->id==old('course_id')) selected @endif >{{$item->course}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fi_payment">مبلغ دوره ثبت نام شده</label>
                        <input type="text" class="form-control" id="fi_payment" name="fi" value="{{old('fi')}}">
                        <small class="text-muted">قیمت به تومان می باشد</small>
                    </div>
                    <div class="form-group">
                        <label for="score_payment">امتیاز بورسیه</label>
                        <input type="number" min="0" max="100" class="form-control" id="score_payment" name="score" value="{{old('score')}}" />
                        <small class="text-muted">بین 0 تا 100 می باشد</small>
                    </div>
                    <div class="form-group">
                        <label for="fi_final_payment">قیمت نهایی</label>
                        <input type="text"  class="form-control" id="fi_final_payment" name="fi_final" readonly value="{{old('fi_final')}}"  />
                        <small class="text-muted">قیمت به تومان می باشد</small>
                    </div>
                    <div class="form-group">
                        <label for="pre_payment">پیش پرداخت</label>
                        <input type="text"  class="form-control" id="pre_payment" name="pre_payment" value="{{old('pre_payment')}}"  />
                        <small class="text-muted">قیمت به تومان می باشد</small>
                    </div>
                    <div class="form-group">
                        <label for="date_payment">تاریخ واریز</label>
                        <input type="text"  class="form-control" id="date_payment" name="date_payment" autocomplete="off" value="{{old('date_payment')}}" />
                    </div>
                    <div class="form-group">
                        <label for="time_payment">ساعت واریز</label>
                        <input type="text"  class="form-control" id="time_payment" name="time_fa" autocomplete="off" value="{{old('time_fa')}}" />
                    </div>
                    <div class="form-group">
                        <label for="course_id_payment">تعداد قسط</label>
                        <select class="form-control"  name="type_payment">
                            <option disabled selected>انتخاب کنید</option>
                            @for($i=1;$i<=12;$i++)
                                <option value="{{$i}}" @if(old('type_payment')==$i) selected  @endif> {{$i}} قسط</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="authority">کد واریزی</label>
                        <input type="text"  class="form-control" id="authority" name="authority"  value="{{old('authority')}}" />
                    </div>
                    <button type="submit" class="btn btn-success" >ثبت </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row border-top">
        <div class="col-4 mx-auto text-center">
            <form method="post" action="/admin/scholarship/{{$scholarship->id}}/type_payment">
                {{csrf_field()}}
                <label for="exampleFormControlSelect1">روش پرداخت</label>
                <select class="form-control mb-1" name="type_payment">
                    <option value="0" @if($scholarship->type_payment==0) selected @endif >پرداخت عادی</option>
                    <option value="1" @if($scholarship->type_payment==1) selected @endif >پرداخت ویژه</option>
                    <option value="2" @if($scholarship->type_payment==2) selected @endif >پرداخت 5 قسط</option>
                    <option value="3" @if($scholarship->type_payment==3) selected @endif >پرداخت یک سوم با 2 قسط</option>
                    <option value="4" @if($scholarship->type_payment==4) selected @endif >پرداخت یک سوم با 3 قسط</option>
                    <option value="5" @if($scholarship->type_payment==5) selected @endif >پرداخت یک سوم با 5 قسط</option>
                </select>
                <input type="submit" class="btn btn-primary" value="ثبت نحوه پرداخت">
            </form>
        </div>
    </div>
@else
    <div class="alert alert-success">
        شماره فاکتور: {{$scholarship->financial}}
    </div>
    <table class="table  table-striped table-hover table-bordered">
        <tr class="text-center">
            <th>دوره</th>
            <th>واریزی (تومان) </th>
            <th>وام</th>
            <th>تاریخ ثبت نام</th>
            <th>ساعت ثبت نام</th>
            <th>پیگیری</th>
        </tr>
        <tr class="text-center">
            <td>{{$scholarship->get_financial->scholarship_course->course}}</td>
            <td>{{$scholarship->get_financial->schoalrshipPayment->pre_payment}}</td>
            <td>%{{$scholarship->get_financial->schoalrshipPayment->loan}}</td>
            <td>{{$scholarship->get_financial->schoalrshipPayment->date_fa}}</td>
            <td>{{$scholarship->get_financial->schoalrshipPayment->time_fa}}</td>
            <td>{{$scholarship->financial}}</td>
        </tr>

    </table>

@endif

