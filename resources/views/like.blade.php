
<a href='' class='dislikes' description="{{$status->id}}" post="{{$like[0]->post_id}}" >
    <i class='bi bi-heart-fill'></i>
</a>
<small>{{count($like)}} نفر پسندیدند </small>

<script>
    $('.dislikes').click(function (e)
    {
        console.log("DISLIKE");
        e.preventDefault();
        var id=$(this).attr('description');
        var post=$(this).attr('post');
        var _token= $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method:'DELETE',
            url:'/like/'+id,
            data:{post_id :id,_token: _token},
            success:function(data)
            {
                console.log(post);
                $("#like"+post).html(data);
            }
        });
    });
</script>
