<div class='border-bottom mb-2'>
    @foreach ($booking as $item)
        @if($item->duration_booking==2)
            <a class="btn_reserve btn btn-primary ml-2 mb-1" href="#reserve"  data-whatever="{{$item->id}}">{{$item->start_time}} - {{$item->end_time}}
                <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2 bi bi-clock-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/></svg>
            </a>
        @endif
    @endforeach
</div>

<script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}" ></script>
<script src="{{asset('/js/bootstrap.min.js')}}" ></script>
    <script>
        $('.btn_reserve').click(function(event)
        {
            var id=$(this).data('whatever');
            if((id==0))
            {
                var loading = '<div class="alert alert-warning" role="alert">خطا در انتخاب ساعت</div>';
            }
            else {
                var loading = '<div class="col-12 text-center"><div class="spinner-border text-primary text-center" role="status"><span class="sr-only">Loading...</span></div></div>';
                $("#reserve").html(loading);
                $.ajax({
                    type: 'GET',
                    url: "/booking/showformreserve?id=" + id ,
                    success: function (data) {
                        $("#reserve").html(data);
                    }
                });
            }
        });

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            console.log($(this).attr());

            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
            var id=recipient;
        });
    </script>
