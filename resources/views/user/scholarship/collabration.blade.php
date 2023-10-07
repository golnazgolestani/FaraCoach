<div class="row">
    <div class="col-12 mb-1">
            <div class="row" id="collabration_category">

                @foreach($collabration_category as $item)
                    @php
                    $sw=0;
                    @endphp
                    @foreach($item->collabration_details->where('status','=',1) as $item_collabration_details)
                        @if($item_collabration_details->collabration_accept->sum('calculate')<$item_collabration_details->max_faracoach)
                            @php
                            $sw=1;
                            @endphp
                        @endif
                    @endforeach

                    @if($sw==1)
                        <div class="col-12 col-md-4  mb-1">
                            <button type="button" class="collabration_category btn btn-primary btn-block" data="{{$item->id}}" onclick="collabration_category({{$item->id}})" >{{$item->category}}</button>
                        </div>
                    @endif
                @endforeach
            </div>
    </div>
    <div class="col-12 col-md-8 mx-auto table-responsive" id="collabrationAccept_ajax">
        @include('user.scholarship.table_collabration_details')

    </div>
    <div class="col-12 text-center">
        @if(!is_null(Auth::user()->scholarship->financial))
            <form method="post" action="/panel/scholarship/me/sendAcceptCollabration" onsubmit="return window.confirm('بعد از ارسال درخواست جهت بررسی امکان ویرایش وجود ندارد. آیا از ارسال درخواست اطمینان دارید ؟')">
                {{csrf_field()}}
                <input type="submit" value="ارسال درخواست جهت بررسی" class="btn btn-success" />
            </form>
        @endif
    </div>
</div>

