<table class="table text-center mt-1">
    <tr>
        <td>ردیف</td>
        <td></td>
        <td>نام و نام خانوادگی</td>
        <td>تلفن</td>
        <td>آخرین ورود</td>
        <td>امتیاز بورسیه</td>
        <td>امتیاز شما</td>

    </tr>
    @foreach($scholarship->user->get_invitations->wherein('resource',['بورسیه تحصیلی','کمپین گره']) as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                @if(is_null($item->personal_image))
                    <img class="rounded" src="{{asset('/documents/users/default-avatar.png')}}" width="50px" height="50px" />
                @else
                    <img class="rounded" src="{{asset('/documnts/users/'.$item->personal_image)}}" width="50px" height="50px" />
                @endif
            </td>
            <td>{{$item->fname.' '.$item->lname }}</td>
            <td dir="ltr">{{$item->tel}}</td>
            <td dir="ltr">-</td>
            <td dir="ltr">-</td>
            <td dir="ltr">
                @if(is_null($item->scholarship))
                    0
                @else
                    {{floor(($item->scholarship->get_score()*10)/100)}}
                @endif
            </td>
        </tr>
    @endforeach
    @for($i=(count($scholarship->user->get_invitations->where('resource','=','بورسیه تحصیلی'))+1);$i<=5;$i++)
        <tr>
            <td>{{$i}}</td>
            <td>
                <img class="rounded" src="{{asset('/documents/users/default-avatar.png')}}" width="50px" height="50px" />
            </td>
            <td></td>
            <td dir="ltr"></td>
            <td dir="ltr">-</td>
            <td dir="ltr">-</td>
            <td dir="ltr">0</td>
        </tr>
    @endfor

</table>
<div class="row">
    <div class="mx-auto col-12 col-md-4 text-center">

        <p>امتیاز از دعوت دوستان: {{$count_scholarshipIntroduce}} امتیاز</p>
    </div>
</div>

