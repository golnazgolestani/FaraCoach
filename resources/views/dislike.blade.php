<a href='' class='likes' description='{{$like->post_id}}' >
    <i class='bi bi-heart'></i>
</a>


<script>
    $('.likes').click(function (e)
    {
        console.log('LIKE');
        e.preventDefault();
        var id=$(this).attr('description');
        console.log('LIKE ID='+id);
        var _token= $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method:'POST',
            url:'/like',
            data:{post_id :id,_token: _token},
            success:function(data)
            {
                $("#like"+id).html(data);
            }
        });
    });
</script>
