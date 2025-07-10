<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <title>Form for LA</title>


</head>

<body>
<div>

    <form class="form" method="get">
        <h2>Ro'yxatdan o'tish uchun ariza shakli</h2>

        <div class="form__group">
            <label for="">1. Tashkilotning ro‘yxatdan o‘tkazishdagi tashkiliy-huquqiy shaklini ko‘rsating:</label>
            <ul>
                <li>{{$request->input('1')}}</li>
            </ul>

        </div>

        <div class="form__group">
            <label for="">2. Tashkilotning taklif qilingan nomi (muqobil tanlov bilan bir nechta nomlar
                tanlovi):</label>
            <span>O‘zbekiston Respublikasining «Firma nomlari to‘g‘risida»gi Qonunga ko’ra firma nomida davlatning
                    rasmiy nomi, xalqaro, hukumatlararo yoki nodavlat notijorat tashkilotining qisqartirilgan yoki
                    to‘liq nomi ko’rsatilishi mumkin emas.</span>
            <ul>
                <li>Birinchi nom:   {{$request->input('2a')}}</li>
                <li>Muqobil nom:    {{$request->input('2b')}}</li>
                <li>Muqobil nom:    {{$request->input('2d')}}</li>
            </ul>



        </div>

        <div class="form__group">
            <label for="">3. Qanday faoliyatni amalga oshirishni maqsad qilgansiz?</label>
            <ul>
                @foreach(request()->input('3') as $item)
                    <li>{{$item}}</li> <br>
                @endforeach
            </ul>
            <br>

        </div>

        <div class="form__group">
            <label for="">4. Kompaniya ro'yxatdan o'tkaziladigan yuridik manzilni ko'rsating (shahar, tuman, ko‘cha,
                uy):</label>
                <ul>
                    <li>{{$request->input('4')}}</li>
                </ul>

        </div>

        <div class="form__group">
            <label for="">5. Elektron pochta manzilingizni ko’rsating:</label>
            <ul>
                <li>{{$request->input('5')??'-'}}</li>
            </ul>
        </div>

        <div class="form__group">
            <label for="">6. Ustav kapitali miqdori va uning qay shaklda shakllanishi:</label>
            <ul>
                <li>
            @if($request->input('6a') != "")
               {{$request->input('6a')}}
            @else

                {{$request->input('6')}}
            @endif
                </li>
            </ul>

        </div>

        <div class="form__group">
            <label for="">7. Ustav fondining hajmi:</label>
            <ul>
                <li>{{$request->input('7')}}</li>
            </ul>
        </div>

        <div class="form__group">
            <label for="">8. Ishtirokchilar va ularning ulushlari:</label>
            <div id="name__btn">
                <table id="idtable">
                    <thead>
                        <tr>
                            <th>
                                <h5>Ishtirokchining (F.I.SH.)</h5>
                            </th>
                            <th>
                                <h5>Fuqarolik</h5>
                            </th>
                            <th>
                                <h5>Manzil</h5>
                            </th>
                            <th>
                                <h5>Ulush miqdori</h5>
                            </th>
                            <th>
                                <h5>Ishtirokchining ulushi (%)</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($request->input('8a') as $key=>$item)
                            @if($item != "")
                                <tr>
                                    <td class="btntab">
                                        <h5>{{$item}}</h5>
                                    </td>
                                    <td class="btntab">
                                        <h5>{{$request->input('8b')[$key]??'-'}}</h5>
                                    </td>
                                    <td class="btntab">
                                        <h5>{{$request->input('8d')[$key]??'-'}}</h5>
                                    </td>
                                    <td class="btntab">
                                        <h5>{{$request->input('8e')[$key]??'-'}}</h5>
                                    </td>
                                    <td class="btntab">
                                        <h5>{{$request->input('8f')[$key]??'-'}}</h5>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form__group">
            <label for="">9. Tashkilotning bo‘lajak rahbari haqida ma’lumot:</label>
            <div id="name__btn">
                <table>
                    <thead>
                    <tr>
                        <th>
                            <h5>F.I.SH.</h5>
                        </th>
                        <th>
                            <h5>Bog’lanish uchun ma’lumot</h5>
                        </th>
                        <th>
                            <h5>Fuqarolik</h5>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="btntext">

                                    <h5>{{$request->input('9a')}}</h5>

                            </td>
                            <td class="btntext">

                                    <h5>{{$request->input('9b')}}</h5>

                            </td>
                            <td class="btntext">

                                    <h5>{{$request->input('9d')}}</h5>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form__group">
                <label for="">10. Muhr tayyorlash uchun tanlovingiz:</label>
                <div>
                    <b>Muhrlar turi:</b>
                    <ul>
                        {!! $request->input('10a')?'<li>Oddiy</li><br>':'' !!}
                        {!! $request->input('10b')?'<li>Avtomatik</li><br><br>':'' !!}
                    </ul>

                    <b>Bosmalar turi:</b>
                    <ul>

                            {!! $request->input('10d')?'<li>Rangli</li><br>':'' !!}
                            {!! $request->input('10e')?'<li>Logotip bilan</li><br>':'' !!}
                            {!! $request->input('10f')?'<li>Logotipsiz</li><br>':'' !!}

                    </ul>
                </div>
            </div>
            <div class="form__group">
                <label for="">11. Konsalting xizmati uchun maqqul to‘lov usulini tanlang:</label>
                <ul>
                    {!! $request->input('11a')?'<li>Naqd pul</li><br>':'' !!}
                    {!! $request->input('11b')?'<li>Pul o\'kazish yo\'li bilan</li><br>':'' !!}
                    {!! $request->input('11d')?'<li>VISA</li><br>':'' !!}
                    {!! $request->input('11e')?'<li>Terminal</li><br>':'' !!}
                </ul>
            </div>
            <div class="form__group">
                <label for="">12. Biz haqimizda qayerdan ma’lumot oldingiz? (Biz uchun bu muhim)</label>
                <ul>
                    {!! $request->input('12a')?'<li>Internet</li><br>':'' !!}
                    {!! $request->input('12b')?'<li>Tanishlar</li><br>':'' !!}
                   {!! $request->input('12d')?'<li>Reklama</li><br>':'' !!}
                </ul>
            </div>
            <div class="form__group">
                <label for="">13. Bizning tashkilotimiz tomonidan buxgalterlik xizmatini amalga oshirilishini
                    istaysizmi?</label>
                <ul>
                    {!! $request->input('13a')?'<li>Ha</li><br>':'' !!}
                    {!! $request->input('13b')?'<li>Yo\'q</li><br>':'' !!}
                </ul>


            </div>
            <div class="form__group">
                <label for="">14. Tashkilotingizni ro‘yxatdan o‘tkazishda bizga kerakli deb hisoblagan ma’lumotni
                    ko‘rsatishingiz mumkin.</label>
                    <ul>
                        <li>{{$request->input('14')}}</li>
                    </ul>
            </div>
        </div>
    </form>
