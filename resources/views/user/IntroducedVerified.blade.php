@extends('user.master.index')
@section('content')
    <div class="col-12">
        {!! $options[0]->option_value !!}
    </div>
    <div class="col-12 text-center">
        <form method="post" action="/panel/introduced/introduced_verified">
            {{csrf_field()}}
            <div class="form">
                <input class="d-inline form-check text-dark" type="checkbox" value="1" id="introduced_verified" name="introduced_verified">
                <label class="d-inline form-check text-dark" for="introduced_verified">
                    شرایط و قوانین  بالا را مطالعه کردم و قبول دارم
                </label>
                <button type="submit" class="btn btn-success">موافقم</button>
            </div>
        </form>
    </div>
@endsection
