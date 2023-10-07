@extends('acckt_master.master.panel')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1">لیست ایده ها</h5>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="/portal"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active"> لیست ایده ها</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body"><!-- users list start -->
          <section class="users-list-wrapper">
              <div class="users-list-filter px-1">
                  <form>
                      <div class="row border rounded py-2 mb-2">
                          <div class="col-12 col-sm-6 col-lg-4">
                              <label for="users-list-role">عنوان ایده</label>
                              <fieldset class="form-group">
                                <input type="text" class="form-control text-left" id="users-list-role">
                              </fieldset>
                          </div>
                          <div class="col-12 col-sm-6 col-lg-4">
                              <label for="users-list-status">وضعیت</label>
                              <fieldset class="form-group">
                                  <select class="form-control" id="users-list-status">
                                      <option value="">همه</option>
                                      <option value="فعال">فعال</option>
                                      <option value="بسته شده">بسته شده</option>
                                      <option value="غیرفعال">غیرفعال</option>
                                  </select>
                              </fieldset>
                          </div>
                          <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-center">
                              <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0 mt-75">پاکسازی</button>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="users-list-table">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <!-- datatable start -->
                              <div class="table-responsive">
                                  <table id="users-list-datatable" class="table">
                                      <thead>
                                          <tr>
                                              <th>ردیف</th>
                                              <th>عنوان ایده</th>
                                              <th>خلاصه ایده</th>
                                              <th>زمان ثبت</th>
                                              <th>وضعیت</th>
                                              <th>ویرایش</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($ideas as $item)
                                          <tr>
                                              <td>1</td>
                                              <td><a href="/portal_idea/idea/{{$item->id}}">{{$item->group_name}}</a></td>
                                              <td>{{$item->description}}</td>
                                              <td>{{$item->date_fa}}</td>
                                              <td><span class="badge bg-rgba-success text-success">فعال</span></td>
                                              <td>
                                                  <a href="/portal_idea/idea/{{$item->id}}/edit"><i class="bx bx-edit-alt"></i></a>
                                              </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                              </div>
                              <!-- datatable ends -->
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- users list ends -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
@endsection
