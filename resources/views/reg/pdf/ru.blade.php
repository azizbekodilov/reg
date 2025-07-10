<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Форма заявки для регистрации</title>
    @include('reg.style')
</head>

<body>
    <div class="container">
        <div class="main-content">
            <div class="form-header">
                <h1 class="form-title">Форма заявки для регистрации</h1>
            </div>

            <!-- 1. Укажите предполагаемую организационно-правовую форму -->
            <div class="section">
                <label class="section-label">1. Укажите предполагаемую организационно-правовую форму</label>
                <div class="form-note">{{ $request->organisation_type }}</div>
            </div>

            <!-- 2. Напишите предполагаемое фирменное наименование организации -->
            <div class="section">
                <label class="section-label">2. Напишите предполагаемое фирменное наименование организации</label>
                <div class="form-note">
                    <div>{{ $request->company_name }}</div>
                </div>
            </div>

            <!-- 3. Опишите вид деятельности -->
            <div class="section">
                <label class="section-label">3. Опишите вид деятельности</label>
                <div class="form-note">
                    <div>{{ $request->type_of_activity }}</div>
                </div>
            </div>

            <!-- 4. Укажите юридический адрес по которому будет регистрироваться фирма -->
            <div class="section">
                <label class="section-label">4. Укажите юридический адрес по которому будет регистрироваться фирма
                    (город, район, улица, дом, кв.)</label>
                <div class="form-note">
                    <div>{{ $request->juridical_name }}</div>
                </div>
                <label class="section-label">4. Кадастровый номер</label>
                <div class="form-note">
                    <div>{{ $request->cadastral_number }}</div>
                </div>
            </div>

            <!-- 5. Предполагаемый налоговый режим< -->
            <div class="section">
                <label class="section-label">5. Предполагаемый налоговый режим</label>
                <div class="form-note">
                    <div>{{ $request->tax_regime }}</div>
                </div>
            </div>

            <!-- 6. Размер Уставного фонда -->
            <div class="section input-ustav-fond">
                <label class="section-label">6. Размер Уставного фонда</label>
                <div class="form-note">
                    <div>{{ $request->capital_summa }}</div>
                </div>
            </div>

            <!-- 7. Количество учредителей -->
            <div class="section">
                <label class="section-label">7. Количество учредителей</label>
                <div class="founders-grid">
                    <button type="button" class="founder-button selected" data-count="1">1</button>
                    <button type="button" class="founder-button" data-count="2">2</button>
                    <button type="button" class="founder-button" data-count="3">3</button>
                    <button type="button" class="founder-button" data-count="4">4</button>
                    <button type="button" class="founder-button" data-count="5">5</button>
                    <button type="button" class="founder-button" data-count="6">6</button>
                    <button type="button" class="founder-button" data-count="7">7</button>
                    <button type="button" class="founder-button" data-count="8">8</button>
                    <button type="button" class="founder-button" data-count="9">9</button>
                    <button type="button" class="founder-button" data-count="10">10</button>
                    <button type="button" class="founder-button" data-count="11">11</button>
                    <button type="button" class="founder-button" data-count="12">12</button>
                </div>
            </div>

            <!-- 8. Состав учредителей -->
            <div class="section">
                <label class="section-label">8. Состав учредителей и их долевое участие</label>
                <div id="foundersContainer">
                    <!-- Founder sections will be dynamically generated here -->
                </div>
            </div>

            <!-- 9. Сведения о предполагаемом Руководителе Организации: -->
            <div class="section">
                <label class="section-label">9. Сведения о предполагаемом Руководителе Организации:</label>
                <div class="form-note">
                    <div>{{ $request->head_name }}</div>
                </div>
                <div class="form-note">
                    <div>{{ $request->head_number }}</div>
                </div>
                <div class="form-note">
                    <div>{{ $request->head_mail }}</div>
                </div>
            </div>

            <!-- 10. Укажите телефон и электронную почту предприятия для указания в едином гос.реестре: -->
            <div class="section">
                <label class="section-label">10. Укажите телефон и электронную почту предприятия для указания в
                    едином гос.реестре:</label>
                <div class="form-note">
                    <div>{{ $request->organisation_phone }}</div>
                </div>
                <div class="form-note">
                    <div>{{ $request->organisation_mail }}</div>
                </div>
            </div>
            <!-- 11. Укажите дополнительную информацию, которую Вы считаете важно для -->
            <div class="section">
                <label class="section-label">11. Укажите дополнительную информацию, которую Вы считаете важно для
                    нас при регистрации компании:</label>
                <div class="form-note">
                    <div>{{ $request->note }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
