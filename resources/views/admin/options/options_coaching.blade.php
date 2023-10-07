@extends('admin.master.index')

@section('headerScript')
    <link href="{{asset('/trumbowyg-2.25.1/dist/ui/trumbowyg.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

    <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8" >
        <div class="card-header bg-secondary">
            <h5 class="card-title text-light">تنظیمات کلینیک</h5>
        </div>
        <div class="card-body  border border-1">
            <form method="post" action="/admin/options/booking" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group" >
                    <label for="rule_moarefeh_coaching">متن قوانین و مقررات جلسه معارفه:<span class="text-danger">*</span></label>
                    <textarea class="form-control textarea "   id="rule_moarefeh_coaching" name="rule_moarefeh_coaching">{{old('rule_moarefeh_coaching',$options->where('option_name','=','rule_moarefeh_coaching')->first()['option_value'])}}</textarea>
                </div>
                <div class="form-group" >
                    <label for="rule_meeting_coaching">متن قوانین و مقررات جلسه کوچینگ:<span class="text-danger">*</span></label>
                    <textarea class="form-control textarea "   id="rule_coaching_meeting" name="rule_meeting_coaching">{{old('rule_meeting_coaching',$options->where('option_name','=','rule_meeting_coaching')->first()['option_value'])}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="{{asset('/trumbowyg-2.25.1/dist/trumbowyg.min.js')}}"></script>
    <script src="{{asset('/trumbowyg-2.25.1/dist/langs/fa.js')}}"></script>
    <script>
        $('.textarea').trumbowyg({
            lang:'fa',
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                //['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        })
    </script>
@endsection
