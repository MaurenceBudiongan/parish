<h2 class="h2"> Baptismal Record</h2>
<div class="Create">
    <form action="{{ route('admin.baptismal.store') }}" method="POST">
        @csrf
        <div>
            <label>Full Name:</label>
            <input type="text" name="fullname" required>
        </div>
        <div>
            <label>Sponsor:</label>
            <input type="text" name="sponsor" required>
        </div>

        <div>
            <label>Baptism Date:</label>
            <input type="date" name="baptism_date" id="baptism_date" min="1900-01-01" max="" required>
        </div>

        <button type="submit" onclick="return confirm('Save this baptist record?')">Save Record</button>
    </form>

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
            // Set max date to today
            const today = new Date().toISOString().split('T')[0];
            const baptismDateInput = document.getElementById('baptism_date');
            
            if (baptismDateInput) {
                baptismDateInput.max = today;
            }
            
            // Limit year to 4 digits for date input
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
            
            // Apply year limitation to date input
            if (baptismDateInput) limitYearInput(baptismDateInput);
            
            // Form submission loading
            const form = document.querySelector('form');
            const submitButton = document.querySelector('button[type="submit"]');
            
            if (form && submitButton) {
                form.addEventListener('submit', function(e) {
                    // Only proceed if user confirmed
                    if (confirm('Save this baptist record?')) {
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
</div>
