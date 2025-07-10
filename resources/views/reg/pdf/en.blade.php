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
    <div>
        <form class="form" method="get">
            <h2>Application form for registration</h2>

            <div class="form__group">
                <label for="">1. Specify the proposed legal form for registration of the company:</label>
                {{$request->input('1')}}
            </div>

            <div class="form__group">
                <label for="">2. Estimated name of the organization (preferably several names with an alternative
                    choice):</label>
                <span>According to the LAW OF THE REPUBLIC OF UZBEKISTAN "ON COMPANY NAMES" сompany name must not
                        contain the official name of state, the abbreviated or full name of the international,
                        intergovernmental or non-state non-profit organization.</span>

                First name:         {{$request->input('2a')}}<br>
                Alternative name:   {{$request->input('2b')}}<br>
                Alternative name:   {{$request->input('2d')}}<br>


            </div>

            <div class="form__group">
                <label for="">3. What activities do you intend to carry out?</label><br><br>
                <ul>@foreach($request->input('3') as $item)
                        <li>{{$item}}</li> <br>
                    @endforeach
                </ul>
                <br>
            </div>

            <div class="form__group">
                <label for="">4. Indicate the legal address at which the company will be registered (city, district,
                    street, house, apt.):</label><br><br>
                {{$request->input('4')}}<br>
            </div>

            <div class="form__group">
                <label for="">5. Enter your e-mail address:</label><br><br>
                {{$request->input('5')}}<br>
            </div>

            <div class="form__group">
                <label for="">6. In what form will the statutory fund be formed:</label><br>
                @if($request->input('6a'))
                    {{$request->input('6a')}}
                @else
                    {{$request->input('6')}}
                @endif
            </div>

            <div class="form__group">
                <label for="">7. The size of the authorized fund:</label>
                {{$request->input('7')}}<br>
            </div>

            <div class="form__group">
                <label for="">8. Founders and their shares:</label>
                <div id="name__btn">
                    <table id="idtable">
                        <thead>
                        <tr>
                            <th>
                                <h5>Founder (full name)</h5>
                            </th>
                            <th>
                                <h5>Citizenship</h5>
                            </th>
                            <th>
                                <h5>Adress</h5>
                            </th>
                            <th>
                                <h5>Amount</h5>
                            </th>
                            <th>
                                <h5>Equity participation (%)</h5>
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
                <label for="">9. Information about the prospective Head of the Organization:</label>
                <div id="name__btn">
                    <table>
                        <thead>
                        <tr>
                            <th>
                                <h5>Full name</h5>
                            </th>
                            <th>
                                <h5>Contact information</h5>
                            </th>
                            <th>
                                <h5>Citizenship</h5>
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
                    <label for="">10. Your preferences for making seals:</label>
                    <div>
                        <b>Ostnack type:</b><br><br>

                        <ul>
                            {!! $request->input('10a')?'<li>Simple</li> <br>':'' !!}
                            {!! $request->input('10b')?'<li>Automatic tooling</li><br>':'' !!}
                        </ul>
                        <br>

                        <b>Impression type:</b><br><br>

                        <ul>
                            {!! $request->input('10d')?'<li>Color (Flash)</li><br><br>':'' !!}
                            {!! $request->input('10e')?'<li>No logo</li><br>':'' !!}
                            {!! $request->input('10f')?'<li>With logo</li><br>':'' !!}
                        </ul>
                    </div>
                </div>
                <div class="form__group">
                    <label for="">11. Specify your preferred method of payment for consulting services:</label>
                    <br>
                    <ul>
                        {!! $request->input('11a')?'<li>In cash</li><br>':'' !!}
                        {!! $request->input('11b')?'<li>Enumeration</li><br>':'' !!}
                        {!! $request->input('11d')?'<li>VISA</li><br>':'' !!}
                        {!! $request->input('11e')?'<li>Terminal</li><br>':'' !!}
                    </ul>
                </div>
                <div class="form__group">
                    <label for="">12. Please indicate where you learned about us from: (It is important to know for
                        us)</label>
                    <br>
                    <ul>
                        {!! $request->input('12a')?'<li>Internet</li><br>':'' !!}
                        {!! $request->input('12b')?'<li>Familiar</li><br>':'' !!}
                        {!! $request->input('12d')?'<li>Advertising</li><br>':'' !!}
                    </ul>

                </div>
                <div class="form__group">
                    <label for="">13. Are you interested in further accounting support of your company by our
                        company?</label>
                    <br>
                    <ul>
                        {!! $request->input('13a')?'<li>Yes</li><br>':'' !!}
                        {!! $request->input('12b')?'<li>No</li><br>':'' !!}
                    </ul>
                </div>
                <div class="form__group">
                    <label for="">14. Specify additional information that you consider important for us to register a
                        company.</label><br><br>{{$request->input('14')}}<br><br><br><br><br>
                </div>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
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
</style>

<script src="https://use.fontawesome.com/e924723a01.js"></script>
</body>

</html>
