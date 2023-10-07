@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info border-info">
                    <h4 class="card-title m-0">عناوین همکاری</h4>
                </div>
                <div class="card-body" >
                    <a href="/admin/collabration_details/create" class="btn btn-primary mb-1">اضافه کردن</a>
                    <form method="post" action="">
                        <div class="accordion" id="accordionExample">
                            @foreach($collabration_category as $item)
                                <div class="card">
                                    <div class="card-header" id="heading{{$item->id}}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                               {{$item->category}}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="heading{{$item->id}}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>عنوان</th>
                                                    <th>ویرایش</th>
                                                    <th>تعداد ثبت</th>
                                                    <th>کل مبلغ</th>
                                                </tr>
                                                @if(count($item->collabration_details)!=0)
                                                    @foreach($item->collabration_details as $item_details)
                                                        <tr class="text-center">
                                                            <td>
                                                                {{$item_details->title}}
                                                            </td>
                                                            <td>
                                                                <a href="/admin/collabration_details/{{$item_details->id}}/edit" class="btn btn-warning">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{$item_details->collabration_accept->count()}} نفر
                                                            </td>
                                                            <td>
                                                                {{number_format($item_details->collabration_accept->sum('calculate'))}} تومان
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
