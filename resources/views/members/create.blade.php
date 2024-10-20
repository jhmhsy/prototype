<div class="container">
    <h2>Register New Member</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <h2>Member Details</h2>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
            <label for="fb">Facebook (optional):</label>
            <input type="text" id="fb" name="fb">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <h2>Subscription Service</h2>
        <div>
            <label for="service_type">Service Type:</label>
            <select id="service_type" name="service_type" required>
                <option value="Monthly">Monthly</option>
                <option value="Yearly">Yearly</option>
            </select>
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        <div>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" required>
        </div>

        <h2>Locker</h2>
        <div>
            <label for="locker_start_date">Locker Start Date:</label>
            <input type="date" id="locker_start_date" name="locker_start_date" required>
        </div>

        <div>
            <label for="locker_no">Locker no#:</label>
            <input type="number" id="locker_no" name="locker_no" required>
        </div>
        <div>
            <label for="locker_amount">Locker Amount:</label>
            <input type="number" id="locker_amount" name="locker_amount" step="0.01" required>
        </div>

        <button type="submit">Register</button>
    </form>

</div>