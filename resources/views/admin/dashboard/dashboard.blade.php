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

                    </h1>
                </div>
            </div>
            <div class="app-header-navigation">
                <div class="tabs">
                    <a href="#" onclick="showParishionerRecord()">Parishioner</a>
                    <a href="#" onclick="addPriest()"> Add Priest</a>
                    <a href="{{ route('staff.create') }}">Add Staff </a>
                    <a href="#" onclick="addSendRequest()">Verify Certification </a>
                </div>
            </div>
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>{{ $admin->admin }}</span>
                    <span>
                        <img src="{{ asset('img/kayi.png') }}" />
                    </span>
                </button>
                <div class="app-header-actions-buttons">
                    <button onclick="goToSignOutPage()" class="icon-button large">
                        <i class="ph-sign-out"></i>
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
                    <a class="a" href="#" onclick="showDashboard()">
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
                            <a href="#" onclick="showPriestAssignment()()">Assign Priests</a>
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
                    <a class="a" href="#" onclick="showDocumentRequest()">
                        <i class="ph-swap"></i>
                        <span>Sacramental Record</span>
                    </a>
                    <div class="dropdown">
                        <a class="a" href="javascript:void(0);" onclick="financialtoggleDropdown()">
                            <i class="ph-file-text"></i>
                            <span>Financial Record</span>
                        </a>
                        <div id="financialdropdownmenu" class="dropdown-menu">

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
                            <a href="#" onclick="showAssignedPriest()">Priest Assignment</a>
                            <a href="#" onclick="showStaff()">Staff Profile</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="a" href="javascript:void(0);" onclick="reporttoggleDropdown()">
                            <i class="ph-clipboard-text"></i>
                            <span>Report & Analytics </span>
                        </a>
                        <div id="reportdropdownmenu" class="dropdown-menu">
                            <a href="#" onclick="showMemberStatistics()">Member Statistics</a>
                            <a href="#" onclick="showFinancialReport()">Financial Report</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="maincontent" class="app-body-main-content">
            </div>
            <div class="app-body-sidebar">
                <section id="payment-section" class="payment-section">
                    <h2>Recent Donation</h2>

                    <div class="payments">
                        @foreach ($donations as $donation)
                            <div class="payment">
                                <div class="card green">
                                    <span>{{ $donation->created_at }}</span>
                                    <span> {{ $donation->donation_id }}</span>
                                </div>
                                <div class="payment-details">
                                    <h3>Jerlyn</h3>
                                    <div>
                                        <span>₱ {{ $donation->amount }}</span>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="faq">
                        <p>Most frequently asked questions</p>
                        <div>
                            <label>Question</label>
                            <input type="text" placeholder="Type here" />
                        </div>
                        <div>
                            <label>Answer </label>
                            <input type="text" placeholder="Type here" />
                        </div>
                    </div>
                    <div class="payment-section-footer">
                        <button class="save-button">Save</button>

                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script src="https://unpkg.com/phosphor-icons"></script>
    <script>
        function goToSignOutPage() {
            window.location.href = "{{ route('gets_started') }}";
        }
        document.getElementById('toggleBtn').addEventListener('click', function() {
            const div = document.getElementById('app-body-navigation');
            if (div.style.display === 'none' || div.style.display === '') {
                div.style.display = 'block'; // or 'flex' if using flex layout
            } else {
                div.style.display = 'none';
            }
        });


        const loadAddPriest = "{{ route('priests.create') }}";
        const loadPriestAssignment = "{{ route('priests_assignments.create') }}";
        const loadStaffCreate = "{{ route('staff.create') }}";
        const loadStaff = "{{ route('staff.index') }}";
        const loadMemberStatistics = "{{ route('parishioners.report') }}";
        const loadfinancialReport = "{{ route('donations.report') }}";
        const loadsendRequest = "{{ route('sendRequest.sendRequest') }}";
        const loadassignedpriest = "{{ route('priests_assignments.index') }}";
        const loadpriestindex = "{{ route('priests.index') }}";
        //
        const loadBaptistCreate = "{{ route('baptismals.create') }}";
        const loadBaptistRecord = "{{ route('baptismals.index') }}";
        const loadConfirmationCreate = "{{ route('confirmations.create') }}";
        const loadConfirmationRecord = "{{ route('confirmations.index') }}";
        const loadParishionerRecord = "{{ route('parishioners.index') }}";
        const loadMarriageCreate = "{{ route('marriages.create') }}";
        const loadMarriageRecord = "{{ route('marriages.index') }}";
        const loadDeathCreate = "{{ route('deaths.create') }}";
        const loadDeathRecord = "{{ route('deaths.index') }}";
        const loadDonationCreate = "{{ route('donation.create') }}";
        const loadDonationRecord = "{{ route('donation.index') }}";
        const loadMassCreate = "{{ route('mass_schedules.create') }}";
        const loadMassRecord = "{{ route('mass_schedules.index') }}";
        const loadEventCreate = "{{ route('event_announcements.create') }}";
        const loadEventRecord = "{{ route('event_announcements.index') }}";
    </script>


</body>

</html>
