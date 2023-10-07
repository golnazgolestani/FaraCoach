@extends('panelAdmin.master.index')

@section('headerScript')

@endsection

@section('rowcontent')

@endsection

@section('footerScript')
    <script src="{{asset('/VvvebJs-master/js/jquery.min.js')}}"></script>
    <script src="{{asset('/VvvebJs-master/js/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('/VvvebJs-master/libs/builder/builder.js')}}"></script>


    <script src="{{asset('/VvvebJs-master/libs/builder/undo.js')}}"></script>
    <script src="{{asset('/VvvebJs-master/libs/builder/inputs.js')}}"></script>
    <script src="{{asset('/VvvebJs-master/libs/builder/components-bootstrap4.js')}}"></script>
    <script src="{{asset('/VvvebJs-master/libs/builder/components-widgets.js')}}"></script>
    <script>
        $(document).ready(function()
        {
            Vvveb.Builder.init('demo/narrow-jumbotron/index.html', function() {
                //run code after page/iframe is loaded
            });
        });
    </script>
@endsection
