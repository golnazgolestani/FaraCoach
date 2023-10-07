<!-- اضافه کردن دسته های نحوه آشنایی -->
<div class="col-xs-12 col-md-6 col-xl-6 col-lg-6">
    <div class="card card-chart">
        <div class="card-header bg-info">
            <a  type="button" data-toggle="collapse" href="#setting_CategoryGettingknow" role="button" aria-expanded="false" aria-controls="setting_Categorytags">
                <h5 class="card-title border-bottom pb-2">دسته بندی نحوه آشنایی</h5>
            </a>
        </div>
        <div class="card-body collapse" id="setting_CategoryGettingknow">
            <table class="table">
                <thead class=" text-dark">
                <th>ردیف </th>
                <th>دسته بندی </th>
                <th>وضعیت </th>
                <th>ویرایش </th>
                <th>حذف </th>
                </thead>
                <tbody>
                <?php
                $i=1;
                ?>
                @foreach($categoryGettingknow as $item)
                    <tr >
                        <td>
                            {{$i++}}
                        </td>
                        <td>

                            {{$item->category}}
                        </td>
                        <td>
                            {{$item->status}}
                        </td>
                        <td>
                            <a href="/admin/category_gettingknow/{{$item->id}}/edit/">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                        </td>
                        <td >
                            <form method="post" action="/admin/category_gettingknow/{{$item->id}}" onsubmit="return confirm('آیا از حذف دسته بندی مطمئن هستید؟');">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button  class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <hr />
            <div class="card-stats">
                <a class="btn btn-primary" href="/admin/category_gettingknow/create" role="button">اضافه کردن</a>
            </div>
        </div>
    </div>
</div>

