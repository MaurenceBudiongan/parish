<h2 class="h2">Death Record</h2>
<div class="Create">
    <form action="{{ route('death.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="full_name">Full Name of Deceased</label>
            <input type="text" name="full_name" id="full_name" required>
        </div>

        <div class="form-group">
            <label for="sex">Sex</label>
            <input type="text" name="sex" id="sex" required>
        </div>

        <div class="form-group">
            <label for="birth_date">Date of Birth</label>
            <input type="date" name="birth_date" id="birth_date" min="1900-01-01" max="" required>
        </div>

        <div class="form-group">
            <label for="age">Age at Death</label>
            <input type="text" name="age" id="age" required>
        </div>

        <div class="form-group">
            <label for="birth_place">Place of Birth</label>
            <input type="text" name="birth_place" id="birth_place" required>
        </div>

        <div class="form-group">
            <label for="civil_status">Civil Status</label>
            <input type="text" name="civil_status" id="civil_status" required>
        </div>

        <div class="form-group">
            <label for="address">Address at Time of Death</label>
            <input type="text" name="address" id="address" required>
        </div>

        <div class="form-group">
            <label for="death_date">Date of Death</label>
            <input type="date" name="death_date" id="death_date" min="1900-01-01" max="" required>
        </div>

        <div class="form-group">
            <label for="place_of_death">Place of Death</label>
            <input type="text" name="place_of_death" id="place_of_death" required>
        </div>

        <div class="form-group">
            <label for="cause_of_death">Cause of Death</label>
            <input type="text" name="cause_of_death" id="cause_of_death" required>
        </div>

        <div class="form-group">
            <label for="burial_date">Date of Burial</label>
            <input type="date" name="burial_date" id="burial_date" min="1900-01-01" max="">
        </div>

        <div class="form-group">
            <label for="burial_place">Place of Burial</label>
            <input type="text" name="burial_place" id="burial_place">
        </div>

        <div class="form-group">
            <label for="officiant">Officiating Priest</label>
            <input type="text" name="officiant" id="officiant">
        </div>

        <button type="submit" class="submit-btn">Submit Record</button>
    </form>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

    .Create {
        padding: 15px;
        background-color: var(--c-gray-600);
        border-radius: 10px;
        border-bottom: 10px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .h2 {
        margin-bottom: 20px;
    }

    form {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .form-title {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: var(--c-gray-200);
        font-size: 12px;
    }

    input[type="text"],
    input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: 0.3s;
        font-size: 12px;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .Create form button {
        padding: 12px;
        background: #45FFBC;
        color: black;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.3s ease;
    }

    .Create form button:disabled {
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

    .submit-btn:hover {
        background: #0056b3;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Set max dates
        const today = new Date().toISOString().split('T')[0];
        const birthDateInput = document.getElementById('birth_date');
        const deathDateInput = document.getElementById('death_date');
        const burialDateInput = document.getElementById('burial_date');
        
        if (birthDateInput) birthDateInput.max = today;
        if (deathDateInput) deathDateInput.max = today;
        if (burialDateInput) burialDateInput.max = today;
        
        // Limit year to 4 digits for date inputs
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
        if (birthDateInput) limitYearInput(birthDateInput);
        if (deathDateInput) limitYearInput(deathDateInput);
        if (burialDateInput) limitYearInput(burialDateInput);
        
        // Date validation function
        function validateDates() {
            const birthDate = new Date(birthDateInput.value);
            const deathDate = new Date(deathDateInput.value);
            const burialDate = burialDateInput.value ? new Date(burialDateInput.value) : null;
            
            if (deathDate < birthDate) {
                alert('Date of death cannot be earlier than date of birth.');
                return false;
            }
            
            if (burialDate && burialDate < deathDate) {
                alert('Date of burial cannot be earlier than date of death.');
                return false;
            }
            
            return true;
        }
        
        // Form submission loading
        const form = document.querySelector('form');
        const submitButton = document.querySelector('button[type="submit"]');
        
        if (form && submitButton) {
            form.addEventListener('submit', function(e) {
                // Validate dates first
                if (!validateDates()) {
                    e.preventDefault();
                    return;
                }
                
                // Only proceed if user confirmed
                if (confirm('Save this Death record?')) {
                    e.preventDefault(); // Prevent default to handle manually
                    
                    // Show loading state
                    submitButton.innerHTML = '<span class="submit-loading-spinner"></span>Saving...';
                    submitButton.disabled = true;
                    submitButton.style.opacity = '0.7';
                    submitButton.style.cursor = 'not-allowed';
                    
                    // Submit the form
                    setTimeout(() => {
                        form.submit();
                    }, 100);
                } else {
                    e.preventDefault(); // Cancel if user didn't confirm
                }
            });
            
            // Remove onclick from button since we're handling it in the event listener
            submitButton.removeAttribute('onclick');
        }
    });
</script>
