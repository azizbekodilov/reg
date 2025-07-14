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
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registration Application Form</title>
    @include('reg.style')
</head>

<body>
    <div class="container">
        <div class="main-content">
            <div class="call-wrapper">
                <div class="call-buton">
                    <button class="cc-calto-action-ripple"
                        onclick="sendTelegramMessage({{ $id }}, {{ $customer_id }})">
                        <img src="http://reg.legaldesk.uz/{{ $avatar }}" alt="">
                    </button>
                </div>
                <div style="margin-top: 1rem;text-align:center;font-size:12px">
                    {{ $manager }} <br>
                    Contact your manager <br> for assistance.
                </div>
            </div>
            <div class="form-header">
                <h1 class="form-title">Registration Application Form</h1>
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
                    <span>This form is intended for internal use and to enter data required for preparing registration documents.</span>
                </div>
            </div>

            <form id="registrationForm" action="/store" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="customer_service_id" value="{{ $customer_id }}">
                <!-- 1. Укажите предполагаемую организационно-правовую форму -->
                <div class="section">
                    <label class="section-label"><span class="text-red">*</span> 1. Specify the anticipated legal form of the organization</label>
                    <select class="form-select" id="orgTypeSelect" name="organisation_type">
                        <option>Select the legal form</option>
                        <option value="1">Limited Liability Company (LLC)</option>
                        <option value="2">Joint Venture (JV LLC)</option>
                        <option value="3">Foreign Company (FC LLC)</option>
                        <option value="4">Family Business (FB)</option>
                        <option value="5">Private Company (PC)</option>
                    </select>
                </div>

                <!-- 2. Enter the anticipated trade name of the organization -->
                <div class="section">
                    <label class="section-label">2. Enter the anticipated trade name of the organization</label>
                    <div class="form-note">
                        • Must be entered in uppercase Latin letters<br>
                        • You can check name availability at <a href="https://new.birdarcha.uz/"
                            class="image-tooltip" target="_blank">https://new.birdarcha.uz/</a>
                    </div>
                    <input type="text" class="form-input styled-input mb-2" name="company_name"
                        oninput="toggleFakePlaceholder(this)" placeholder="* Main name">
                </div>
                <!-- 3. Опишите вид деятельности -->
                <div class="section">
                    <label class="section-label">3. Describe the type of activity</label>
                    <input type="text" class="form-input" name="type_of_activity"
                        placeholder="* Describe the type of activity">
                    <div id="additionalActivities"></div>
                    <button type="button" class="add-button" id="addActivityBtn">+</button>
                </div>

                <!-- 4. Укажите юридический адрес по которому будет регистрироваться фирма -->
                <div class="section">
                    <label class="section-label">4. pecify the legal address where the company will be registered
                        (city, district, street, building, apartment) and the cadastral number.</label>
                    <input type="text" class="form-input" name="juridical_name"
                        placeholder="* Enter address" style="margin-bottom: 15px;">
                    <input type="text" class="form-input" name="cadastral_number" id="cadastralInput"
                        placeholder="* 00:00:00:00:00:0000" maxlength="19">
                </div>

                <!-- 5. Предполагаемый налоговый режим< -->
                <div class="section">
                    <label class="section-label">5. Expected tax regime</label>
                    <div class="tax-regime-container">
                        <div class="tax-option selected" data-value="general">
                            <input type="radio" name="tax_regime" value="general" checked>
                            <div class="tax-title">General tax regime</div>
                            <div class="tax-description">
                                <div>- VAT: 12%</div>
                                <div>- Profit tax: 15%</div>
                            </div>
                        </div>
                        <div class="tax-option" data-value="simplified">
                            <input type="radio" name="tax_regime" value="simplified">
                            <div class="tax-title">Simplified tax regime</div>
                            <div class="tax-description">
                                Turnover tax: 4%<br><br>
                                Not allowed if:
                                <div>- Turnover exceeds 1 billion UZS/year</div>
                                <div>- Importing goods</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Размер Уставного фонда -->
                <div class="section input-ustav-fond">
                    <label class="section-label">6. Authorized capital amount</label>
                    <div class="form-note">
                        • Specified in national currency<br>
                        <div id="fourMillion" class="d-none ">
                            * For foreign/joint ventures: minimum 400,000,000 UZS
                        </div>
                    </div>
                    <input type="text" id="ustavFond" class="form-input" name="capital_summa"
                        placeholder="* Enter the size of the authorized capital">
                    <div id="fourMillions" class="d-none fs-12 text-red italic"> For foreign/joint ventures: minimum 400,000,000 UZS</div>
                </div>

                <!-- 7. Количество учредителей -->
                <div class="section">
                    <label class="section-label">7. Number of founders</label>
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
                    <label class="section-label">8. Details of founders and their shares</label>
                    <div id="foundersContainer">
                        <!-- Founder sections will be dynamically generated here -->
                    </div>
                </div>

                <!-- 9. Details of the proposed Head of the Organization: -->
                <div class="section">
                    <label class="section-label">9. Details of the proposed Head of the Organization:</label>
                    <div class="manager-grid">
                        <input type="text" name="head_name" class="form-input" placeholder="* Full Name">
                        <input type="text" name="head_phone" class="form-input" placeholder="Local phone number">
                        <input type="email" name="head_mail" class="form-input"
                            placeholder="Email address">
                    </div>
                </div>

                <!-- 10. Company’s phone number and email for inclusion in the state register: -->
                <div class="section">
                    <label class="section-label">10. Company’s phone number and email for inclusion in the state register:</label>
                    <div class="contact-grid">
                        <input type="tel" name="organisation_phone" class="form-input"
                            placeholder="* Phone number">
                        <input type="email" name="organisation_mail" class="form-input" placeholder="Email address">
                    </div>
                </div>

                <!-- 11. Additional information you consider important for company registration -->
                <div class="section">
                    <label class="section-label">11. Additional information you consider important for company registration:</label>
                    <textarea class="form-textarea" name="note" rows="4" placeholder="Введите дополнительную информацию"></textarea>
                </div>
                <div class="section text-red font-italic text-underline">
                    <u>Please fill in all required fields marked with <b>*</b>.</u>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-button" id="submit">
                    <span>Submit
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
                            <img src="image.png" alt="Ruslan Berekeev">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Ruslan Berekeev</h4>
                                <p>General Director</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/nodir_akhmedov.png" alt="Nodir Akhmedov">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Nodir Akhmedov</h4>
                                <p>Deputy General Director</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/muhammad_abdulnabiev.png" alt="Muhammad Abdulnabiev">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Muhammad Abdulnabiev</h4>
                                <p>Financial Director</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/jahongir_allayarov.jpg" alt="Jahongir Allayarov">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Jahongir Allayarov</h4>
                                <p>Lawyer</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/feruza_ruzmatova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Feruza Ruzmatova</h4>
                                <p>Chief accountant</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/zafar_jumaev.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Zafar Jumaev</h4>
                                <p>Laywer</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/dildora_mirzayakubova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Dildora Mirzayakubova</h4>
                                <p>Sales Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/xusan_askarov.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Khusan Askarov</h4>
                                <p>Head. accountant LLC</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/saidmurod_halilullaev.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Saidmurod Khalilullaev</h4>
                                <p>Accountant 1st category</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/ekaterina_sibaeva.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Ekaterina Sibaeva</h4>
                                <p>Sales Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/aziz_odilov.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Azizbek Odilov</h4>
                                <p>IT specialist</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/gulchexra.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Gulchexra Kamilova</h4>
                                <p>HR manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/aziza_normatova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Aziza Normatova</h4>
                                <p>Accountant 1st category</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/hayotxon_rahimova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Kahyotkhon Rahimova</h4>
                                <p>Chief accountant</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/zuhra_mirzayeva.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Zuhra Mirzaeva</h4>
                                <p>Accountant 1st category</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="img/ezoza_mirahmatova.png">
                        </div>
                        <div class="member-info">
                            <div>
                                <h4 class="breakText">Ezoza Mirakhmatova</h4>
                                <p>Accountant 1st category</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-title">
                    <h6>YOURS TEAM</h6>
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
                        <option>Select founder</option>
                        <option value="1">Individual (resident)</option>
                        <option value="2">Legal entity (resident)</option>
                        <option value="3">Foreign individual</option>
                        <option value="4">Foreign legal entity</option>
                    </select>
                    <div class="founder-grid">
                        <input type="text" class="form-input d-none" name="founders[${i}][country]" placeholder="Страна">
                        <input type="text" class="form-input d-none" name="founders[${i}][name]" placeholder="* Name">
                        <input type="text" class="form-input d-none" name="founders[${i}][names]" placeholder="* Name">
                        <input type="text" class="form-input d-none" name="founders[${i}][phone]" placeholder="Local number (if available)">
                        <input type="text" class="form-input d-none" name="founders[${i}][mail]" placeholder="Email address (if available)">
                        <input type="text" class="form-input d-none" name="founders[${i}][contact_name]" placeholder="Full name of the Representative (Director)">
                        <div class="d-none block"></div>
                        <div style="width:100%;display:block">
                            <div class="form-note d-none" id="percentName">Equity participation (%)</div>
                            <input type="number" class="form-input founder-share percent d-none" value="${(100 / count).toFixed(2)}" name="founders[${i}][share]" placeholder="* Equity participation (%)" min="0" max="100">
                        </div>
                    </div>
                `;
                container.appendChild(founderSection);
            }

            const founderTypes = container.querySelectorAll('.founder-type');
            founderTypes.forEach((select, index) => {
                select.addEventListener('change', function() {
                    const section = select.closest('.founder-section');
                    const countryInput = section.querySelector(
                        `input[name="founders[${index + 1}][country]"]`);
                    if (this.value === '1' || this.value === '2') {
                        countryInput.value = 'Узбекистан';
                    } else {
                        countryInput.value = ''; // Ixtiyoriy: boshqa holatlarda bo‘sh qilsin
                    }
                });
            });

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
                    input.alert("The total share of foreign participants in a joint venture LLC must not be less than 15%");
                    input.reportValidity();
                } else {
                    input.setCustomValidity('');
                }
            });
            localInputs.forEach(input => {
                if (localTotal > 85) {
                    input.setCustomValidity(
                        "The total share of resident participants in a joint venture LLC should not be more than 85%");
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
                        error.innerText = 'For foreign founders, the share cannot be less than 15%';
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
                    alert('Correct the errors: the share of foreign founders must be at least 15%');
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
            alert('Maximum 100.');
        }

        function toggleFakePlaceholder(el) {
            const placeholder = document.getElementById('fake-placeholder');
            placeholder.style.display = el.value.length ? 'none' : 'block';
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
            newInput.placeholder = 'Enter an additional activity';
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'remove-button';
            removeButton.innerHTML = '×';
            removeButton.title = 'Remove button';
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
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please fill in all required fields.',
                });
                return;
            }

            try {
                const response = await fetch(form.action, {
                    method: form.method || 'POST',
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    },
                    body: formData,
                });

                if (response.ok) {
                    const data = await response.json();

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Your request has been sent..',
                        confirmButtonText: 'Close'
                    });

                    form.reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Server error',
                        text: 'Try again later or contact the manager',
                    });
                }
            } catch (error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Server error',
                    text: 'Try again later or contact the manager',
                });
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

        function sendTelegramMessage(checkId, customerId) {
            fetch(`/call/${checkId}/${customerId}`, {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Notifications have been sent to your manager.!',
                        text: data.message,
                        confirmButtonText: 'Close'
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Notifications have been sent to your manager..',
                        confirmButtonText: 'Close'
                    });
                });
        }
    </script>
    @include('sweetalert::alert')
</body>

</html>
