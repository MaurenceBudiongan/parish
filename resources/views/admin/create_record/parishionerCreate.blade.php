<div class="parishCreateContainer">
    <div class="header-menu">
        <p class="title"> Parishioner Registration</p>
        <p class="description">This registration applicable only to parishioner in San Pascual Parish Member</p>
    </div>
    <div class="app-body-content">
        <div class="side-content">
            <img src="{{ asset('img/kayi.png') }}" alt="profile Image">
            <p>Jerlyn Orpilla</p>
        </div>
        <div class="main-content">
            <form action="{{ route('parishioners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Personal Information</p>
                <div class="form-content">
                    <div>
                        <label for="">Full Name</label>
                        <input type="text" name="fullname" placeholder="Your full name" required>
                    </div>
                    <div>
                        <label for="">Date Of Birth</label>
                        <input type="date" name="dateofbirth" placeholder="Your birth date" required>
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
                        <input type="number" name="contactnumber" placeholder="Your contact number" required
                            maxlength="11" oninput="this.value = this.value.slice(0, 11)">
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
                            <input type="file" name="image" placeholder="Upload your image" required>
                        </div>
                    </div>
                </div>
                <p>Address</p>
                <div class="form-content">
                    <div>
                        <label for="street">Street</label>
                        <input type="text" name="street" placeholder="Your street" required>
                    </div>

                    <div>
                        <label for="barangay">Barangay</label>
                        <input type="text" name="barangay" placeholder="Your barangay" required>
                    </div>

                    <div>
                        <label for="city">City/Municipality</label>
                        <input type="text" name="city" placeholder="Your city or municipality" required>
                    </div>

                    <div>
                        <label for="province">Province</label>
                        <input type="text" name="province" placeholder="Your province" required>
                    </div>

                    <div>
                        <label for="zipcode">Zip Code</label>
                        <input type="number" name="zipcode" placeholder="Your zip code" required>
                    </div>

                </div>
                <p>Spiritual Information</p>
                <div class="form-content">
                    <div>
                        <label for="baptized">Baptized?</label>
                        <select name="baptized" id="baptized" required>
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div id="baptism-details" style="display: none;">
                        <div>
                            <label for="baptism_date">Date of Baptism</label>
                            <input type="date" name="baptism_date" id="baptism_date">
                        </div>
                        <div>
                            <label for="baptism_church">Church of Baptism</label>
                            <input type="text" name="baptism_church" id="baptism_church" placeholder="Church name">
                        </div>
                    </div>
                    <div>
                        <label for="confirmed">Confirmed?</label>
                        <select name="confirmed" id="confirmed" required>
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
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
    }

    .main-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 55%;
        border: 1px solid var(--c-gray-600);
        border-radius: 5px;
        padding: 1rem;
        background-color: var(--c-gray-500);
        color: black;
        overflow-y: scroll;
        height: 22rem;
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
        font-size: 12px;
        width: 100%;
        height: 1.8rem;
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
        margin-left: 300px;
        width: 30%;
        height: 1.8rem;
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
    });
</script>
