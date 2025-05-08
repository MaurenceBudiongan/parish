<div class="container">
    <h1>Add New Priest</h1>

    <form action="{{ route('priests.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}"
                required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}"
                required>
        </div>

        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control"
                value="{{ old('middle_name') }}">
        </div>

        <div class="form-group">
            <label for="suffix">Suffix</label>
            <input type="text" name="suffix" id="suffix" class="form-control" value="{{ old('suffix') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"
                value="{{ old('phone_number') }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                value="{{ old('date_of_birth') }}" required>
        </div>

        <div class="form-group">
            <label for="ordination_date">Ordination Date</label>
            <input type="date" name="ordination_date" id="ordination_date" class="form-control"
                value="{{ old('ordination_date') }}" required>
        </div>

        <div class="form-group">
            <label for="assigned_parish">Assigned Parish</label>
            <input type="text" name="assigned_parish" id="assigned_parish" class="form-control"
                value="{{ old('assigned_parish') }}" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}"
                required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Retired" {{ old('status') == 'Retired' ? 'selected' : '' }}>Retired</option>
                <option value="On Leave" {{ old('status') == 'On Leave' ? 'selected' : '' }}>On Leave</option>
            </select>
        </div>

        <div class="form-group">
            <label for="profile_photo">Profile Photo</label>
            <input type="file" name="profile_photo" id="profile_photo" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Save Priest</button>
    </form>
</div>
