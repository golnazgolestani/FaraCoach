@extends('acckt_master.master.panel')

@section('headerScript')
<style>
   body {
        background: #280d3a;
        font-family: "Lalezar", sans-serif;
        text-align: right;
        color: white;
   }
   .row {
       direction: rtl;
   }
    .centered {
      position: fixed;
      top: 50%;
      left: 50%;
      /* bring your own prefixes */
      transform: translate(-50%, -50%);
    }
    .coming-soon {
        color: white;
        font-size: 28px;
        text-align: center;
    }
    .tab-content > .active {
        padding-top: 50px;
    }
    .table thead th {
        color: white;
    }
    .mb-0, .my-0 {
        color: black;
    }
</style>
@endsection

@section('content')
    <div class="content-wrapper">
    <div class="row">
    <div class="container space-2 space-3--lg">
      <div class="row justify-content-lg-between">
        <div class="col-md-4 col-lg-4 mb-7 mb-md-0">
          <div class="tab-vertical tab-vertical-md py-5 mr-lg-7">
            <div class="pr-md-7 mb-5">
             <h3 class="h4">یاسر بهرامی</h3>
            </div>

            <!-- Tab Nav -->
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <a class="nav-link tab-vertical__nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                1. پروفایل
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-scores-tab" data-toggle="pill" href="#v-pills-scores" role="tab" aria-controls="v-pills-scores" aria-selected="false">
                2. امتیازات
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-idea-tab" data-toggle="pill" href="#v-pills-idea" role="tab" aria-controls="v-pills-idea" aria-selected="false">
                3. ثبت ایده
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-consulting-tab" data-toggle="pill" href="#v-pills-consulting" role="tab" aria-controls="v-pills-consulting" aria-selected="false">
                4. مشاوره و آزمون های روانشناختی
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-certificates-tab" data-toggle="pill" href="#v-pills-certificates" role="tab" aria-controls="v-pills-certificates" aria-selected="false">
                5. گواهی نامه ها و افتخارات
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout" role="tab" aria-controls="v-pills-logout" aria-selected="false">
                6. خروج
              </a>
            </div>
           <!-- End Tab Nav -->
          </div>

        </div>

        <div class="col-md-8">
          <!-- Tab Content -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <h4>John Doe</h4>
                              <p class="text-secondary mb-1">یاسر</p>
                              <p class="text-muted font-size-sm">خراسان رضوی - مشهد</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mt-3">
                        <ul class="list-group list-group-flush" style="margin-right: -18%;">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                            <span class="text-secondary">https://acckt.ir</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                            <span class="text-secondary">acckt_ir</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                            <span class="text-secondary">@acckt_ir</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                            <span class="text-secondary">acckt_ir</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                            <span class="text-secondary">accktir</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">نام و نام خانوادگی</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              یاسر ب
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">ایمیل</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              info@acckt.ir
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">تلفن</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              5138593193(98)
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">موبایل</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              3134079(915)
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">آدرس</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              مشهد - سعدی 14 - پلاک 153
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="tab-pane fade" id="v-pills-scores" role="tabpanel" aria-labelledby="v-pills-scores-tab">
              <div class="row align-items-lg-center">
                <div class="col-lg-12">
                  <!-- Description -->
                  <div class="pl-lg-4">
                    <span class="u-label u-label--sm u-label--purple mb-3">جدول امتیازات</span>
                    <h2 class="h3 mb-3">لیست امتیازات دریافتی و پرداختی</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>دریافت / پرداخت</th>
                                <th>تاریخ</th>
                                <th>امتیاز</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-success">
                                <td>1</td>
                                <td>تکمیل اطلاعات پروفایل</td>
                                <td>1399/01/02</td>
                                <td>30</td>
                                <td>تایید شده</td>
                            </tr>
                            <tr class="table-success">
                                <td>2</td>
                                <td>مشاوره و آزمون شماره یک</td>
                                <td>1399/01/07</td>
                                <td>10</td>
                                <td>تایید شده</td>
                            </tr>
                            <tr class="table-warning">
                                <td>3</td>
                                <td>ثبت ایده شماره یک</td>
                                <td>1399/03/07</td>
                                <td>20</td>
                                <td>در انتظار تایید</td>
                            </tr>
                            <tr class="table-danger">
                                <td>3</td>
                                <td>خرید ایده شماره دو</td>
                                <td>1399/06/07</td>
                                <td>15</td>
                                <td>کسر شده</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- End Description -->
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="v-pills-idea" role="tabpanel" aria-labelledby="v-pills-idea-tab">
             <div class="row">
                <div class="col-sm-12 mb-12 mb-sm-12">
                  <!-- Icon Block -->
                  <div class="pr-lg-4">
                    <p>فرم ثبت ایده در این قسمت نمایش داده می شود</p>
                     <form action="/action_page.php">
                      <div class="form-group">
                        <label for="email">عنوان ایده:</label>
                        <input type="text" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                        <label for="email1">خلاصه:</label>
                        <input type="text" class="form-control" id="email1">
                      </div>
                      <div class="form-group">
                        <textarea rows="6" style="width:100%">شرح کلی:</textarea>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox"> نمایش برای فروش</label>
                      </div>
                      <button type="submit" class="btn btn-primary">ارسال</button>
                    </form>
                  </div>
                  <!-- End Icon Block -->
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="v-pills-consulting" role="tabpanel" aria-labelledby="v-pills-consulting-tab">
             <div class="row">
                <div class="col-sm-12 mb-12 mb-sm-12">
                  <!-- Icon Block -->
                  <div class="pr-lg-4">
                    <p>نمایش لیست مشاوره ها و آزمون ها</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>تاریخ</th>
                                <th>امتیاز</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-success">
                                <td>1</td>
                                <td>آزمون شخصیت شناسی شماره یک</td>
                                <td>1399/01/02</td>
                                <td>30</td>
                                <td>شرکت در آزمون</td>
                            </tr>
                            <tr class="table-warning">
                                <td>2</td>
                                <td>آزمون مشاروه شماره دو</td>
                                <td>1399/01/07</td>
                                <td>10</td>
                                <td>قبلا شرکت کرده اید</td>
                            </tr>
                            <tr class="table-success">
                                <td>3</td>
                                <td>آمون شماره دو روانشناسی</td>
                                <td>1399/02/07</td>
                                <td>20</td>
                                <td>شرکت در آزمون</td>
                            </tr>
                            <tr class="table-success">
                                <td>3</td>
                                <td>آمون شماره دو شناخت بازار</td>
                                <td>1399/06/07</td>
                                <td>15</td>
                                <td>شرکت در آزمون</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  <!-- End Icon Block -->
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="v-pills-certificates" role="tabpanel" aria-labelledby="v-pills-certificates-tab">
             <div class="row">
                <div class="col-sm-12 mb-12 mb-sm-12">
                  <!-- Icon Block -->
                  <div class="pr-lg-4">
                    <p>نمایش لیست گواهی نامه ها</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>تاریخ</th>
                                <th>دانلود</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-success">
                                <td>1</td>
                                <td>گواهینامه شماره یک</td>
                                <td>1399/01/02</td>
                                <td>دریافت</td>
                            </tr>
                            <tr class="table-success">
                                <td>2</td>
                                <td>گواهینامه شماره دو</td>
                                <td>1399/01/07</td>
                                <td>دریافت</td>
                            </tr>

                        </tbody>
                    </table>
                  </div>
                  <!-- End Icon Block -->
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
             <div class="row">
                <div class="col-sm-6 mb-7 mb-sm-9">
                  <!-- Icon Block -->
                  <div class="pr-lg-4">
                    <p>برای خروج از پورتال ایده پردازان روی لینک زیر کلیک کنید</p>
                    (<a href="#" data-request="onLogout" data-request-data="redirect: '/'">خروج</a>)
                  </div>
                  <!-- End Icon Block -->
                </div>
              </div>
            </div>

          </div>
          <!-- End Tab Content -->
        </div>
      </div>
    </div>
</div>
    </div>

@endsection
