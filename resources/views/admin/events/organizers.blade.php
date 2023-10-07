@extends('admin.master.index')

@section('headerScript')

    <link href="{{asset('/dashboard/assets/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/dashboard/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />


@section('content')
    <div class="col-12 table-responsive">
        <div class="form-group">
            <label>افزودن برگزار کننده :</label>
            <input id="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror"  value="{{ old('organizer') }}" required autofocus>
        </div>


        <form method="post" action="/admin/event/organizers/store">
                {{csrf_field()}}
            <div id="result">


            </div>
            <button  type="submit" class="btn btn-primary mb-3 d-none" id="insertOrganizer">افزودن برگزارکننده</button>
        </form>




        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>تعداد رویداد</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="text-center">
                    <td>
                      <img src="{{'/images/'.$user->personal_image}}" width="25px" class="rounded-circle" />
                    </td>
                    <td>{{$user->fname}}</td>
                    <td>{{$user->lname}}</td>
                    <td>
                        {{$user->events->count()}}
                    </td>
                    <td class="p-1">
                        <form method="post" action="/admin/event/organizers/{{$user->id}}/destroy" onsubmit="return window.confirm('ایا از غیرفعال کردن این شخص برای برگزاری رویدادها اطمینان دارید؟')">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger"> غیر فعال کردن</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection

@section('footerScript')
    <script src="{{asset('/dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('/panel_assets/js/scripts/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/panel_assets/js/scripts/datatables/buttons.print.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrltip',
                buttons: [
                   'excel'
                ]
            } );
        } );
    </script>




    <script>
        document.querySelector('#organizer').addEventListener('change',function(){
            let loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
            $("#result").html(loading);
            let organizer=document.querySelector('#organizer').value;
           $.ajax({
               type:'post',
               url:'/admin/user/ajax/search',
               data:{
                    user:organizer,
                   _token:$('meta[name="csrf-token"]').attr('content'),
               },
               success:function(data)
               {
                   if(data.length>0)
                   {
                       for (i=0;i<data.length;i++)
                       {
                           users="<label for=\"exampleFormControlSelect1\">برگزارکننده را انتخاب کنید <span class=\"text-danger text-bold\">*</span></label>" +
                               "<select class=\"form-control\" id=\"exampleFormControlSelect1\" name='user_id'>" +
                               "<option selected disabled>انتخاب کنید</option>";
                               $.each( data, function( key, value ) {
                                   users += ''+
                                       '<option value="'+value.id+'">'+
                                       value.fname+' '+value.lname+' '+value.tel+
                                       '</option>';
                               });
                               users=users+"</select>"
                       }
                       $('#result').html(users);
                       $('#insertOrganizer').attr('class','btn btn-primary mb-3');
                   }
                   else
                   {
                       $("#result").html('<div class="alert alert-danger" role="alert">یافت نشد</div>');
                       $('#insertOrganizer').attr('class','btn btn-primary mb-3 d-none');
                   }

               },
               statusCode:
               {
                   404:function ()
                   {
                       $("#result").html('<div class="alert alert-danger" role="alert">خطای پیدا کردن مسیر </div>');
                   },
                   422: function() {
                       $("#result").html('<div class="alert alert-danger" role="alert">خطا 422</div>');
                   },
                   500:function()
                   {
                       $("#result").html("خطا 500");
                   }
               }

           })
        });
    </script>
@endsection
