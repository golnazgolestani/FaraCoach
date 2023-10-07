<!-- ** اضافه کردن تگ ها-->
<div class="col-xs-12 col-md-6 col-xl-6 col-lg-6">
    <div class="card card-chart">
        <div class="card-header">
            <a type="button" data-toggle="collapse" href="#setting_tags" role="button" aria-expanded="false" aria-controls="setting_tags">
                <h5 class="card-title border-bottom pb-2 text-dark">تگ ها</h5>
            </a>
        </div>
        <div class="card-body collapse" id="setting_tags">
            <div class="form-group">
                <label for="category_tags_id" >دسته بندی</label>
                <select class="form-control  p-0" id="category_tags_id">
                    <option disabled="disabled  p-0" selected>انتخاب کنید</option>
                    <option value="0">بدون دسته</option>
                    @foreach($parentCategory as $item)
                        <option value="{{$item->id}}">{{$item->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_tags_id" >زیرمجموعه</label>
                <select class="form-control  p-0" id="sub_category_tags" name="category_tags_id">
                    <option disabled="disabled" selected>انتخاب کنید</option>
                </select>
            </div>
            <form method='post' action='/admin/settings/updatetags'>
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <table class="table">
                    <thead class=" text-dark">
                    <th>ردیف </th>
                    <th>نتیجه پیگیری </th>
                    <th>وضعیت </th>
                    <th>ویرایش </th>
                    <th>حذف </th>
                    </thead>
                    <tbody id="settings_subtags">

                    </tbody>
                </table>
                <!-- <input type="submit" class="btn btn-primary" value="بروزرسانی" > -->
            </form>
        </div>
        <div class="card-footer">
            <hr />
            <div class="card-stats">
                <a class="btn btn-primary" href="/admin/settings/tags/new" role="button">اضافه کردن</a>
            </div>
        </div>
    </div>
</div>
