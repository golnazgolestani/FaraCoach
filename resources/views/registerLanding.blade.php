<div class="form-row">
    <form method="post" action="/landPage" class="form-inline text-center">
        {{csrf_field()}}
        <input type="hidden" value="سالگرد" name="resource" />
        <input type="hidden" value="{{$introduced}}" name="introduced" />
        <div class="col-md-4 mb-3" >
            <input type="text" class="form-control " name="fname" placeholder="نام" required/>
        </div>
        <div class="col-md-4 mb-3">
            <input type="text" class="form-control" name="lname" placeholder="نام خانوادگی"  required/>
        </div>
        <div class="col-md-4 mb-3">
            <input type="text" class="form-control"  value="{{old('tel')}}" required autocomplete="tel" placeholder="تلفن همراه" name="tel" />
        </div>
        <button class="btn px-5 mt-4  d-block" typ="submit"> ثبت نام و مرحله بعد </button>
    </form>
</div>
