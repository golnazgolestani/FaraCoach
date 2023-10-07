@extends('panelAdmin.master.index')

@section('headerScript')
    <style>
        th p
        {
            font-size: 12px;
        }
    </style>
@endsection
@section('rowcontent')
    <div class="container bg-light p-3 shadow-lg">
        <div class="row">
            <div class="col-12">
                <p>ارزیابی {{$psychological->fname." ".$psychological->lname}}</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">سوال</th>
                        <th scope="col" class="text-center"> <p>کاملاً مخالف</p><p>ا امتیاز</p></th>
                        <th scope="col" class="text-center"> <p>مخالف</p><p>2 امتیاز</p></th>
                        <th scope="col" class="text-center"> <p>تاحدودی مخالف</p><p>3 امتیاز</p></th>
                        <th scope="col" class="text-center"> <p>تاحدودی موافق</p><p>4 امتیاز</p></th>
                        <th scope="col" class="text-center"> <p>موافق</p><p>5 امتیاز</p></th>
                        <th scope="col" class="text-center"> <p>کاملاً موافق</p><p>6 امتیاز</p></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>1- اکثر افراد مرا دوست داشتنی و باعاطفه و مهربان می دانند.</td>
                        <td class="text-center">@if($psychological->result[0]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[0]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[0]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[0]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[0]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[0]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>2- من از ابراز عقایدم هراسی ندارم حتی زمانی که آن‌ها با عقاید اکثر مردم متضاد هستند.</td>
                        <td class="text-center">@if($psychological->result[1]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[1]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[1]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[1]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[1]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[1]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>3- در کل احساس می کنم من در خدمت موقعیتی هستم که در آن زندگی می کنم.</td>
                        <td class="text-center">@if($psychological->result[2]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[2]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[2]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[2]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[2]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[2]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>4- من به فعالیت هایی که افق های وسیعی برای من باز می‌کنند علاقه‌مند نیستم.</td>
                        <td class="text-center">@if($psychological->result[3]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[3]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[3]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[3]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[3]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[3]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>5- من در زمان حال زندگی می کنم و واقعاً به آینده فکر نمی کنم.</td>
                        <td class="text-center">@if($psychological->result[4]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[4]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[4]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[4]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[4]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[4]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>6- وقتی‌که به داستان زندگی خودم نگاه می کنم،از هر آنچه در آن پیش‌آمده خشنودم.</td>
                        <td class="text-center">@if($psychological->result[5]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[5]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[5]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[5]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[5]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[5]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>7- حفظ ارتباطات نزدیک و صمیمی برای من سخت و مشقت بار بوده است.</td>
                        <td class="text-center">@if($psychological->result[6]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[6]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[6]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[6]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[6]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[6]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>8- تصمیمات من معمولاً با آنچه دیگران انجام می دهند تحت تأثیر قرار نمی گیرند.</td>
                        <td class="text-center">@if($psychological->result[7]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[7]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[7]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[7]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[7]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[7]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>9- نیازها و خواسته های روزمره زندگی اغلب مرا خسته می کند.</td>
                        <td class="text-center">@if($psychological->result[8]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[8]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[8]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[8]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[8]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[8]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>10- من راه‌های تازه ای برای انجام دادن کارهایم نمی خواهم، زندگی من به همین روش فعلی مطلوب است.</td>
                        <td class="text-center">@if($psychological->result[9]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[9]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[9]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[9]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[9]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[9]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>11- تمایل دارم بر «حال» تمرکز کنم چراکه «آینده» همیشه برای من مشکلاتی را به همراه دارد.</td>
                        <td class="text-center">@if($psychological->result[10]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[10]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[10]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[10]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[10]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[10]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>12- درمجموع، اعتمادبه‌نفس و حس مثبتی درباره ی خودم دارم.</td>
                        <td class="text-center">@if($psychological->result[11]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[11]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[11]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[11]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[11]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[11]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>13-گاهی احساس تنهایی می کنم چراکه دوستان صمیمی کمی‌دارم که می‌توانم نگرانی هایم را با آن‌ها در میان بگذارم.</td>
                        <td class="text-center">@if($psychological->result[12]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[12]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[12]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[12]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[12]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[12]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>14- در مورد آنچه مردم در مورد من فکر می‌کنند، نگرانم می کند.</td>
                        <td class="text-center">@if($psychological->result[13]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[13]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[13]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[13]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[13]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[13]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>15- با افراد و جامعه اطرافم خیلی خوب همخوانی خوبی ندارم.</td>
                        <td class="text-center">@if($psychological->result[14]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[14]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[14]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[14]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[14]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[14]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">16</th>
                        <td>16- داشتن تجربیات جدیدی که چگونگی تصور شمارا درباره ی خود و جهان اطرافتان به چالش می کشد، مهم است.</td>
                        <td class="text-center">@if($psychological->result[15]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[15]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[15]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[15]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[15]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[15]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">17</th>
                        <td>17- اغلب فعالیت‌های هرروزه‌ی من به نظرم تکراری و بی اهمیت به نظرم می آید.</td>
                        <td class="text-center">@if($psychological->result[16]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[16]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[16]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[16]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[16]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[16]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">18</th>
                        <td>18- فکر می کنم بیشتر افرادی که می شناسم از زندگی بهره ی بیشتری در مقایسه با من می برند.</td>
                        <td class="text-center">@if($psychological->result[17]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[17]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[17]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[17]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[17]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[17]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">19</th>
                        <td>19- من از روابط فردی و دوطرفه با اعضای خانواده یا دوستانم لذت می برم.</td>
                        <td class="text-center">@if($psychological->result[18]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[18]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[18]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[18]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[18]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[18]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">20</th>
                        <td>20- شاد بودن برای خودم، اهمیت بیشتری برای من دارد تا رضایت دیگران.</td>
                        <td class="text-center">@if($psychological->result[19]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[19]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[19]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[19]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[19]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[19]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">21</th>
                        <td>21- من کاملاً در مدیریت بسیاری از مسئولیت¬های زندگی ام موفق هستم.</td>
                        <td class="text-center">@if($psychological->result[20]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[20]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[20]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[20]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[20]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[20]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">22</th>
                        <td>22- وقتی خوب فکر می کنم، من واقعاً در طی سال ها کمال استفاده از عمرم نبرده ام.</td>
                        <td class="text-center">@if($psychological->result[21]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[21]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[21]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[21]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[21]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[21]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">23</th>
                        <td>23- حس خوبی ازآنچه هست، برای به دست آوردن آن در زندگی تلاش می کنم، ندارم.</td>
                        <td class="text-center">@if($psychological->result[22]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[22]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[22]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[22]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[22]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[22]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">24</th>
                        <td>24- من اکثر جنبه های شخصیتم را دوست دارم.</td>
                        <td class="text-center">@if($psychological->result[23]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[23]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[23]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[23]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[23]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[23]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">24</th>
                        <td>25- من افراد زیادی را در اختیار ندارم که هنگام نیاز به گفتگو با آن‌ها، به من گوش کنند.</td>
                        <td class="text-center">@if($psychological->result[24]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[24]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[24]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[24]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[24]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[24]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">26</th>
                        <td>26- توسط افرادی با عقاید قوی تحت تأثیر قرار می گیرم.</td>
                        <td class="text-center">@if($psychological->result[25]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[25]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[25]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[25]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[25]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[25]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">27</th>
                        <td>27- اغلب احساس می کنم در برابر مسئولیت هایم از پا می افتم.</td>
                        <td class="text-center">@if($psychological->result[26]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[26]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[26]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[26]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[26]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[26]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">28</th>
                        <td>28- این حس رادارم که فردی رشد یافته ام.</td>
                        <td class="text-center">@if($psychological->result[27]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[27]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[27]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[27]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[27]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[27]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">29</th>
                        <td>29- عادت داشتم برای خودم اهدافی را ترتیب دهم اما الآن فکر می کنم این وقت تلف کردن است.</td>
                        <td class="text-center">@if($psychological->result[28]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[28]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[28]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[28]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[28]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[28]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">30</th>
                        <td>30- اشتباهاتی درگذشته داشته ام، اما حس می کنم که همه‌چیز برای بهترین حالت فراهم بوده است.</td>
                        <td class="text-center">@if($psychological->result[29]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[29]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[29]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[29]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[29]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[29]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">31</th>
                        <td>31- به نظرم اکثر افراد تعداد دوستان بیشتری از من دارند.</td>
                        <td class="text-center">@if($psychological->result[30]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[30]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[30]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[30]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[30]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[30]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">32</th>
                        <td>32- من به عقاید اطمینان دارم حتی اگر آن‌ها بر ضد نظر اکثریت باشد.</td>
                        <td class="text-center">@if($psychological->result[31]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[31]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[31]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[31]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[31]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[31]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">33</th>
                        <td>33- من معمولاً اقدام مناسبی برای حفاظت از اعتبار و امور شخصی خودم انجام می دهم.</td>
                        <td class="text-center">@if($psychological->result[32]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[32]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[32]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[32]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[32]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[32]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">34</th>
                        <td>34- من از قرار گرفتن در موقعیت های جدیدی که نیاز به تغییر در روش‌های آشنایی قدیمی خودم داشته باشند، لذت نمی برم.</td>
                        <td class="text-center">@if($psychological->result[33]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[33]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[33]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[33]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[33]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[33]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">35</th>
                        <td>35- از طراحی برای آینده و تلاش برای رساندن آن‌ها به واقعیت لذت می برم.</td>
                        <td class="text-center">@if($psychological->result[34]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[34]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[34]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[34]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[34]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[34]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">36</th>
                        <td>36- به طرق مختلف از موقعیت¬هایم در زندگی احساس نارضایتی دارم.</td>
                        <td class="text-center">@if($psychological->result[35]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[35]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[35]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[35]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[35]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[35]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">37</th>
                        <td>37- مردم مرا به‌عنوان فردی دهنده و خواهان در اختیار گذاشتن وقتم با دیگران می شناسند.</td>
                        <td class="text-center">@if($psychological->result[36]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[36]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[36]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[36]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[36]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[36]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">38</th>
                        <td>38- برایم ابراز عقیده در موارد بحث‌انگیز مشکل است.</td>
                        <td class="text-center">@if($psychological->result[37]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[37]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[37]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[37]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[37]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[37]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">39</th>
                        <td>39- من در بکار گرفتن وقتم استادم پس می توانم هر چیزی را همان‌طور که لازم است انجام دهم.</td>
                        <td class="text-center">@if($psychological->result[38]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[38]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[38]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[38]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[38]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[38]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">40</th>
                        <td>40- برای من زندگی فرآیندی مداوم از یادگیری تغییر و رشد است.</td>
                        <td class="text-center">@if($psychological->result[39]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[39]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[39]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[39]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[39]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[39]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">41</th>
                        <td>41- فردی فعال در به ثمر رساندن اهدافم هستم.</td>
                        <td class="text-center">@if($psychological->result[40]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[40]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[40]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[40]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[40]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[40]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">41</th>
                        <td>42- نگرش من درباره ی خودم احتمالاً با اندازه ای مثبت نیست که سایرین در مورد خودشان مثبت فکر می‌کنند.</td>
                        <td class="text-center">@if($psychological->result[41]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[41]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[41]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[41]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[41]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[41]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">42</th>
                        <td>43- من ارتباطات گرم و مورد اعتماد زیادی را با دیگران تجربه نکرده ام.</td>
                        <td class="text-center">@if($psychological->result[42]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">43</th>
                        <td>43- من ارتباطات گرم و مورد اعتماد زیادی را با دیگران تجربه نکرده ام.</td>
                        <td class="text-center">@if($psychological->result[42]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[42]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">44</th>
                        <td>44- اغلب نظرم را درباره ی تصمیماتم عوض می کنم اگر دوستان یا خانواده‌ام مخالف باشند.</td>
                        <td class="text-center">@if($psychological->result[43]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[43]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[43]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[43]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[43]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[43]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">45</th>
                        <td>45- ترتیب دادن زندگی ام آن‌گونه که برایم رضایت بخش باشد، برایم دشوار است.</td>
                        <td class="text-center">@if($psychological->result[44]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[44]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[44]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[44]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[44]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[44]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">46</th>
                        <td>46- تلاش برای بهبود یا تغییر زندگی ام را خیلی وقت است متوقف کرده ام.</td>
                        <td class="text-center">@if($psychological->result[45]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[45]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[45]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[45]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[45]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[45]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">47</th>
                        <td>47- خیلی افراد در زندگی بی هدف و سرگردان هستند ولی من یکی از آن‌ها نیستم.</td>
                        <td class="text-center">@if($psychological->result[46]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[46]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[46]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[46]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[46]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[46]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">48</th>
                        <td>48- گذشته پستی‌وبلندی‌های زیادی داشته، اما در کل نمی¬خواهم آن را تغییر دهم.</td>
                        <td class="text-center">@if($psychological->result[47]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[47]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[47]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[47]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[47]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[47]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">49</th>
                        <td>49- می دانم که می توانم به دوستانم اعتماد کنم و آن‌ها نیز به من اعتماد کنند.</td>
                        <td class="text-center">@if($psychological->result[48]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[48]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[48]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[48]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[48]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[48]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">50</th>
                        <td>50- درباره ی خودم با آنچه برایم اهمیت دارد قضاوت می کنم و نه باارزش‌هایی دیگران فکر می‌کنند مهم است.</td>
                        <td class="text-center">@if($psychological->result[49]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[49]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[49]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[49]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[49]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[49]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">51</th>
                        <td>51- من توانسته ام خانه ای و سبکی از زندگی که دوست داشته ام برای خود بنا کنم.</td>
                        <td class="text-center">@if($psychological->result[50]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[50]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[50]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[50]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[50]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[50]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">52</th>
                        <td>52- این گفته حقیقت دارد که شما نمی توانید به سگ پیر شیرین کاری یاد دهید.</td>
                        <td class="text-center">@if($psychological->result[51]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[51]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[51]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[51]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[51]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[51]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">53</th>
                        <td>53- گاهی می پرسم آیا همه‌چیز را که می توانستم در زندگی انجام دهم، انجام داده ام؟</td>
                        <td class="text-center">@if($psychological->result[52]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[52]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[52]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[52]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[52]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[52]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>
                    <tr>
                        <th scope="row">54</th>
                        <td>54- وقتی خودم را با دوستان و آشنایان مقایسه می کنم، از همین‌که هستم احساس خوبی دارم.</td>
                        <td class="text-center">@if($psychological->result[53]==1) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[53]==2) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[53]==3) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[53]==4) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[53]==5) <i class="bi bi-check-lg"></i> @endif</td>
                        <td class="text-center">@if($psychological->result[53]==6) <i class="bi bi-check-lg"></i> @endif</td>
                    </tr>





                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
