@extends('panelAdmin.master.index')
@section('rowcontent')
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form method="post" action="/admin/sms" id="sendSMS" onsubmit="return confirm('آیا از ارسال پیامک اطمینان دارید?(لطفا قبل از ارسال از گزینه محاسبه از تعداد افراد مطمئن شوید');">
            {{csrf_field()}}
            <div class="form-group pt-3 pb-3 border-bottom">
                <label for="tel_recieves">شماره تلفن ها</label>
                <input type="text" class="form-control" id="tel_recieves" name="tel_recieves" />
                <small class="text-muted">به عنوان مثال: 09121234567,09151234567</small>
            </div>
            <div class="form-group pt-3 pb-3 border-bottom">
                <label for="categories" >دسته بندی</label>
                <select class="form-control  p-0" id="categories" name="categories[]" multiple>
                    <option disabled="disabled  p-0" selected>همه کاربرها</option>
                    @foreach($categories as $item)
                        <option value="{{$item->detailsresource}}">{{$item->resource}} {{$item->detailsresource}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row pt-3 pb-3 border-bottom" id="filters">
                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 " >
                    <label for="fields">فیلد</label>
                    <select class="form-control  p-0" id="fields" name="fields[]">
                        <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                        <option value="fname">نام</option>
                        <option value="lname">نام خانوادگی</option>
                        <option value="state">استان</option>
                        <option value="city">شهر</option>
                        <option value="email">پست الکترونیکی</option>
                        <option value="datebirth">تاریخ تولد</option>
                        <option value="sex">جنسیت</option>
                        <option value="tel">تلفن همراه</option>
                        <option value="born">متولد</option>
                        <option value="education">تحصیلات</option>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <label for="comparison" >مقایسه</label>
                    <select class="form-control  p-0" id="comparison" name="comparison[]">
                        <option disabled="disabled  p-0" >انتخاب کنید</option>
                        <option selected>=</option>
                        <option><></option>
                        <option><</option>
                        <option> > </option>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <label for="values">مقدار</label>
                    <input type="text" class="form-control" id="values" name="values[]" />
                </div>
            </div>
            <div id="add_fileds" class="row"></div>
            <button class="btn btn-primary" type="button" id="btn_fileds">+</button>

            <div class="col-12 pt-3 pb-3 border-bottom">
                <p>فیلترها</p>
                @foreach($parentCategory as $item)
                    <a href="#collapseExample{{$item->id}}" class="d-inline  mr-3" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
                        {{$item->category}}
                    </a>
                    <div class="collapse" id="collapseExample{{$item->id}}">
                        <div class="card card-body">
                            <div class="form row">
                                @foreach($tags as $tag)
                                    @if($tag->category_tags_id==$item->id)
                                        <div class="col-3 text-right">
                                            <label class="form-check-label m-0 pr-0 mr-3 ml-2 float-right" for="tag{{$tag->id}}">{{$tag->tag}}</label>
                                            <input class="form-check-input text-dark mr-2 " type="checkbox" value="{{$tag->id}}" id="tag{{$tag->id}}" name="tags[]" @if(is_array(old('tags')) && in_array($tag->id, old('tags'))) checked @endif  >
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-12 pt-3 pb-3 border-bottom">
                <label for="categories" >کیفیت ها</label>
                <select class="form-control  p-0" id="problem" name="problem[]" multiple>
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    @foreach($problem as $item)
                        <option value="{{$item->id}}">{{$item->problem}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 pt-3 pb-3 border-bottom">
                <label for="categories" >دسته بندی کاربرها</label>
                <select class="form-control  p-0" id="types" name="types[]" multiple>
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    @foreach($types as $key=>$item)
                        <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group pt-3 pb-3 border-bottom" >
                <label for="comment" >متن پیامک</label>
                <button type="button" class="btn btn-primary btn-sm" id="tel_btn" onclick="add_parametersSMS('{tel}')" >تلفن همراه</button>
                <button type="button" class="btn btn-primary btn-sm" id="fname_btn" onclick="add_parametersSMS('{fname}')">نام</button>
                <button type="button" class="btn btn-primary btn-sm" id="lname_btn" onclick="add_parametersSMS('{lname}')">نام خانوادگی</button>
                <button type="button" class="btn btn-primary btn-sm" id="dateBirth_btn" onclick="add_parametersSMS('{datebirth}')">تاریخ تولد</button>
                <button type="button" class="btn btn-primary btn-sm" id="dateBirth_btn" onclick="add_parametersSMS('{sex}')">جنسیت</button>
                <textarea class="form-control" id="commentSMS" rows="3" name="comment"></textarea>
            </div>
            <div class="form-group" id="showCount">0</div>
            <button type="button" class="btn btn-warning" id="btn_showCount">محاسبه</button>
            <button type="submit" class="btn btn-primary">ارسال پیامک</button>
        </form>
    </div>

@endsection
