<div class="col-12 table-responsive mb-3">

    <table class="dataTable table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>شماره جلسه</th>
            <th>کوچ</th>

            <th>تاریخ جلسه </th>
            <th>ساعت جلسه </th>
            <th>وضعیت جلسه </th>

        </tr>
        </thead>
        <tbody>
        @foreach($user->reserves as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <a href="/admin/booking/{{$item->id}}/showadminbooking">{{$item->id}}</a>

                </td>
                <td>
                    {{$item->booking->coach->user->fname.' '.$item->booking->coach->user->lname}}
                </td>
                <td>{{$item->booking->start_date}}</td>
                <td>{{$item->booking->start_time}}</td>
                <td>{{$item->get_statusReserve()}}</td>

            </tr>
        @endforeach
        </tbody>


    </table>
</div>