</div>

<style type="text/css">
    label{
        font-style: italic;
        display: block;
    }
    body {
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        font-size: 16px;
    }

    .container {
        width: 1100px;
        margin: 0 auto;
    }



    .form {
        border-radius: 10px;
        border-top: 80px solid orange;
        height: auto;
        text-align: left;
    }

    .form__group {
        width: 700px;
        display: block;
        margin: 15px 0;
    }

    .form__group span {
        font-size: 11px;
        display: block;
        text-align: left;
        margin: 5px 0 5px 5px;
    }

    .form h2 {
        margin-bottom: 60px;
        text-align: center;
    }

    .btntab {
        margin: 3px 0 0 15px;
        border: 1px solid grey;
    }

    th {
        width: 135px;
    }

    .btntext {
        width: 225px;
        margin: 3px 0 0 15px;
        border: 1px solid grey;
    }

    table {
        border-collapse: collapse;
        border: 1px solid black;
        width: 100%;
    }

    th {
        border: 1px solid;
        text-align: center;
        background: #dddddd;
    }

    td {
        border: 1px solid black;
        padding-left: 5px;
    }


    button {
        background: orange;
        border-radius: 5px;
        border: none;
        font-size: 16px;
        padding: 10px;
        margin: 20px 0 0 65px;
    }

    button:hover {
        background: red;
        border: 2px;
    }
    .form__group ul{
        padding: 10px 15px;
    }
</style>

<script src="https://use.fontawesome.com/e924723a01.js"></script>
</body>

</html>
