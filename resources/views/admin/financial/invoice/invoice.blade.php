@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/timepicker.min.css')}}" rel="stylesheet" />
@endsection


@section('content')
    <div class="col-12 col-md-6 mx-auto">
        <div class="card">
            <div class="card-header bg-secondary text-light">
                ایجاد پیش فاکتور
            </div>
            <div class="card-body border mb-5">
                    <form method="post" action="/admin/invoice/{{$user->id}}/store">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">محصول</div>
                            </div>
                            <select class="form-control" id="course_id" name="course_id" onchange="mohasebe()">
                                <option selected disabled>انتخاب کنید</option>
                                @foreach($courses as $item)
                                    <option value="{{$item->shortlink}}">{{$item->course}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">قیمت دوره</div>
                            </div>
                            <input type="text" id="fi" name="fi" class="form-control" readonly  />
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">تخفیف</div>
                            </div>
                            <input type="number" id="off" name="off" class="form-control"  onchange="mohasebe()" />
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">بورسیه</div>
                            </div>
                            <input type="number" id="score" name="score" class="form-control" min="0" max="100" onchange="mohasebe()"  />
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">باقیمانده</div>
                            </div>
                            <input type="number" id="fi_final" name="fi_final" class="form-control"  readonly />
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">پیش پرداخت</div>
                            </div>
                            <input type="number" id="pre_payment" name="pre_payment" class="form-control" onchange="installment()"  />
                        </div>

                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">تعداد اقساط</div>
                            </div>
                            <select class="form-control" id="count_installment" name="count_installment" onchange="installment()">
                                <option selected disabled>انتخاب کنید</option>
                                @for($i=1;$i<=12;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">قیمت هر قسط</div>
                            </div>
                            <input type="text" id="fi_installment" name="fi_installment" class="form-control" readonly   />
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">تاریخ اولین فاکتور</div>
                            </div>
                            <input type="text" id="date_installment" name="date_installment" class="form-control" autocomplete="off"  />
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">مهلت پرداخت پیش فاکتور</div>
                            </div>
                            <input type="text" id="expire_date" name="expire_date" class="form-control"  autocomplete="off"  />
                        </div>
                        <button class="btn btn-success">ایجاد پیش فاکتور</button>
                    </form>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
<script>
    $('#course_id').change(function()
    {
        let data={
            id:$('#course_id').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            type:'get',
            //data:data,
            url:'/admin/invoice/course/'+$('#course_id').val(),
            success:function(data)
            {
                console.log(data);
                $('#fi').val(data);
            }

        });
    });

    let remaining=0;
    function mohasebe()
    {

        let fi=$('#fi').val() ;
        fi=parseInt(fi.replaceAll(',','')) ;
        let off=parseInt($('#off').val()) ;
        if(isNaN(off))
        {
            off=0;
        }
        let score=$('#score').val() ;
        if(isNaN(score))
        {
            score=0;
        }
        remaining=(fi-(fi*off)/100);
        $('#fi_final').val(remaining);
        remaining=(remaining-(remaining*score)/100)
        $('#fi_final').val(remaining)  ;
    }

    function installment()
    {
        let pre_payment=$('#pre_payment').val();
        let count_installment=parseInt($('#count_installment').val());
        if(isNaN(count_installment))
        {
            count_installment=1;
        }

        let fi_installment=((remaining-pre_payment)/count_installment);
        $('#fi_installment').val(fi_installment );

    }
</script>

<script src="{{asset('js/kamadatepicker.min.js')}}"></script>
<script src="{{asset('js/kamadatepicker.holidays.js')}}"></script>
<script>
    kamaDatepicker('date_installment',
        {
            markHolidays:true,
            markToday:true,
            twodigit:true,
            closeAfterSelect:true,
            nextButtonIcon: "fa fa-arrow-circle-right",
            previousButtonIcon: "fa fa-arrow-circle-left"
        });

    kamaDatepicker('expire_date',
        {
            markHolidays:true,
            markToday:true,
            twodigit:true,
            closeAfterSelect:true,
            nextButtonIcon: "fa fa-arrow-circle-right",
            previousButtonIcon: "fa fa-arrow-circle-left"
        });
</script>
@endsection
