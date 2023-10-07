@if(is_null($scholarship->user->get_scholarshipInterview))
<form method="post" action="/admin/scholarship_interview">
@else
<form method="post" action="/admin/scholarship_interview/{{$scholarship->user->get_scholarshipInterview->id}}">
    {{method_field('PATCH')}}
@endif
    {{csrf_field()}}
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <h5 class="card-header bg-light">توضیحات</h5>
                <div class="card-body border-1 border">
                    <input type="hidden" name="user_id" value="{{$scholarship->user_id}}">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">سطح درخواستی: <span class="text-danger">*</span></div>
                        </div>
                        <select class="form-control" name="level"  >
                            <option disabled selected>انتخاب کنید</option>
                            <option value="1" @if($scholarship->user->get_scholarshipInterview['level']==1) selected @endif >سطح 1</option>
                            <option value="2" @if($scholarship->user->get_scholarshipInterview['level']==2) selected @endif>سطح 2</option>
                            <option value="3" @if($scholarship->user->get_scholarshipInterview['level']==3) selected @endif>سطح 1 و 2</option>
                        </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">نوع برگزاری دوره: <span class="text-danger">*</span></div>
                        </div>
                        <select class="form-control" name="type_holding"  >
                            <option disabled selected>انتخاب کنید</option>
                            <option value="1" @if($scholarship->user->get_scholarshipInterview['type_holding']==1) selected @endif>حضوری</option>
                            <option value="2" @if($scholarship->user->get_scholarshipInterview['type_holding']==2) selected @endif>آنلاین</option>
                            <option value="3" @if($scholarship->user->get_scholarshipInterview['type_holding']==3) selected @endif>فرقی نمی کند</option>
                        </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">استان:</div>
                        </div>
                        <select class="form-control" id="state" disabled>
                            <option disabled selected>انتخاب کنید</option>
                            @foreach($states as $item)
                                <option value="{{$item->id}}"   {{ old('state',$scholarship->user->state)==$item->id ? 'selected='.'"'.'selected'.'"' : '' }} >{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cooperation">زمینه همکاری: <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="cooperation" name="cooperation" rows="3"  >@if(!is_null($scholarship->user->get_scholarshipInterview)){{$scholarship->user->get_scholarshipInterview->cooperation}}@endif</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card ">
                <h5 class="card-header bg-light">امتیاز</h5>
                <div class="card-body border border-1">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">انگیزه: <span class="text-danger">*</span></div>
                        </div>
                        <select class="form-control" name="motivation" id="scholarship_motivation"  >
                            <option disabled selected>انتخاب کنید</option>
                            @for($i=0;$i<=5;$i++)
                                <option value="{{$i}}" @if($scholarship->user->get_scholarshipInterview['motivation']==$i) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">توانمندی: <span class="text-danger">*</span></div>
                        </div>
                        <select class="form-control" name="ability" id="scholarship_ability"  >
                            <option disabled selected>انتخاب کنید</option>
                            @for($i=0;$i<=5;$i++)
                                <option value="{{$i}}" @if($scholarship->user->get_scholarshipInterview['ability']==$i) selected @endif >{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">تعهد: <span class="text-danger">*</span></div>
                        </div>
                        <select class="form-control" name="obligation" id="scholarship_obligation"  >
                            <option disabled selected>انتخاب کنید</option>
                            @for($i=0;$i<=5;$i++)
                                <option value="{{$i}}" @if($scholarship->user->get_scholarshipInterview['obligation']==$i) selected @endif >{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">اثرگذاری: <span class="text-danger">*</span></div>
                        </div>
                        <select class="form-control" name="impact" id="scholarship_impact"  >
                            <option disabled selected>انتخاب کنید</option>
                            @for($i=0;$i<=5;$i++)
                                <option value="{{$i}}" @if($scholarship->user->get_scholarshipInterview['impact']==$i) selected @endif >{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">اعتبار: <span class="text-danger">*</span></div>
                        </div>
                        <select class="form-control" name="validity" id="scholarship_validity" >
                            <option disabled selected>انتخاب کنید</option>
                            @for($i=0;$i<=5;$i++)
                                <option value="{{$i}}" @if($scholarship->user->get_scholarshipInterview['validity']==$i) selected @endif >{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">امتیاز مصاحبه: <span class="text-danger">*</span></div>
                        </div>
                        <input type="text" readonly class="form-control" name="score" id="scholarship_score" value="@if(!is_null($scholarship->user->get_scholarshipInterview)) {{$scholarship->user->get_scholarshipInterview->score}} @endif">
                    </div>
                    <div class="form-group">
                        <label for="description"> توضیحات: <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="3" >@if(!is_null($scholarship->user->get_scholarshipInterview)) {{$scholarship->user->get_scholarshipInterview->description}} @endif</textarea>
                    </div>
                </div>
            </div>
        </div>
        @if(is_null($scholarship->user->get_scholarshipInterview))
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-success" value="ثبت مصاحبه">
            </div>
        @else
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-success" value="تغییر مصاحبه">
            </div>
        @endif
    </div>
</form>
