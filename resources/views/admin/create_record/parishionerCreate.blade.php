<div class="parishCreateContainer">
    <div class="header-menu">
        <p class="title"> Parishioner Registration</p>
        <p class="description">This registration applicable only to parishioner in San Pascual Parish Member</p>
    </div>

    <div class="main-content">
        <form action="{{ route('parishioners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Personal Information</p>
            <div class="form-content">
                <div>
                    <label for="">Full Name</label>
                    <input type="text" name="fullname" required>
                </div>
                <div>
                    <label for="">Date Of Birth</label>
                    <input type="date" name="dateofbirth" id="dateofbirth" min="1900-01-01" max="" required>
                </div>
                <div>
                    <label for="">Gender</label>
                    <select name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>

                </div>
                <div>
                    <label for="">Contact Number</label>
                    <input type="text" name="contactnumber" id="contactnumber" placeholder="+63 9XXXXXXXXX" value="+63 " required maxlength="14">
                </div>
                <div>
                    <label for="">Civil Status</label>
                    <select name="civil_status" required>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widowed">Widowed</option>
                    </select>
                    <div>
                        <label for="">Image</label>
                        <input type="file" name="image" required>
                    </div>
                </div>
            </div>
            <p>Address</p>
            <div class="form-content">
                <div>
                    <label for="street">Street</label>
                    <input type="text" name="street" required>
                </div>

                <div>
                    <label for="barangay">Barangay</label>
                    <input type="text" name="barangay" required>
                </div>

                <div>
                    <label for="city">City/Municipality</label>
                    <input type="text" name="city" required>
                </div>

                <div>
                    <label for="province">Province</label>
                    <input type="text" name="province" required>
                </div>

                <div>
                    <label for="zipcode">Zip Code</label>
                    <input type="number" name="zipcode" required>
                </div>

            </div>
            <p>Spiritual Information</p>
            <div class="form-content">
                <div>
                    <label for="baptized">Baptized?</label>
                    <select name="baptized" id="baptized" required>
                        <option value="">--Select--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div id="baptism-details" style="display: none;">
                    <div>
                        <label for="baptism_date">Date of Baptism</label>
                        <input type="date" name="baptism_date" id="baptism_date" min="1900-01-01" max="">
                    </div>
                    <div>
                        <label for="baptism_church">Church of Baptism</label>
                        <input type="text" name="baptism_church" id="baptism_church">
                    </div>
                </div>
                <div>
                    <label for="confirmed">Confirmed?</label>
                    <select name="confirmed" id="confirmed" required>
                        <option value="">--Select--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div>
                    <label>Status:</label>
                    <select name="status" required>
                        <option value="">-- Select Status --</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

            </div>
            <div class="form-content">
                <button type="submit">Save record</button>
            </div>
        </form>
    </div>
