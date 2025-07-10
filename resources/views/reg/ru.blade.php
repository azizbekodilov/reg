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
            <button class="seller">
                <img src="http://127.0.0.1:8000/img/ekaterina_sibaeva.png" alt="">
            </button>
            <style>
                .seller {
                    position: fixed;
                    top: 2rem;
                    left: 2rem;
                    z-index: 999;
                    overflow: hidden;
                    border-radius: 50%;
                    border: 4px solid rgb(223, 6, 6)
                }

                .seller img {
                    width: 120px;
                }
            </style>
            <div class="form-header">
                <h1 class="form-title">Форма заявки для регистрации</h1>
                <div class="form-subtitle">
                    <span class="warning-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0013 9.00054C13.0013 9.55282 12.5536 10.0005 12.0013 10.0005C11.449 10.0005 11.0013 9.55282 11.0013 9.00054C11.0013 8.44825 11.449 8.00054 12.0013 8.00054C12.5536 8.00054 13.0013 8.44825 13.0013 9.00054Z"
                                fill="#B00D15" fill-opacity="0.39" />
                            <path
                                d="M12.0013 11.7505C12.4155 11.7505 12.7513 12.0863 12.7513 12.5005V17.5005C12.7513 17.9148 12.4155 18.2505 12.0013 18.2505C11.5871 18.2505 11.2513 17.9148 11.2513 17.5005V12.5005C11.2513 12.0863 11.5871 11.7505 12.0013 11.7505Z"
                                fill="#B00D15" fill-opacity="0.39" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.2716 3.99317C13.1797 2.39551 10.8229 2.3955 9.73089 3.99317L9.29897 4.62512C6.59293 8.58433 4.26797 12.791 2.35524 17.1886L2.26502 17.396C1.59097 18.9458 2.60933 20.7055 4.28888 20.8932C9.41451 21.4661 14.588 21.4661 19.7136 20.8932C21.3932 20.7055 22.4116 18.9458 21.7375 17.396L21.6473 17.1886C19.7346 12.7909 17.4096 8.58434 14.7036 4.62512L14.2716 3.99317ZM10.9693 4.83958C11.4656 4.11337 12.5369 4.11337 13.0332 4.83958L13.4652 5.47153C16.1178 9.35255 18.3968 13.4761 20.2718 17.7869L20.362 17.9943C20.6334 18.6184 20.2233 19.3269 19.547 19.4025C14.5321 19.963 9.47039 19.963 4.45549 19.4025C3.77919 19.3269 3.36913 18.6184 3.64055 17.9943L3.73076 17.7869C5.60572 13.4761 7.88476 9.35254 10.5374 5.47152L10.9693 4.83958Z"
                                fill="#B00D15" fill-opacity="0.39" />
                        </svg>

                    </span>
                    <span>Форма предназначена для внутреннего использования и заполнения данных для оформления
                        регистрационных документов</span>
                </div>
            </div>

            <form id="registrationForm" action="store">
                <!-- 1. Укажите предполагаемую организационно-правовую форму -->
                <div class="section">
                    <label class="section-label">1. Укажите предполагаемую организационно-правовую форму</label>
                    <select class="form-select" id="orgTypeSelect" name="organisation_type">
                        <option>Выберите организационно-правовую форму</option>
                        <option value="1">Общество с ограниченной ответственностью (ООО)</option>
                        <option value="2">Совместное предприятие (СП ООО)</option>
                        <option value="3">Иностранное предприятие (ИП ООО)</option>
                        <option value="4">Семейное предприятие (СП)</option>
                        <option value="5">Частное предпрятие (ЧП)</option>
                    </select>
                </div>

                <!-- 2. Напишите предполагаемое фирменное наименование организации -->
                <div class="section">
                    <label class="section-label">2. Напишите предполагаемое фирменное наименование организации</label>
                    <div class="form-note">
                        • Необходимо указать латинскими прописными буквами<br>
                        • Проверить свободна ли данное наименование можно через сайт <a href="https://new.birdarcha.uz/"
                            class="image-tooltip" target="_blank">https://new.birdarcha.uz/</a>
                    </div>
                    <input type="text" class="form-input mb-2" name="company_name"
                        placeholder="Основное наименование">
                </div>

                <!-- 3. Опишите вид деятельности -->
                <div class="section">
                    <label class="section-label">3. Опишите вид деятельности</label>
                    <input type="text" class="form-input" name="type_of_activity"
                        placeholder="Введите вид деятельности">
                    <div id="additionalActivities"></div>
                    <button type="button" class="add-button" id="addActivityBtn">+</button>
                </div>

                <!-- 4. Укажите юридический адрес по которому будет регистрироваться фирма -->
                <div class="section">
                    <label class="section-label">4. Укажите юридический адрес по которому будет регистрироваться фирма
                        (город, район, улица, дом, кв.) а так же, его кадастровый номер</label>
                    <input type="text" class="form-input" name="juridical_name"
                        placeholder="Введите юридический адрес" style="margin-bottom: 15px;">
                    <input type="text" class="form-input" name="cadastral_number" id="cadastralInput"
                        placeholder="00:00:00:00:00:0000" maxlength="19">
                </div>

                <!-- 5. Предполагаемый налоговый режим< -->
                <div class="section">
                    <label class="section-label">5. Предполагаемый налоговый режим</label>
                    <div class="tax-regime-container">
                        <div class="tax-option selected" data-value="general">
                            <input type="radio" name="tax_regime" value="general" checked>
                            <div class="tax-title">Общеустановленный налоговый режим</div>
                            <div class="tax-description">
                                <div>- Налог на добавленную стоимость 12%</div>
                                <div>- Налог на прибыль 15%</div>
                            </div>
                        </div>
                        <div class="tax-option" data-value="simplified">
                            <input type="radio" name="tax_regime" value="simplified">
                            <div class="tax-title">Упрощенный налоговый режим</div>
                            <div class="tax-description">
                                Налог с оборота - 4%<br><br>
                                Не допускается при данном налоговом режиме
                                <div>- оборот более 1млрд сум в год</div>
                                <div>- импорт товаров</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Размер Уставного фонда -->
                <div class="section input-ustav-fond">
                    <label class="section-label">6. Размер Уставного фонда</label>
                    <div class="form-note">
                        • Размер Уставного фонда указывается национальной валютой<br>
                        <div id="fourMillion" class="d-none ">
                            * Минимальный размер УФ для Иностранного и Совместного предприятия должен составлять не
                            менее 400 млн
                        </div>
                    </div>
                    <input type="text" id="ustavFond" class="form-input" name="capital_summa"
                        placeholder="Введите размер уставного фонда">
                    <div id="fourMillions" class="d-none fs-12 text-red italic"> Уставной фонд должен быть не менее
                        400
                        000 000 сум</div>
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
                    <div class="manager-grid">
                        <input type="text" name="head_name" class="form-input" placeholder="ФИО">
                        <input type="text" name="head_number" class="form-input" placeholder="Местный номер">
                        <input type="email" name="head_mail" class="form-input"
                            placeholder="Адрес электронной почты">
                    </div>
                </div>

                <!-- 10. Укажите телефон и электронную почту предприятия для указания в едином гос.реестре: -->
                <div class="section">
                    <label class="section-label">10. Укажите телефон и электронную почту предприятия для указания в
                        едином гос.реестре:</label>
                    <div class="contact-grid">
                        <input type="tel" name="organisation_phone" class="form-input"
                            placeholder="Телефон номер">
                        <input type="email" name="organisation_mail" class="form-input" placeholder="e-mail">
                    </div>
                </div>

                <!-- 11. Укажите дополнительную информацию, которую Вы считаете важно для -->
                <div class="section">
                    <label class="section-label">11. Укажите дополнительную информацию, которую Вы считаете важно для
                        нас при регистрации компании:</label>
                    <textarea class="form-textarea" name="note" rows="4" placeholder="Введите дополнительную информацию"></textarea>
                </div>

                <!-- Отправить -->
                <button type="submit" class="submit-button" id="submit">
                    <span>Отправить
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.8325 6.17463L8.10904 11.9592L1.59944 7.88767C0.66675 7.30414 0.860765 5.88744 1.91572 5.57893L17.3712 1.05277C18.3373 0.769629 19.2326 1.67283 18.9456 2.642L14.3731 18.0868C14.0598 19.1432 12.6512 19.332 12.0732 18.3953L8.10601 11.9602"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </form>
        </div>

        <div class="sidebar">
            <div class="logo-section">
                <div class="logo">
                    <img src="logo.png" alt="LegalAct" width="80%" height="100%">
                </div>
            </div>
            <div class="header-title">
                <h2>МЫ</h2>
            </div>
            <div class="team-section">
                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="image.png" alt="Руслан Берекеев">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Руслан Берекеев</h4>
                                <p>Генеральный директор</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/nodir_akhmedov.png" alt="Руслан Берекеев">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Нодир Ахмедов</h4>
                                <p>Заместитель ген. директора</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/muhammad_abdulnabiev.png" alt="Руслан Берекеев">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Мухаммад Абдулнабиев</h4>
                                <p>Финансовый директор</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/jahongir_allayarov.jpg" alt="Жахонгир Аллаяров">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Жахонгир Аллаяров</h4>
                                <p>Юрист</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/ekaterina_sibaeva.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Екатерина Сибаева</h4>
                                <p>Продажник</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/dildora_mirzayakubova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Дилдора Мирзаякубова</h4>
                                <p>Продажник</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/zafar_jumaev.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Зафар Жумаев</h4>
                                <p>Юристь</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/xusan_askarov.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Хусан Аскаров</h4>
                                <p>Глав. бухгалтер ООО</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/saidmurod_halilullaev.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Саидмурод Халилуллаев</h4>
                                <p>Бухгалтер 1-ое категории</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/feruza_ruzmatova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Феруза Рузматова</h4>
                                <p>Главный бухгалтер</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/aziz_odilov.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Азизбек Одилов</h4>
                                <p>ИТ специалист</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/aziza_normatova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Азиза Норматова</h4>
                                <p>Бухгалтер 1-ое категории</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/gulchexra.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Гулчехра Камилова</h4>
                                <p>Бухгалтер 1-ое категории</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/hayotxon_rahimova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Хаётхон Рахимова</h4>
                                <p>Главный бухгалтер</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/ezoza_mirahmatova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Эъзоза Мирахматова</h4>
                                <p>Бухгалтер 1-ое категории</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-title">
                    <h6>ВАША
                        КОМАНДА</h6>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ustavFond = document.getElementById('ustavFond');
        // Convert number to Russian ordinal
        function getOrdinalInRussian(number) {
            const ordinals = {
                1: '1-й',
                2: '2-й',
                3: '3-й',
                4: '4-й',
                5: '5-й',
                6: '6-й',
                7: '7-й',
                8: '8-й',
                9: '9-й',
                10: '10-й',
                11: '11-й',
                12: '12-й'
            };
            return ordinals[number] || `${number}-й`;
        }
        // Generate founder sections based on count
        function generateFounderSections(count) {
            const container = document.getElementById('foundersContainer');
            container.innerHTML = '';

            for (let i = 1; i <= count; i++) {
                const founderSection = document.createElement('div');
                founderSection.className = 'founder-section';
                founderSection.innerHTML = `
                    <div class="founder-title">${getOrdinalInRussian(i)} учредитель</div>
                    <select class="form-select organization-form-select founder-type" name="founders[${i}][type]">
                        <option>Выберите учредитель</option>
                        <option value="1">Физ. лицо (резидент)</option>
                        <option value="2">Юр лицо. (резидент)</option>
                        <option value="3">Иностранное физ.лицо</option>
                        <option value="4">Иностранное юр.лицо</option>
                    </select>
                    <div class="founder-grid">
                        <input type="text" class="form-input d-none" name="founders[${i}][country]" placeholder="Страна">
                        <input type="text" class="form-input d-none" name="founders[${i}][name]" placeholder="ФИО">
                        <input type="text" class="form-input d-none" name="founders[${i}][names]" placeholder="Наименование">
                        <input type="text" class="form-input d-none" name="founders[${i}][phone]" placeholder="Местный номер (при наличии)">
                        <input type="text" class="form-input d-none" name="founders[${i}][mail]" placeholder="Адрес электронной почты (при наличии)">
                        <input type="text" class="form-input d-none" name="founders[${i}][contact_name]" placeholder="ФИО Представителя (директора)">
                        <div class="d-none block"></div>
                        <div style="width:100%;display:block">
                            <div class="form-note d-none" id="percentName">Долевое участие (%)</div>
                            <input type="number" class="form-input founder-share percent d-none" value="${(100 / count).toFixed(2)}" name="founders[${i}][share]" placeholder="Долевое участие (%)" min="0" max="100">
                        </div>
                    </div>
                `;
                container.appendChild(founderSection);
            }

            const allPercents = container.querySelectorAll('.percent');
            allPercents.forEach((input, index) => {
                input.addEventListener('input', () => updateRemainingShares(allPercents, index));
            });

        }
        generateFounderSections(1);

        function updateRemainingShares(percentInputs, changedIndex) {
            let totalBeforeOrEqual = 0;

            for (let i = 0; i <= changedIndex; i++) {
                totalBeforeOrEqual += parseFloat(percentInputs[i].value) || 0;
            }

            const remaining = Math.max(0, 100 - totalBeforeOrEqual);

            const remainingInputs = [];
            for (let i = changedIndex + 1; i < percentInputs.length; i++) {
                remainingInputs.push(percentInputs[i]);
            }

            const sharePerRemaining = remainingInputs.length > 0 ?
                (remaining / remainingInputs.length) :
                0;

            remainingInputs.forEach(input => {
                input.value = sharePerRemaining.toFixed(2);
            });
        }


        function formatCadastralNumber(value) {
            const digits = value.replace(/\D/g, '');
            let formatted = '';
            for (let i = 0; i < digits.length && i < 16; i++) {
                if (i === 2 || i === 4 || i === 6 || i === 8 || i === 10) {
                    formatted += ':';
                }
                formatted += digits[i];
            }
            return formatted;
        }
        document.getElementById('foundersContainer').addEventListener('change', function(e) {
            if (e.target.classList.contains('organization-form-select')) {
                const percentName = document.getElementById('percentName');
                percentName.classList.remove('d-none');

                const section = e.target.closest('.founder-section');
                const inputs = section.querySelectorAll('.form-input');
                inputs.forEach(input => input.classList.remove('d-none'));

                const type = e.target.value;
                const blockElement = section.querySelector('.block');

                if (type === '1' || type === '3') {
                    section.querySelector('[name$="[contact_name]"]').classList.add('d-none');
                    section.querySelector('[name$="[names]"]').classList.add('d-none');
                    blockElement.classList.add('d-none');
                }

                if (type === '2' || type === '4') {
                    section.querySelector('[name$="[phone]"]').classList.add('d-none');
                    section.querySelector('[name$="[mail]"]').classList.add('d-none');
                    section.querySelector('[name$="[name]"]').classList.add('d-none');
                    blockElement.classList.remove('d-none');
                }
            }
        });


        document.getElementById('orgTypeSelect').addEventListener('change', function() {
            window.selectedOrgType = this.value;
        });

        function formatNumber(input) {
            return input.replace(/\D/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        }

        function parseNumber(input) {
            return Number(input.replace(/\s/g, ''));
        }

        ustavFond.addEventListener('input', function() {
            const numeric = parseNumber(this.value);
            this.value = formatNumber(numeric.toString());
            removeFormat = this.value.replace(/\D/g, '')
            const fourMillions = document.getElementById('fourMillions');
            const selected = orgTypeSelect.value;
            const submit = document.getElementById('submit');
            if (selected === '2' || selected === '3') {
                if (removeFormat < 400000000) {
                    console.log('error');
                    fourMillions.classList.add('d-block');
                    this.style.border = '1px solid red';
                    submit.disabled = true;
                    submit.classList.add('disabled');
                } else {
                    fourMillions.classList.remove('d-block');
                    this.style.border = '';
                    submit.disabled = false;
                    submit.classList.remove('disabled');
                }
            } else {
                this.style.border = '';
            }
        });

        document.getElementById('orgTypeSelect').addEventListener('change', function() {
            window.selectedOrgType = this.value;
            const fourMillion = document.getElementById('fourMillion');
            const numeric = parseNumber(ustavFond.value);
            if (this.value === '2' || this.value === '3') {
                fourMillion.classList.add('d-block');
                ustavFond.min = 400000000;
            } else {
                fourMillion.classList.remove('d-block');
                ustavFond.removeAttribute('min');
                ustavFond.style.border = '';
            }
        });

        // Global event delegation
        document.addEventListener('input', function(e) {
            if (e.target && e.target.matches('.percent')) {
                checkForeignShareLimit();
            }
        });

        document.addEventListener('change', function(e) {
            if (e.target && e.target.matches('.organization-form-select')) {
                checkForeignShareLimit();
            }
        });

        function checkForeignShareLimit() {
            const orgType = window.selectedOrgType;
            if (orgType !== '2') return; // Faqat SP ООО uchun

            const founderSections = document.querySelectorAll('.founder-section');
            let foreignTotal = 0;
            let localTotal = 0;
            const foreignInputs = [];
            const localInputs = [];
            const localErrors = [];
            const foreignErrros = [];
            founderSections.forEach(section => {
                const typeSelect = section.querySelector('.organization-form-select');
                const percentInput = section.querySelector('.percent');
                if (!typeSelect || !percentInput) return;

                const type = typeSelect.value;
                const share = parseFloat(percentInput.value) || 0;

                if (type === '3' || type === '4') {
                    foreignTotal += share;
                    foreignInputs.push(percentInput);
                } else if (type === '1' || type === '2') {
                    localTotal += share;
                    localInputs.push(percentInput);
                }
            });

            foreignInputs.forEach(input => {
                if (foreignTotal < 15) {
                    input.alert("Суммарная доля иностранных участников в СП ООО не должны быть меньше 15%");
                    input.reportValidity();
                } else {
                    input.setCustomValidity('');
                }
            });
            localInputs.forEach(input => {
                if (localTotal > 85) {
                    input.setCustomValidity(
                        "Суммарная доля резиденть участников в СП ООО не должны быть больше 85%");
                    input.reportValidity();
                } else {
                    input.setCustomValidity('');
                }
            });
        }

        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const orgType = document.getElementById('orgTypeSelect').value;
            // Faqat СП ООО bo'lsa tekshir
            if (orgType === '2') {
                let isValid = true;
                const founderBlocks = document.querySelectorAll('.founder-block');
                founderBlocks.forEach(block => {
                    const typeSelect = block.querySelector('select[name*="[type]"]');
                    const shareInput = block.querySelector('input[name*="[share]"]');
                    const typeValue = parseInt(typeSelect.value);
                    const shareValue = parseFloat(shareInput.value);
                    if ((typeValue === 3 || typeValue === 4) && shareValue < 15) {
                        isValid = false;
                        shareInput.classList.add('is-invalid');
                        const error = document.createElement('div');
                        error.className = 'invalid-feedback';
                        error.innerText = 'Для иностранных учредителей доля не может быть меньше 15%';
                        if (!shareInput.nextElementSibling) {
                            shareInput.after(error);
                        }
                    } else {
                        shareInput.classList.remove('is-invalid');
                        if (shareInput.nextElementSibling) {
                            shareInput.nextElementSibling.remove();
                        }
                    }
                });
                if (!isValid) {
                    e.preventDefault();
                    alert('Исправьте ошибки: доля иностранных учредителей должна быть не менее 15%');
                }
            }
        });
        document.getElementById('orgTypeSelect').addEventListener('change', function(e) {
            const selectedValue = e.target.value;
            const foundersContainer = document.getElementById('foundersContainer');
            const showOnlyForeign = selectedValue === '3'; // ИП ООО
            const sPage = selectedValue === '2'; // СП ООО

            foundersContainer.querySelectorAll('.organization-form-select').forEach(select => {
                select.querySelectorAll('option').forEach(option => {
                    const optionValue = option.value;
                    if (showOnlyForeign) {
                        option.hidden = !(optionValue === '3' || optionValue === '4');
                    } else {
                        option.hidden = false;
                    }
                });

                if (showOnlyForeign && !(select.value === '3' || select.value === '4')) {
                    select.value = '3'; // yoki select.selectedIndex = 0;
                }
            });
        });
        const cadastralInput = document.getElementById('cadastralInput');
        cadastralInput.addEventListener('input', function(e) {
            const formatted = formatCadastralNumber(e.target.value);
            e.target.value = formatted;
        });
        document.querySelectorAll('.tax-option').forEach(option => {
            option.addEventListener('click', () => {
                document.querySelectorAll('.tax-option').forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                option.querySelector('input[type="radio"]').checked = true;
            });
        });
        const allUnderOrEqual100 = Array.from(document.querySelectorAll('.percent')).every(el => {
            const value = parseFloat(el.value || el.textContent || '0');
            return !isNaN(value) && value <= 100;
        });
        if (!allUnderOrEqual100) {
            alert('Максимум 100.');
        }
        document.querySelectorAll('.founder-button').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.founder-button').forEach(btn => btn.classList.remove(
                    'selected'));
                button.classList.add('selected');
                const selectedCount = parseInt(button.getAttribute('data-count'));
                generateFounderSections(selectedCount);
            });
        });
        document.getElementById('addActivityBtn').addEventListener('click', () => {
            const additionalActivitiesContainer = document.getElementById('additionalActivities');
            const activityContainer = document.createElement('div');
            activityContainer.className = 'activity-input-container';
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'form-input';
            newInput.placeholder = 'Введите дополнительный вид деятельности';
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'remove-button';
            removeButton.innerHTML = '×';
            removeButton.title = 'Удалить поле';
            // Remove functionality
            removeButton.addEventListener('click', () => {
                activityContainer.remove();
            });
            activityContainer.appendChild(newInput);
            activityContainer.appendChild(removeButton);
            additionalActivitiesContainer.appendChild(activityContainer);
            // Focus on the new input
            newInput.focus();
        });
        // Form submission
        document.getElementById('registrationForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            // Simple validation
            const requiredFields = form.querySelectorAll('.form-input[required], .form-select[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'red';
                    isValid = false;
                } else {
                    field.style.borderColor = '#5570F1';
                }
            });

            if (!isValid) {
                alert('Пожалуйста, заполните все обязательные поля.');
                return;
            }

            try {
                const response = await fetch(form.action, {
                    method: form.method || 'POST',
                    body: formData,
                });

                if (response.ok) {
                    alert('Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.');
                    form.reset(); // optional: clear form
                } else {
                    alert('Произошла ошибка при отправке. Пожалуйста, попробуйте позже.');
                }
            } catch (error) {
                console.error('Ошибка:', error);
                alert('Сетевая ошибка. Пожалуйста, проверьте соединение и повторите попытку.');
            }
        });
        // Form field focus effects
        document.addEventListener('focusin', (e) => {
            if (e.target.matches('.form-input, .form-select, .form-textarea')) {
                e.target.style.borderColor = '#5570F1';
            }
        });
        document.addEventListener('focusout', (e) => {
            if (e.target.matches('.form-input, .form-select, .form-textarea')) {
                if (!e.target.value.trim()) {
                    e.target.style.borderColor = '#e9ecef';
                }
            }
        });
        const elements = document.querySelectorAll('.breakText');
        elements.forEach(p => {
            const words = p.textContent.trim().split(/\s+/);
            p.innerHTML = words.map(w => `${w}<br>`).join('');
        });
    </script>
    @include('sweetalert::alert')
</body>

</html>
