<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Parish Records Dashboard - Manage your church-related documents and requests easily">
    <meta name="author" content="Parish System">
    <title>Dashboard | Parish Records</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1995/1995542.png" type="image/png">
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/onclick.js') }}"></script>
    <style>
        :root {
            --bg: #f4f6f9;
            --text-main: #1e293b;
            --text-sub: #64748b;
            --primary: #4f46e5;
            --accent: #22d3ee;
            --white: #ffffff;
            --card: #ffffff;
            --shadow: rgba(0, 0, 0, 0.05);
            --radius: 12px;
            --card-hover-shadow: rgba(0, 0, 0, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(to right, #f5f7fa, #c3cfe2);
            display: flex;
            min-height: 100vh;
            background-color: var(--bg);
            color: var(--text-main);
            font-size: 16px;
            line-height: 1.5;
        }

        .sidebar {

            width: 260px;
            background-color: #1e293b;
            color: #fff;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo img {
            width: 32px;
            margin-right: 10px;
        }

        .logo span {
            font-size: 22px;
            font-weight: 600;
            color: #fff;
        }

        .nav a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 14px;
            margin-bottom: 10px;
            display: block;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .nav a:hover {
            background-color: #334155;
        }

        .sidebar-footer {
            font-size: 12px;
            text-align: center;
            color: #94a3b8;
        }

        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .header-info h1 {
            font-size: 28px;
            font-weight: 700;
            margin-left: 370px;
        }

        .header-info p {
            color: var(--text-sub);
            margin-top: 4px;
            margin-left: 380px;
        }

        .user-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--accent);
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .card {
            background-color: var(--card);
            padding: 24px;
            border-radius: var(--radius);
            box-shadow: 0 6px 18px var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px var(--card-hover-shadow);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: 600;
        }

        .card p {
            color: var(--text-sub);
            font-size: 14px;
        }

        .card button {
            margin-top: 15px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .main .card button:hover {
            opacity: 0.85;
        }

        #certificate-options {

 
            gap: 24px;
            margin-top: 40px;
        }

        .cert-card {
            padding: 30px;
            border-radius: var(--radius);
            color: #fff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cert-card h3 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .cert-card p {
            font-size: 14px;
            margin-bottom: 16px;
        }

        .cert-card button {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
            transition: background-color 0.3s ease;
        }

        .mian .cert-card button:hover {
            transform: translateY(-2px);
        }

        .cert-card.baptismal {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
        }

        .cert-card.marriage {
            background: linear-gradient(135deg, #f43f5e, #fb7185);
        }

        .cert-card.death {
            background: linear-gradient(135deg, #6b7280, #9ca3af);
        }

        .cert-card.confirmation {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main {
                padding: 20px;
            }

            .dashboard-cards,
            #certificate-options {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 1024px) {
            .logo span {
                font-size: 20px;
            }

            .header-info h1 {
                font-size: 24px;
            }
        }

        .form {
            margin-left: 300px;
            background: #ffffff;
            padding: 32px;
          
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            max-width: 720px;
            width: 100%;
            font-size: 16px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out both;
        }

        .form label {
            display: block;
            font-weight: 600;
            color: #1e293b;
            margin-top: 20px;
            margin-bottom: 6px;
            font-size: 15px;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="file"],
        form input[type="email"],
        form textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            background: #f9fafb;
            color: #1e293b;
            outline: none;
            transition: border 0.3s ease;
        }

        form input:focus,
        form textarea:focus {
            border-color: #4f46e5;
            background: #ffffff;
        }

        form textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form button[type="submit"] {
            margin-top: 30px;
            padding: 12px 24px;
            background: linear-gradient(to right, #4f46e5, #22d3ee);
            color: #ffffff;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.4);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .main form button[type="submit"]:hover {
            transform: translateY(-2px);
            background: linear-gradient(to right, #4338ca, #06b6d4);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            form {
                padding: 24px;
                border-radius: 12px;
            }
        }

        .enhanced-message {

            padding: 40px;
            border-radius: 16px;

            animation: fadeInUp 0.5s ease-out;
        }

        .enhanced-message .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .enhanced-message .icon {
            width: 60px;
            margin-bottom: 12px;
        }

        .enhanced-message h2 {
            font-size: 1.8rem;
            color: #1e293b;
        }

        .enhanced-message .subtext {
            font-size: 1rem;
            color: #64748b;
            font-style: italic;
        }

        .content-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            align-items: flex-start;
        }

        .text-content {
            flex: 1;
            min-width: 280px;
        }

        .text-content ul {
            margin-top: 10px;
            padding-left: 20px;
            color: #1e293b;
            line-height: 1.6;
        }

        .testimonial {
            background-color: #ffffff;
            border-left: 4px solid #4f46e5;
            margin-top: 20px;
            padding: 16px;
            font-style: italic;
            color: #475569;
            border-radius: 8px;
        }

        .testimonial cite {
            display: block;
            margin-top: 8px;
            font-style: normal;
            font-weight: 600;
            color: #1e293b;
        }

        .image-box {
            flex: 1;
            min-width: 280px;
            text-align: center;
        }

        .preview-image {
            width: 100%;
            max-width: 360px;
            border-radius: 12px;
         
        }

        #greeting {
            text-align: center;
            margin-left: 26rem;
        }

        .main .p {
            margin-left: 26rem;

        }

        .docreq {
            display: grid;
       
            grid-template-columns: repeat(2, 1fr);
            gap: 4rem;
            padding: 30px;
        }


        
    </style>
</head>

<body> <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="logo"> <img src="https://cdn-icons-png.flaticon.com/512/1995/1995542.png"
                    alt="Parish Records Logo"> <span>Parish Records</span> </div>
            <nav class="nav" aria-label="Main Navigation">
                <a id="documentRequest">📄 Request Document</a>
                <a id="statusRequest">📊 Request Status</a>
                <a id="mass">⛪ Mass Schedule</a>
                <a href="#">💖 Donate</a>
                <a href="#">📞 Contact</a>
            </nav>
        </div>
        <footer class="sidebar-footer" aria-label="Footer">© 2025 Parish System</footer>
    </div> <!-- Main Content -->
    <div id="main" class="main">
        <div id="home">Home</div>
        <header class="header">
            <div class="header-info">
                <h1 id="greeting">Welcome!</h1>
                <p class="p">Your records are safely stored and accessible here.</p>
            </div> <img src="{{ asset('img/kayi.png') }}" alt="User Photo" class="user-pic" loading="lazy">
        </header>
        <!-- Certificate Options Section -->
        <section id="certificate-options"></section>
    </div>


    <script>
        const csrfToken = "{{ csrf_token() }}";
        const loadRequestStatus = "{{ route('baptismrequest.userIndex') }}";
        const loadMass = "{{ route('mass.UserIndex') }}";

        const greeting = document.getElementById("greeting");
        const hour = new Date().getHours();
        if (hour < 12) greeting.textContent = "Good morning, Kyla!";
        else if (hour < 18) greeting.textContent = "Good afternoon, Kyla!";
        else greeting.textContent = "Good evening, Kyla!";

        const certificate_options = document.getElementById('certificate-options');
        const documentRequest = document.getElementById('documentRequest');
        const statusRequest = document.getElementById('statusRequest');

        const message = `
        <div class="enhanced-message">
            <div class="header">
        
                <h2>Smart Parish Certification System</h2>
                <p class="subtext">Reliable. Fast. Secure.</p>
            </div>
            <div class="content-grid">
                <div class="text-content">
                    <p>Welcome to a more efficient way to access your parish records. Our digital certification service helps you:</p>
                    <ul>
                        <li>📥 Request certificates in seconds</li>
                        <li>🔒 Ensure your data is safe and secure</li>
                        <li>🕐 Save time with fast processing</li>
                        <li>📄 Get downloadable, verifiable documents</li>
                    </ul>
                    <div class="testimonial">
                        <blockquote>“It was incredibly easy to get my baptismal certificate. Highly recommended!”</blockquote>
                        <cite>– Juan S., Parish Member</cite>
                    </div>
                </div>
                <div class="image-box">
                    <img src="https://cdn-icons-png.flaticon.com/512/921/921347.png" alt="Parish Records" class="preview-image">
                </div>
            </div>
        </div>
    `;

        // Initially show message
        certificate_options.innerHTML = message;
        let currentView = 'message'; // Possible values: 'message', 'certificate', 'status', 'mass'

        documentRequest.addEventListener('click', () => {
            if (currentView === 'certificate') {
                certificate_options.innerHTML = message;
                document.getElementById('home').innerHTML = 'Home';
                currentView = 'message';
            } else {
                showCertificateOptions();
                currentView = 'certificate';
            }
        });

        statusRequest.addEventListener('click', () => {
            if (currentView === 'status' || currentView === showMass()) {
                certificate_options.innerHTML = message;

                currentView = 'message';
            } else {
                showRequestStatus();
                currentView = 'status';
            }
        });

        mass.addEventListener('click', () => {
            if (currentView === 'mass') {
                certificate_options.innerHTML = message;
                currentView = 'message';
            } else {
                showMass();
                currentView = 'mass';
            }
        });

        function showCertificateOptions() {
            document.getElementById('home').innerHTML = 'Home/ Request Certificate';
            certificate_options.style.display = 'grid';
            certificate_options.innerHTML = `
              <div class="docreq">
            <div class="cert-card baptismal">
                <h3>📜 Baptismal Certificate</h3>
                <p>Request your official baptismal record.</p>
                <button onclick="showForm('baptism')">Request</button>
            </div>
            <div class="cert-card confirmation">
                <h3>🕊️ Confirmation Certificate</h3>
                <p>Request your church confirmation certificate.</p>
                <button onclick="showForm('confirmation')">Request</button>
            </div>
            <div class="cert-card marriage">
                <h3>💍 Marriage Certificate</h3>
                <p>Get a copy of your church marriage certificate.</p>
                <button onclick="showForm('marriage')">Request</button>
            </div>
            <div class="cert-card death">
                <h3>⚰️ Death Certificate</h3>
                <p>Obtain a parish-issued death record.</p>
                <button onclick="showForm('death')">Request</button>
            </div>
              </div>
        `;
        }

        function showRequestStatus() {
            const container = document.getElementById('certificate-options');
            document.getElementById('home').innerHTML = 'Home/ Request Status';
            fetch(loadRequestStatus)
                .then(response => response.text())
                .then(html => {
                    container.innerHTML = html;
                    currentView = 'status';
                })
                .catch(error => {
                    console.error('Error loading request status:', error);
                    container.innerHTML = '<p>Error loading data.</p>';
                });
        }

        function showMass() {
            const container = document.getElementById('certificate-options');
            document.getElementById('home').innerHTML = 'Home/ Mass Schedule';
            fetch(loadMass)
                .then(response => response.text())
                .then(html => {
                    container.innerHTML = html;
                    currentView = 'status';
                })
                .catch(error => {
                    console.error('Error loading request status:', error);
                    container.innerHTML = '<p>Error loading data.</p>';
                });
        }

        function showForm(type) {
            const formTitles = {
                baptism: 'Baptism Certificate Request Form',
                confirmation: 'Confirmation Certificate Request Form',
                marriage: 'Marriage Certificate Request Form',
                death: 'Death Certificate Request Form'
            };

            const formActions = {
                baptism: "{{ route('baptismrequest.store') }}",
                confirmation: "{{ route('confirmationrequest.store') }}",
                marriage: "{{ route('marriagerequest.store') }}",
                death: "{{ route('deathrequest.store') }}"
            };

            const formMethods = {
                baptism: 'POST',
                confirmation: 'POST',
                marriage: 'POST',
                death: 'POST'
            };

            const formFields = {
                baptism: `
             <label> Requester:</label><input name="requester" type="text" required><br>
            <label>Child Name:</label><input name="childName" type="text" required><br>
            <label>Date of Birth:</label><input name="dob" type="date" required><br>
            <label>Date of Baptism (approx.):</label><input name="baptismDate" type="text" required><br>
            <label>Place of Baptism:</label><input name="baptismPlace" type="text" required><br>
            <label>Parents' Full Names:</label><input name="parentsNames" type="text" required><br>
            <label>Purpose of the Request:</label><input name="purpose" type="text" required><br>
            <label>Your Contact Info:</label><input name="contact" type="text" required><br>
            <label>Relationship to Baptized:</label><input name="relationship" type="text"><br>
            <label>ID Proof (if needed):</label><input name="idProof" type="file"><br>
        `,
                confirmation: `
            <label> Requester:</label><input name="requester" type="text" required><br>
            <label>Full Name of Confirmed Person:</label><input name="confirmedName" type="text" required><br>
            <label>Date of Birth:</label><input name="dob" type="date" required><br>
            <label>Date of Confirmation (approx.):</label><input name="confirmationDate" type="text" required><br>
            <label>Place of Confirmation:</label><input name="confirmationPlace" type="text" required><br>
            <label>Parents' Full Names:</label><input name="parentsNames" type="text"><br>
            <label>Sponsor's Name:</label><input name="sponsorName" type="text"><br>
            <label>Reason for Request:</label><input name="reason" type="text" required><br>
            <label>Your Contact Info:</label><input name="contact" type="text" required><br>
            <label>Relationship to Confirmed:</label><input name="relationship" type="text"><br>
            <label>ID Proof (if needed):</label><input name="idProof" type="file"><br>
        `,
                marriage: `
            <label> Requester:</label><input name="requester" type="text" required><br>
            <label>Full Name (Spouse 1):</label><input name="spouse1" type="text" required><br>
            <label>Full Name (Spouse 2):</label><input name="spouse2" type="text" required><br>
            <label>Date of Marriage:</label><input name="marriageDate" type="date" required><br>
            <label>Place of Marriage:</label><input name="marriagePlace" type="text" required><br>
            <label>Officiant Name (if known):</label><input name="officiant" type="text"><br>
            <label>Purpose of the Request:</label><input name="purpose" type="text" required><br>
            <label>Your Contact Info:</label><input name="contact" type="text" required><br>
            <label>Relationship to Couple:</label><input name="relationship" type="text"><br>
            <label>ID Proof (if needed):</label><input name="idProof" type="file"><br>
        `,
                death: `
            <label> Requester:</label><input name="requester" type="text" required><br>
            <label>Full Name of Deceased:</label><input name="fullName" type="text" required><br>
            <label>Date of Death (approx.):</label><input name="deathDate" type="text" required><br>
            <label>Place of Death:</label><input name="deathPlace" type="text" required><br>
            <label>Date of Birth / Age at Death:</label><input name="dobOrAge" type="text"><br>
            <label>Parents' Names (if known):</label><input name="parentsNames" type="text"><br>
            <label>Spouse's Name (if applicable):</label><input name="spouseName" type="text"><br>
            <label>Purpose of Request:</label><input name="purpose" type="text" required><br>
            <label>Your Contact Info:</label><input name="contact" type="text" required><br>
            <label>Relationship to Deceased:</label><input name="relationship" type="text"><br>
            <label>ID Proof (if needed):</label><input name="idProof" type="file"><br>
        `
            };

            // Assuming csrfToken is already passed from Blade to JS
            const csrfToken = "{{ csrf_token() }}";

             const mainDiv = document.getElementById('certificate-options');
            mainDiv.innerHTML = `
                <header class="header">
                    <div class="header-info">
                        <h1>${formTitles[type]}</h1>
                        <p>Please fill out the details below to request your certificate.</p>
                    </div>
                </header>
                <form class="form"
                    style="background:#fff; padding:24px; border-radius:12px; max-width:600px;" 
                    action="${formActions[type]}" 
                    method="${formMethods[type]}" 
                    enctype="multipart/form-data"
                >
                    <input type="hidden" name="_token" value="${csrfToken}">
                    ${formFields[type]}
                    <br>
                    <button type="submit" style="margin-top:20px; background: linear-gradient(to right, #4f46e5, #22d3ee); color: white; padding: 10px 16px; border: none; border-radius: 8px; font-weight: 600;">
                        Submit Request
                    </button>
                </form>
            `;
             }
    </script>

</body>

</html>
