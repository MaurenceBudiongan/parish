<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <title>Admin-Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="app">
        <header class="app-header">
            <div class="app-header-logo">
                <div class="logo">
                    <span class="logo-icon">
                        <img src="assets/Trinidad.jpg" />
                    </span>
                    <h1 class="logo-title">
                        <span>San Pascual_Parish</span>
                        <span>Record & Request</span>
                    </h1>
                </div>
            </div>
            <div class="app-header-navigation">
                <div class="tabs">
                    <a href="#" onclick="showParishionerRecord()">Parishioner</a>
                    <a href="#">Event Management</a>
                    <a href="#">Staff Management</a>
                    <a href="">Reports and Analytics </a>
                </div>
            </div>
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>Jerlyn Kyla Orpilla</span>
                    <span>
                        <img src="{{ asset('img/maria.png') }}" />
                    </span>
                </button>
                <div class="app-header-actions-buttons">
                    <button onclick="goToSignOutPage()" class="icon-button large">
                        <i class="ph-sign-out"></i>
                    </button>

                    <button class="icon-button large">
                        <i class="ph-chat-circle-dots"></i>
                    </button>
                </div>
            </div>
            <div class="app-header-mobile">
                <button class="icon-button large" id="toggleBtn">
                    <i class="ph-list"></i>
                </button>
            </div>
        </header>

        <div class="app-body">
            <div id="app-body-navigation" class="app-body-navigation">
                <nav class="navigation">
                    <a class="a"href="">
                        <i class="ph-browsers"></i>
                        <span id="dashboard">Dashboard</span>
                    </a>


                    <div class="dropdown">
                        <a class="a" href="javascript:void(0);" onclick="createtoggleDropdown()">
                            <i class="ph-record"></i>
                            <span>Create Record</span>
                        </a>
                        <div id="createdropdownmenu" class="dropdown-menu">
                            <a href="#" onclick="showParishionerCreate()">Parishioner</a>
                            <a href="#" onclick="showBaptistCreate()">Baptist</a>
                            <a href="#" onclick="showConfirmationCreate()">Confirmation</a>
                            <a href="#" onclick="showMarriageCreate()">Marriage</a>
                            <a href="#" onclick="showDeathCreate()">Death</a>
                            <a href="#" onclick="showDonationCreate()">Donation</a>
                            <a href="#" onclick="showMassCreate()">Mass/Service Scheduling</a>
                            <a href="#" onclick="showEventCreate()">Event Announcements</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <a class="a" href="javascript:void(0);" onclick="toggleDropdown()">
                            <i class="ph-check-square"></i>
                            <span>Member Record</span>
                        </a>
                        <div id="dropdownmenu" class="dropdown-menu">
                            <a href="#" onclick="showBaptistRecord()">Baptist Record</a>
                            <a href="#" onclick="showConfirmationRecord()">Confirmation Record</a>
                            <a href="#" onclick="showMarriageRecord()">Marriage Record</a>
                            <a href="#" onclick="showDeathRecord()">Death Record</a>
                        </div>
                    </div>
                    <a class="a" href="#"onclick="showDocumentRequest()">
                        <i class="ph-swap"></i>
                        <span>Sacramental Record</span>
                    </a>
                    <div class="dropdown">
                        <a class="a" href="javascript:void(0);" onclick="financialtoggleDropdown()">
                            <i class="ph-file-text"></i>
                            <span>Financial Record</span>
                        </a>
                        <div id="financialdropdownmenu" class="dropdown-menu">
                            <a href="#" onclick="showBaptistRecord()">Payment Transaction</a>
                            <a href="#" onclick="showDonationRecord()">Donation</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="a" href="javascript:void(0);" onclick="eventtoggleDropdown()">
                            <i class="ph-globe"></i>
                            <span>Event Record</span>
                        </a>
                        <div id="eventdropdownmenu" class="dropdown-menu">
                            <a href="#" onclick="showMassRecord()">Mass & Service Scheduling</a>
                            <a href="#" onclick="showEventRecord()">Event Announcements</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="a" href="javascript:void(0);" onclick="clergytoggleDropdown()">
                            <i class="ph-file-plus"></i>
                            <span>Clergy & Staff </span>
                        </a>
                        <div id="clergydropdownmenu" class="dropdown-menu">
                            <a href="#" onclick="">Priest Assignment</a>
                            <a href="#" onclick="">Staff Profile</a>
                        </div>
                    </div>
                    <a class="a" href="#transfer-section">
                        <i class="ph-clipboard-text"></i>
                        <span>Report Analytics</span>
                    </a>
                </nav>
            </div>
            <div id="maincontent" class="app-body-main-content">
            </div>
            <div class="app-body-sidebar">
                <section id="payment-section" class="payment-section">
                    <h2>Recent Payment</h2>
                    <div class="payment-section-header">
                        <p>Choose a e-wallet to pay request</p>
                        <div>
                            <button class="card-button mastercard">
                                <img src="{{ asset('img/gcash-logo.png') }}" alt="gcash" />
                            </button>
                            <button class="card-button visa">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2500" height="2500"
                                    viewBox="0 0 141.732 141.732">
                                    <g fill="currentColor">
                                        <path
                                            d="M62.935 89.571h-9.733l6.083-37.384h9.734zM45.014 52.187L35.735 77.9l-1.098-5.537.001.002-3.275-16.812s-.396-3.366-4.617-3.366h-15.34l-.18.633s4.691.976 10.181 4.273l8.456 32.479h10.141l15.485-37.385H45.014zM121.569 89.571h8.937l-7.792-37.385h-7.824c-3.613 0-4.493 2.786-4.493 2.786L95.881 89.571h10.146l2.029-5.553h12.373l1.14 5.553zm-10.71-13.224l5.114-13.99 2.877 13.99h-7.991zM96.642 61.177l1.389-8.028s-4.286-1.63-8.754-1.63c-4.83 0-16.3 2.111-16.3 12.376 0 9.658 13.462 9.778 13.462 14.851s-12.075 4.164-16.06.965l-1.447 8.394s4.346 2.111 10.986 2.111c6.642 0 16.662-3.439 16.662-12.799 0-9.72-13.583-10.625-13.583-14.851.001-4.227 9.48-3.684 13.645-1.389z" />
                                    </g>
                                    <path
                                        d="M34.638 72.364l-3.275-16.812s-.396-3.366-4.617-3.366h-15.34l-.18.633s7.373 1.528 14.445 7.253c6.762 5.472 8.967 12.292 8.967 12.292z"
                                        fill="currentColor" />
                                    <path fill="none" d="M0 0h141.732v141.732H0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="payments">
                        <div class="payment">
                            <div class="card green">
                                <span>02/25</span>
                                <span> •••• 8394 </span>
                            </div>
                            <div class="payment-details">
                                <h3>Jerlyn</h3>
                                <div>
                                    <span>₱ 70</span>
                                    <button class="icon-button">
                                        <i class="ph-caret-right-bold"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="card olive">
                                <span>03/25</span>
                                <span> •••• 3765 </span>
                            </div>
                            <div class="payment-details">
                                <h3>Mary</h3>
                                <div>
                                    <span>₱ 90</span>
                                    <button class="icon-button">
                                        <i class="ph-caret-right-bold"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="card gray">
                                <span>03/25</span>
                                <span> •••• 6583 </span>
                            </div>
                            <div class="payment-details">
                                <h3>Angelica</h3>
                                <div>
                                    <span>₱ 50</span>
                                    <button class="icon-button">
                                        <i class="ph-caret-right-bold"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faq">
                        <p>Most frequently asked questions</p>
                        <div>
                            <label>Question</label>
                            <input type="text" placeholder="Type here" />
                        </div>
                    </div>
                    <div class="payment-section-footer">
                        <button class="save-button">Save</button>
                        <button class="settings-button">
                            <i class="ph-gear"></i>
                            <span>More settings</span>
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script src="https://unpkg.com/phosphor-icons"></script>
    <script>
        function goToSignOutPage() {
            window.location.href = "{{ route('authentication.adminform') }}";
        }
        document.getElementById('toggleBtn').addEventListener('click', function() {
            const div = document.getElementById('app-body-navigation');
            if (div.style.display === 'none' || div.style.display === '') {
                div.style.display = 'block'; // or 'flex' if using flex layout
            } else {
                div.style.display = 'none';
            }
        });
         const loadBaptismalCreate = "{{ route('baptismals.create') }}";
        //
        const loadBaptistCreate = "{{ route('baptismal.create') }}";
        const loadBaptistRecord = "{{ route('admin.baptismal.index') }}";
        const loadConfirmationCreate = "{{ route('confirmation.create') }}";
        const loadConfirmationRecord = "{{ route('confirmation.index') }}";
        const loadParishionerRecord = "{{ route('parishioners.index') }}";
        const loadMarriageCreate = "{{ route('marriage.create') }}";
        const loadMarriageRecord = "{{ route('marriage.index') }}";
        const loadDeathCreate = "{{ route('death.create') }}";
        const loadDeathRecord = "{{ route('death.index') }}";
        const loadDonationCreate = "{{ route('donation.create') }}";
        const loadDonationRecord = "{{ route('donation.index') }}";
        const loadMassCreate = "{{ route('mass_schedules.create') }}";
        const loadMassRecord = "{{ route('mass_schedules.index') }}";
        const loadEventCreate = "{{ route('event_announcements.create') }}";
        const loadEventRecord = "{{ route('event_announcements.index') }}";
    </script>


</body>

</html>