</div>
</div>
<style>
    .parishCreateContainer {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 100%;
        padding: 1rem;

    }

    .description {
        color: rgb(238, 69, 69);
    }

    .header-menu {
        display: flex;
        gap: 8rem;
        align-items: center
    }

    .header-menu .title {
        font-size: 23px;
        font-weight: bold;
    }

    .header-menu p {
        font-size: 13px
    }

    .app-body-content {
        display: flex;
        gap: 4rem;
    }

    .side-content {
        border-radius: 5px;
        display: flex;
        align-items: center;
        flex-direction: column;
        border: 1px solid var(--c-gray-600);
        width: 38%;
        padding: 10px;
    }

    .side-content img {
        height: 80px;
        width: 80px;
        border-radius: 50px;
    }

    .side-content p {
        font-size: 17px;
        color: var(--c-olive-500);
        margin-bottom: 2rem;
    }

    .main-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 100%;
        border: 1px solid var(--c-gray-600);
        border-radius: 5px;
        padding: 4rem;
        background-color: var(--c-gray-600);
        color: black;
        overflow-y: scroll;
        height: 26rem;
    }

    .main-content::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 4px;
    }

    .main-content::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }

    .main-content p {
        font-size: 20px;
        font-weight: bold;
        color: var(--c-green-500);
        margin-bottom: 2rem;

    }

    .main-content .form-content {
        margin-bottom: 2rem;
        font-size: 13px;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .main-content .form-content div {
        display: flex;
        flex-direction: column;
    }

    .main-content .form-content div input,
    select {
        margin-bottom: 10px;
        font-size: 12px;
        width: 100%;
        height: 2.4rem;
        background-color: rgb(255, 255, 255);
        outline: none;
        border-radius: 4px;
        text-indent: 8px;
        border: none;
        font-style: italic;
    }

    .main-content .form-content div input::placeholder {
        color: black;
        font-style: italic;
        font-size: 12px;
    }

    #baptism-details {
        transition: all 0.3s ease;
    }

    .main-content button {
        border-radius: 3px;
        color: black;
        border: none;
        background-color: var(--c-green-500);
        margin-left: 525px;
        width: 30%;
        height: 2.4rem;
        transition: all 0.3s ease;
    }

    .main-content button:disabled {
        cursor: not-allowed !important;
    }

    .submit-loading-spinner {
        display: inline-block;
        width: 12px;
        height: 12px;
        border: 2px solid transparent;
        border-top: 2px solid #000;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-right: 8px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    label {
        color: white;
        margin-bottom: 5px;
    }

    #contactnumber {
        font-family: monospace;
        letter-spacing: 1px;
        font-weight: bold;
    }

    #contactnumber::placeholder {
        color: #999 !important;
        font-style: italic;
        font-weight: normal;
    }

    #contactnumber:focus {
        border: 2px solid var(--c-green-500);
        box-shadow: 0 0 5px rgba(69, 255, 188, 0.3);
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const baptizedSelect = document.getElementById('baptized');
        const baptismDetails = document.getElementById('baptism-details');

        function toggleBaptismDetails() {
            if (baptizedSelect.value === 'yes') {
                baptismDetails.style.display = 'block';
            } else {
                baptismDetails.style.display = 'none';
            }
        }

        // Show/hide on change
        baptizedSelect.addEventListener('change', toggleBaptismDetails);

        // Show/hide on load (for pre-filled data)
        toggleBaptismDetails();

        // Form submission loading
        const form = document.querySelector('form');
        const submitButton = document.querySelector('button[type="submit"]');
        
        // Set max dates to today
        const today = new Date().toISOString().split('T')[0];
        const dobInput = document.getElementById('dateofbirth');
        const baptismDateInput = document.getElementById('baptism_date');
        
        if (dobInput) dobInput.max = today;
        if (baptismDateInput) baptismDateInput.max = today;
        
        // Limit year to 4 digits for all date inputs
        function limitYearInput(input) {
            input.addEventListener('input', function(e) {
                let value = e.target.value;
                // If value has more than 10 characters (YYYY-MM-DD), truncate it
                if (value.length > 10) {
                    e.target.value = value.substring(0, 10);
                }
                
                // Check if year part is more than 4 digits
                const parts = value.split('-');
                if (parts[0] && parts[0].length > 4) {
                    parts[0] = parts[0].substring(0, 4);
                    e.target.value = parts.join('-');
                }
            });
            
            input.addEventListener('keypress', function(e) {
                const value = e.target.value;
                const parts = value.split('-');
                
                // If we're in the year part and it's already 4 digits, prevent more input
                if (parts[0] && parts[0].length >= 4 && value.indexOf('-') === -1) {
                    if (e.key !== 'Backspace' && e.key !== 'Delete' && e.key !== 'Tab' && e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') {
                        e.preventDefault();
                    }
                }
            });
        }
        
        // Apply year limitation to all date inputs
        if (dobInput) limitYearInput(dobInput);
        if (baptismDateInput) limitYearInput(baptismDateInput);
        
        // Philippine Phone Number Formatting - NUMBERS ONLY
        const contactInput = document.getElementById('contactnumber');
        if (contactInput) {
            const PREFIX = '+63 ';
            
            // Force initial value
            contactInput.value = PREFIX;
            
            // Function to fix and validate input
            function fixInput() {
                let currentValue = contactInput.value;
                
                // Always ensure it starts with prefix
                if (!currentValue.startsWith(PREFIX)) {
                    // Extract only digits from whatever is there
                    let digits = currentValue.replace(/\D/g, '');
                    // Make sure first digit is 9
                    if (digits && !digits.startsWith('9')) {
                        digits = '9' + digits.replace(/^[^9]/, '');
                    }
                    // Limit to 10 digits
                    digits = digits.substring(0, 10);
                    // Set with prefix
                    contactInput.value = PREFIX + digits;
                } else {
                    // Clean up the numbers part - remove any non-digits
                    let numbers = currentValue.substring(PREFIX.length).replace(/\D/g, '');
                    if (numbers && !numbers.startsWith('9')) {
                        numbers = '9' + numbers.replace(/^[^9]/, '');
                    }
                    numbers = numbers.substring(0, 10);
                    contactInput.value = PREFIX + numbers;
                }
                
                // Keep cursor after prefix
                if (contactInput.selectionStart < PREFIX.length) {
                    contactInput.setSelectionRange(PREFIX.length, PREFIX.length);
                }
            }
            
            // Prevent non-numeric input on keypress
            contactInput.addEventListener('keypress', function(e) {
                // Allow navigation keys
                if (['Backspace', 'Delete', 'Tab', 'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', 'Home', 'End'].includes(e.key)) {
                    return true;
                }
                
                // If cursor is in prefix area, only allow navigation
                if (contactInput.selectionStart < PREFIX.length) {
                    if (!['ArrowRight', 'Tab', 'End'].includes(e.key)) {
                        e.preventDefault();
                        return false;
                    }
                }
                
                // Only allow numbers (0-9) for the phone number part
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault();
                    return false;
                }
                
                // Check if we already have 10 digits
                let currentNumbers = contactInput.value.substring(PREFIX.length).replace(/\D/g, '');
                if (currentNumbers.length >= 10) {
                    e.preventDefault();
                    return false;
                }
            });
            
            // Handle other events
            const events = ['input', 'keyup', 'paste', 'cut', 'focus', 'blur'];
            events.forEach(eventType => {
                contactInput.addEventListener(eventType, function(e) {
                    // For paste events, extract only numbers
                    if (eventType === 'paste') {
                        e.preventDefault();
                        let pastedText = (e.clipboardData || window.clipboardData).getData('text');
                        let numbers = pastedText.replace(/\D/g, '');
                        
                        if (numbers && !numbers.startsWith('9')) {
                            numbers = '9' + numbers.replace(/^[^9]/, '');
                        }
                        numbers = numbers.substring(0, 10);
                        
                        contactInput.value = PREFIX + numbers;
                        return;
                    }
                    
                    // For destructive events, prevent them if they affect prefix
                    if (['cut'].includes(eventType)) {
                        if (contactInput.selectionStart < PREFIX.length) {
                            e.preventDefault();
                            return;
                        }
                    }
                    
                    // Always fix the input after any event
                    setTimeout(fixInput, 1);
                });
            });
            
            // Continuous checking to ensure integrity
            setInterval(fixInput, 100);
            
            // Validation on blur
            contactInput.addEventListener('blur', function() {
                const numbers = contactInput.value.substring(PREFIX.length);
                if (numbers.length > 0 && numbers.length < 10) {
                    contactInput.setCustomValidity('Phone number must be exactly 10 digits starting with 9');
                } else if (numbers.length > 0 && !numbers.startsWith('9')) {
                    contactInput.setCustomValidity('Phone number must start with 9');
                } else {
                    contactInput.setCustomValidity('');
                }
            });
            
            // Prevent right-click to avoid paste operations
            contactInput.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });
        }
        
        // Date validation
        function validateDates() {
            const dob = new Date(dobInput.value);
            const baptismDate = baptismDateInput.value ? new Date(baptismDateInput.value) : null;
            
            if (baptismDate && dob && baptismDate < dob) {
                alert('Baptism date cannot be earlier than date of birth.');
                return false;
            }
            return true;
        }
        
        if (form && submitButton) {
            form.addEventListener('submit', function(e) {
                // Validate dates first
                if (!validateDates()) {
                    e.preventDefault();
                    return;
                }
                
                // Show loading state
                submitButton.innerHTML = '<span class="submit-loading-spinner"></span>Saving...';
                submitButton.disabled = true;
                submitButton.style.opacity = '0.7';
                submitButton.style.cursor = 'not-allowed';
            });
        }
    });
</script>
