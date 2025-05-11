
    <div class="container">
        <h1>Priests</h1>
        <a href="{{ route('priests.create') }}" class="btn btn-primary mb-3">Add New Priest</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Priest ID</th>
                    <th>Name</th>
                    <th>Profile</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($priests as $priest)
                    <tr>
                        <td>{{ $priest->priest_id }}</td>
                        <td>{{ $priest->first_name }} {{ $priest->last_name }}</td>
                        <td>
                            @if($priest->profile_photo)
                                <img src="{{ asset('storage/' . $priest->profile_photo) }}" alt="Profile Photo" width="50">
                            @else
                                <img src="{{ asset('storage/default-profile.jpg') }}" alt="Default Profile" width="50">
                            @endif
                        </td>
                        <td>{{ $priest->email }}</td>
                        <td>{{ $priest->position }}</td>
                        <td>{{ $priest->status }}</td>
                        <td>
                            <a href="{{ route('priests.edit', $priest) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('priests.destroy', $priest) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this priest?')">Delete</button>
                            </form>
                        </td>
                    </tr>
               @empty
                <tr>
                    <td colspan="10">No staff records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

