<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .form-input::placeholder::first-letter {
        color: red;
    }

    .form-input::placeholder {
        color: #adb5bd;
    }

    .text-underline {
        text-decoration-style: underline;
    }

    body {
        font-family: "Inter", sans-serif;
        background: #ffffff;
        color: #333;
        line-height: 1.6;
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

    .montserrat {
        font-family: 'Montserrat', sans-serif;
    }

    .position-relative {
        position: relative;
    }

    .input-required {
        color: red;
        position: absolute;
        top: 0.8rem;
        left: 10px;
    }

    .container {
        display: flex;
        min-height: 100vh;
        min-width: 1400px;
        max-width: 1400px;
        width: 100%;
        margin: 0 auto;
    }

    .header-title {
        text-align: center;
        font-family: 'Montserrat', sans-serif;
        color: #fff;
        font-size: 46px;
        min-height: 120px;
        background: #B00D15;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
    }

    .header-title h2 {
        font-weight: 500;
        font-family: 'Montserrat', sans-serif;
    }

    .main-content {
        flex: 1;
        padding: 20px 40px;
        max-width: 82%;
        background: white;
        position: relative;
    }

    .sidebar {
        width: 18%;
        background: #C7C8CA;
        border: 1px solid #ccc;
        color: white;
        overflow-y: auto;
        position: relative;
    }

    .form-header {
        margin-top: 20px;
        margin-bottom: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        line-height: 16px;
    }

    .form-title {
        font-size: 24px;
        font-weight: 400;
        margin-bottom: 15px;
        color: #2c3e50;
        width: 50%;
    }

    .form-subtitle {
        color: #ABAFB1;
        font-size: 15px;
        gap: 10px;
        display: flex;
        width: 50%;
    }

    .warning-icon {
        color: #f39c12;
        font-size: 16px;
        margin-top: 1px;
    }

    .section {
        margin-bottom: 20px;
        position: relative;
    }

    .section-label {
        display: block;
        margin-bottom: 12px;
        font-weight: 400;
        color: #5E6366;
        font-size: 14px;
    }

    .section select {
        -moz-appearance: none;
        /* Firefox */
        -webkit-appearance: none;
        /* Safari and Chrome */
        appearance: none;
        background: transparent;
        background-image: url('img/vector.svg');
        background-repeat: no-repeat;
        background-position-y: 20px;
        background-position-x: 98%;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        font-size: 16px;
        color: #2b2f32;
        background: white;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #5570F1;
        /* box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.1); */
    }


    .form-note {
        font-size: 13px;
        color: #ABAFB1;
        margin: 8px 0;
    }

    .form-note a {
        color: #007bff;
        text-decoration: none;
    }

    .form-note a:hover {
        text-decoration: underline;
    }

    .image-tooltip {
        position: relative;
        display: inline-block;
        color: blue;
        text-decoration: none;
    }

    .image-tooltip::after {
        content: "";
        position: absolute;
        top: 120%;
        left: 50%;
        transform: translateX(-50%);
        width: 400px;
        height: 300px;
        background-image: url('birdarcha.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        display: none;
        z-index: 999;
    }

    .image-tooltip:hover::after {
        display: block;
    }

    .add-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border: 2px solid #5E6366;
        background: #f8f9fa;
        border-radius: 4px;
        cursor: pointer;
        color: #5E6366;
        font-size: 20px;
        font-weight: bold;
        transition: all 0.3s ease;
        margin-top: 15px;
    }

    .add-button:hover {
        border-color: #5570F1;
        color: #5570F1;
        background: #fff5f5;
    }

    .activity-input-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 15px;
    }

    .activity-input-container .form-input {
        flex: 1;
        margin-top: 0;
    }

    .remove-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border: 2px solid #dc3545;
        background: #fff5f5;
        border-radius: 8px;
        cursor: pointer;
        color: #dc3545;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .remove-button:hover {
        background: #dc3545;
        color: white;
    }

    .tax-regime-container {
        display: flex;
        gap: 20px;
        margin-top: 15px;
    }

    .ul li {
        list-style: none;
    }

    .tax-option {
        flex: 1;
        padding: 10px 20px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .tax-option input[type="radio"] {
        position: absolute;
        top: 15px;
        left: 15px;
        width: 18px;
        height: 18px;
        accent-color: #5570F1;
        border-radius: 30%;
        border: 1px solid #ABAFB1;
    }

    .tax-title {
        font-weight: 400;
        margin-bottom: 10px;
        margin-left: 30px;
        color: #2c3e50;
    }

    .tax-description {
        font-size: 13px;
        color: #6c757d;
        margin-left: 30px;
        line-height: 1.4;
    }

    .mb-2 {
        margin-bottom: 10px;
    }

    input[type=radio] {
        appearance: none;
        background-color: #fff;
        width: 15px;
        height: 15px;
        border: 2px solid #ccc;
        border-radius: 2px;
        display: inline-grid;
        place-content: center;
    }

    input[type=radio]::before {
        content: "";
        width: 10px;
        height: 10px;
        transform: scale(0);
        transform-origin: bottom left;
        background-color: #fff;
        clip-path: polygon(13% 50%, 34% 66%, 81% 2%, 100% 18%, 39% 100%, 0 71%);
    }

    input[type=radio]:checked::before {
        transform: scale(1);
    }

    input[type=radio]:checked {
        background-color: #5570F1;
        border: 2px solid #5570F1;
    }

    .founders-grid {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 15px;
    }

    .founder-button {
        width: 50px;
        height: 50px;
        border: 2px solid #e9ecef;
        background: white;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .founder-button:hover {
        border-color: #5570F1;
        color: #5570F1;
    }

    .founder-button.selected {
        border-color: #5570F1;
        background: #5570F1;
        color: white;
    }

    .founder-section {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.3s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .founder-title {
        font-weight: 600;
        margin-bottom: 20px;
        color: #2c3e50;
        font-size: 16px;
        margin-top: 10px;
    }

    .founder-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 15px;
        margin-top: 15px;
    }

    .manager-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 15px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .submit-button {
        background: #2B2F32;
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 10px;
        font-size: 20px;
        font-weight: 400;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(44, 62, 80, 0.3);
        margin: auto;
    }

    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(44, 62, 80, 0.4);
    }

    .submit-button.disabled {
        opacity: .5;
        cursor: not-allowed;
        pointer-events: none;
    }

    .submit-button span {
        display: flex;
        align-items: center;
    }

    .submit-button svg {
        margin-left: 10px;
    }

    .d-none {
        display: none;
    }

    .d-block {
        display: block;
    }

    /* Sidebar Styles */
    .logo-section {
        text-align: center;
        padding: 20px 20px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .logo {
        font-size: 28px;
        font-weight: bold;
        margin-top: 5px;
    }

    .team-title {
        font-size: 32px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .team-grid {
        display: flex;
        flex-direction: column;
    }

    .team-member {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 120px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .team-member:nth-child(even) {
        display: flex;
        flex-direction: row-reverse;
    }

    .member-photo {
        width: 50%;
        height: 100%;
        overflow: hidden;
    }

    .member-photo img {
        width: 100%;
        height: 100%;
        background-size: cover;
        object-fit: cover;
        transition: 0.3s;
    }
    .member-photo img:hover {
        transform: scale(1.08);
    }

    .member-photo:nth-child(2) {
        width: 50%;
        height: 100%;
        offset: 2;
    }

    .member-info {
        background: #636366;
        width: 50%;
        height: 100%;
        display: table;
        position: relative;
        margin: auto auto;
        padding: 0 10px;
        color: white;
        text-align: left;
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
    }

    .team-member:nth-child(2n-1) .member-info {
        background: #C7C8CA;
    }

    .team-member:nth-child(3n-1) .member-info {
        background: #B00D15;
    }

    .member-info div {
        display: table-cell;
        vertical-align: middle;
        font-family: "Montserrat", sans-serif;
    }

    .team-member:nth-child(even) .member-info {
        text-align: right;
    }

    .member-info h4 {
        width: 100%;
        font-size: 14px;
        margin-bottom: 5px;
        line-height: 16px;
        font-weight: 400;
        font-family: "Montserrat", sans-serif;
        color: #fff;
    }

    .member-info p {
        font-size: 12px;
        opacity: 0.9;
        line-height: 1.3;
        color: #fff;
        font-family: "Montserrat", sans-serif;
        font-weight: 300;
    }

    .your-team-section {
        background: rgba(0, 0, 0, 0.2);
        margin: 0 20px;
        border-radius: 15px;
        padding: 25px 20px;
    }

    .your-team-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        background: linear-gradient(45deg, #fff, #f0f0f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .container {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            order: -1;
        }

        .founder-grid {
            grid-template-columns: 1fr 1fr;
        }

        .manager-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }

        .tax-regime-container {
            flex-direction: column;
        }

        .founder-grid {
            grid-template-columns: 1fr;
        }

        .founders-grid {
            justify-content: center;
        }
    }

    .text-red {
        color: red;
    }

    .italic {
        font-style: italic;
    }

    .fs-12 {
        font-size: 12px;
    }

    .call-wrapper {
        z-index: 99999;
        position: fixed;
        left: 1rem;
        top: 8rem;
        background: #ffffff;

    }

    .call-buton .cc-calto-action-ripple {
        background: #000000;
        width: 10rem;
        height: 10rem;
        border-radius: 100%;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #ffffff;
        -webkit-animation: cc-calto-action-ripple 0.6s linear infinite;
        animation: cc-calto-action-ripple 0.6s linear infinite;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        justify-items: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
    }

    .call-buton img {
        width: 10rem;
        height: 10rem;
        object-fit: cover;
        background-position: center;


    }

    .call-buton .cc-calto-action-ripple i {
        -webkit-transition: 0.3s ease;
        transition: 0.3s ease;
        font-size: 2.2rem;
    }

    .call-buton .cc-calto-action-ripple:hover i {
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
    }

    @-webkit-keyframes cc-calto-action-ripple {
        0% {
            -webkit-box-shadow: 0 4px 10px rgba(43, 41, 37, 0.2), 0 0 0 0 rgba(236, 0, 0, 0.2), 0 0 0 5px rgba(236, 0, 0, 0.2), 0 0 0 10px rgba(236, 139, 0, 0.2);
            box-shadow: 0 4px 10px rgba(35, 34, 34, 0.2), 0 0 0 0 rgba(236, 0, 0, 0.2), 0 0 0 5px rgba(236, 0, 0, 0.2), 0 0 0 10px rgba(236, 139, 0, 0.2);
        }

        100% {
            -webkit-box-shadow: 0 4px 10px rgba(236, 139, 0, 0.2), 0 0 0 5px rgba(236, 0, 0, 0.2), 0 0 0 10px rgba(236, 0, 0, 0.2), 0 0 0 20px rgba(236, 139, 0, 0);
            box-shadow: 0 4px 10px rgba(236, 139, 0, 0.2), 0 0 0 5px rgba(236, 139, 0, 0.2), 0 0 0 10px rgba(236, 139, 0, 0.2), 0 0 0 20px rgba(236, 139, 0, 0);
        }
    }

    @keyframes cc-calto-action-ripple {
        0% {
            -webkit-box-shadow: 0 4px 10px rgba(236, 139, 0, 0.2), 0 0 0 0 rgba(20, 17, 13, 0.2), 0 0 0 5px rgba(236, 0, 0, 0.2), 0 0 0 10px rgba(236, 0, 0, 0.2);
            box-shadow: 0 4px 10px rgba(236, 139, 0, 0.2), 0 0 0 0 rgba(236, 0, 0, 0.2), 0 0 0 5px rgba(236, 0, 0, 0.2), 0 0 0 10px rgba(236, 0, 0, 0.2);
        }

        100% {
            -webkit-box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2), 0 0 0 5px rgba(236, 0, 0, 0.2), 0 0 0 10px rgba(236, 0, 0, 0.2), 0 0 0 20px rgba(236, 139, 0, 0);
            box-shadow: 0 4px 10px rgba(20, 20, 20, 0.2), 0 0 0 5px rgba(236, 0, 0, 0.2), 0 0 0 10px rgba(236, 0, 0, 0.2), 0 0 0 20px rgba(236, 139, 0, 0);
        }
    }

    span.num {
        position: absolute;
        color: #000000;
        bottom: -10%;
    }
</style>
