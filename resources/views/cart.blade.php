@extends('master.index')
@section('row1')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1 table-responsive bg-light">
                @if($cart->count()>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>محصول</th>

                            <th class="text-center">
                                قیمت
                                <small class="text-muted d-block">تومان</small>
                            </th>
                            <th class="text-center">
                                تخفیف
                                <small class="text-muted d-block">%/نقد</small>
                            </th>
                            <th class="text-center">
                                قیمت نهایی
                                <small class="text-muted d-block">تومان</small>
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $sum_fi=0;
                            $sum_final_off=0;
                        @endphp

                        @foreach($cart as $item)

                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <div class="media-body">

                                            @if($item->duration_booking==1)
                                                <span>جلسه معارفه</span>
                                            @elseif($item->duration_booking==2)

                                                <span>جلسه کوچینگ</span>
                                            @endif
                                                <span>ساعت{{$item->booking->start_time}} در تاریخ {{$item->booking->start_date}}</span>
                                            <h4 class="media-heading"><a href="#"></a></h4>
                                            <p class="media-heading"> کوچ <a href="/coach/{{$item->booking->coach->user->username}}">{{$item->booking->coach->user->fname." ".$item->booking->coach->user->lname}}</a></p>
                                        </div>
                                    </div></td>


                                <td class="col-sm-1 col-md-1 text-center">
                                    <strong>{{number_format($item->fi) }}</strong>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <strong>{{$item->off}}</strong>
                                    <small>{{$item->type_discount }}</small>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center">

                                    <strong>{{number_format($item->final_off)}} تومان</strong>
                                </td>
                                @php
                                    $sum_fi=$sum_fi+$item->fi;
                                    $sum_final_off=$sum_final_off+$item->final_off;
                                @endphp
                                <td class="col-sm-1 col-md-1">
                                    <form method="post" action="/cart/{{$item->id}}/destroy" onsubmit="return confirm('آیا از حذف زمان مطمئن هستید؟');">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-x-lg"></i> حذف
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="3">  </td>
                            <td><span>جمع قیمت</span></td>
                            <td class="text-right"><h5><strong> {{number_format($sum_fi)}}</strong></h5></td>
                        </tr>
                        <tr>
                            <td colspan="3">  </td>
                            <td><span>قیمت نهایی</span></td>
                            <td class="text-right">
                                <h5>
                                    <strong>{{number_format($sum_final_off)}}</strong>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">کد تخفیف</td>
                            <td colspan="3">
                                <form method="POST" action="/coupon/checkoff" class="d-inline-block">
                                    {{csrf_field()}}
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">اعمال</button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="کد تخفیف" aria-label="Example text with button addon" aria-describedby="button-addon1" name="coupon" />
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input reading" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">من تمام <a href="#"  data-toggle="modal" data-target="#rulesModal">قوانین و مقررات رزرو  جلسات</a> را مطالعه کردم و با آن موافقم</label>
                                </div>
                                <p class="text-center"></p>
                                <!-- Modal -->
                                <div class="modal fade" id="rulesModal" tabindex="-1" aria-labelledby="rulesModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">قوانین و مقررات</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($item->duration_booking==1)
                                                    {!! $options->where('option_name','=','rule_moarefeh_coaching')->first()['option_value'] !!}
                                                @elseif($item->duration_booking==2)
                                                    {!! $options->where('option_name','=','rule_meeting_coaching')->first()['option_value'] !!}
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary reading" data-dismiss="modal">مطالعه کردم</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">  </td>
                            <td class="d-none frm_insertReserve">
                                <!--
                                <form method="POST" action="#">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-success btn-sm ">
                                        پرداخت با کیف پول<span class="glyphicon glyphicon-play"></span>
                                    </button>
                                </form>
                                -->
                            </td>
                            <td class="d-none frm_insertReserve" >
                                <form method="POST" action="/reserve/insert">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-success  ">
                                        پرداخت  <span class="glyphicon glyphicon-play"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning">
                        سبد خرید شما خالی است
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection

@section('footerScript')
    <script>
        $('.reading').change(function(){
           if($(this).is(':checked'))
           {
               $('.frm_insertReserve').attr('class','');
           }
           else
           {
               console.log('asdasd');
               $('.frm_insertReserve').attr('class','d-none');
           }
        });

    </script>
@endsection
