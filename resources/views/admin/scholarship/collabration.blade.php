<a  class="btn btn-primary mb-2"  data-toggle="collapse" href="#collapseCollabrationDetails" role="button" aria-expanded="false" aria-controls="collapseCollabrationDetails"    >
    افزودن همکاری
</a>
<div class="col-12 mb-1">
    <div class="collapse mb-1" id="collapseCollabrationDetails">
        @foreach($collabration_category->where('status','=',1) as $item_category )
            <a  class="btn btn-primary"   data-toggle="collapse" href="#collapseCollabrationDetails{{$item_category->id}}" role="button" aria-expanded="false" aria-controls="#collapseCollabrationDetails{{$item_category->id}}"     >{{$item_category->category}}</a>
            <div class="collapse mb-1" id="collapseCollabrationDetails{{$item_category->id}}">
                @foreach($item_category->collabration_details->where('status','=',1) as $item_category_details )
                    <a  class="btn btn-secondary"  href="/admin/scholarship/{{$scholarship->id}}/detail_collabration/{{$item_category_details->id}}/create" >{{$item_category_details->title}}</a>
                @endforeach
            </div>

        @endforeach
    </div>
</div>
@if($scholarship->collabration==1)

    <div class="col-12">

    </div>

    <table class="table-bordered table table-hover table-striped">
        <tr class="text-center">
            <th>#</th>
            <th>زمینه همکاری</th>
            <th>قیمت پایه</th>
            <th>تعداد/تومان</th>
            <th>جمع</th>
            <th>توضیحات</th>
            <th>وضعیت</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>
    @foreach($scholarship->user->collabration_accept as $item)

        <tr class="text-center">
            <td>{{$loop->iteration}}</td>
            <td>{{$item->collabration_details->title}}</td>
            <td>

                @if(is_numeric($item->value))
                    {{number_format($item->value)}}
                @else
                    {{$item->value}}
                @endif
            </td>
            <td>{{$item->count}}</td>
            <td>

                @if(is_numeric($item->calculate))
                    {{number_format($item->calculate)}}
                @else
                    {{$item->calculate}}
                @endif
            </td>
            <td>
                {{$item->description}}
            </td>
            <td>
                @if($item->status==0)
                    تایید نشده
                @elseif($item->status==1)
                    تایید شده
                @endif
            </td>
            <td>
                <button type="button" class="btn btn-primary collabrationModal" data-toggle="modal" data-target="#collabrationModal" data-whatever="{{$item->id}}">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </td>
            <td>
                <form method="post" action="/admin/collabration_accept/{{$item->id}}" onsubmit="return window.confirm('آیا از حذف زمینه همکاری اطمینان دارید')" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger" >
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach

        <tr class="text-center">
            <td colspan="4">جمع کل</td>
            <td>
                @if(is_numeric($scholarship->user->collabration_accept->sum('calculate')))
                    {{number_format($scholarship->user->collabration_accept->sum('calculate'))}}
                @else
                    {{$scholarship->user->collabration_accept->sum('calculate')}}
                @endif
            </td>
            <td></td>
        </tr>
    </table>




    <div class="modal fade" id="collabrationModal" tabindex="-1" aria-labelledby="collabrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">نمایش زمینه همکاری</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#" id="modal_collabration_form">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" value="" name="id" id="modal_collabration_id">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">ارزش واحد:</label>
                            <input type="text" class="form-control" id="modal_collabration_value"  readonly name="value" />
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">تعداد</label>
                            <input type="text" class="form-control" id="modal_collabration_count"  onchange="details_calculate(this.value)" name="count"  />
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">تاریخ مهلت</label>
                            <input type="text" class="form-control" id="modal_collabration_expire" readonly name="expire" >
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">جمع</label>
                            <input type="text" class="form-control" id="modal_collabration_calculate" readonly name="calculate" >
                        </div>
                        <div class="form-group">
                            <label for="modal_collabration_description">توضیحات</label>
                            <textarea class="form-control" id="modal_collabration_description" name="modal_collabration_description" rows="3" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label for="modal_collabration_status">وضعیت</label>
                            <select class="form-control" id="modal_collabration_status" name="status">
                                <option value="1">تائید شد</option>
                                <option value="0">تائید نشد</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">بروزرسانی</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mx-auto">
        @include('admin.scholarship.table_collabration_details')
    </div>
@else
    <div class="alert alert-warning">
        لیست همکاری تکمیل و ارسال نشده است
    </div>
@endif
