@extends('panelUser.master.index')
@section('rowcontent')
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">پیام ها</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="text-dark">
                        <th>شماره تیکت </th>
                        <th>موضوع پیغام </th>
                        <th>پیوست </th>
                        <th>وضعیت </th>
                        <th>زمان ثبت </th>
                    </thead>
                    <tbody>

                    @foreach($messages as $item)
                        <a class="">
                            <td>
                                <a href="{{$item->id}}" class="showDetailsMessage">
                                    {{$item->id}}
                                </a>
                            </td>
                            <td>
                                <a href="{{$item->id}}" class="showDetailsMessage">
                                    {{$item->subject}}
                                </a>
                            </td>
                            <td>
                                @if(strlen($item->attach)>0)
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
                                        <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                                    </svg>
                                @endif
                            </td>
                            <td>
                                @if($item->status==1)
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                    </svg>
                                @elseif($item->status==0)
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/>
                                    </svg>
                                @endif
                            </td>
                            <td>{{$item->time_fa}} {{$item->date_fa}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$messages->links()}}
            </div>

            <div class="card-footer">
                <hr />
                <div class="card-stats">
                    <a class="showDetailsMessage btn btn-primary" href="new" role="button" >پیام جدید</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6" id="showDetailsMessage">
    </div>



@endsection
