@extends('admin.layouts.app')

@section('style')
<style>
    .profile-page {
        background-color: #f4f7fc;
        padding: 30px;
    }

    .card {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #ffffff;
        color: #333;
        font-size: 1.5rem;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        border-bottom: 2px solid #ddd;
    }

    .card-body {
        padding: 20px;
    }

    .profile-details {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .profile-details .form-group {
        width: calc(50% - 10px); /* Ensure that two items are side by side */
    }

    .profile-details label {
        font-weight: 600;
        color: #333;
    }

    .profile-details span {
        color: #777;
        font-weight: 500;
    }

    .profile-status {
        margin-top: 20px;
        text-align: center;
        font-size: 1.2rem;
        color: #333;
    }

    .profile-status .status-text {
        font-weight: 600;
    }

    .profile-status .status-active {
        color: green;
    }

    .profile-status .status-inactive {
        color: red;
    }

    .additional-info {
        margin-top: 30px;
        text-align: center;
        color: #777;
        font-size: 1.1rem;
    }

    .btn-contact {
        display: inline-block;
        background-color: #4e73df;
        color: #fff;
        padding: 12px 24px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 20px;
        transition: background-color 0.3s;
    }

    .btn-contact:hover {
        background-color: #2e59d9;
    }

    @media (max-width: 768px) {
        .profile-details .form-group {
            width: 100%; /* Stack the items vertically on smaller screens */
        }
    }
</style>
@endsection

@section('content')
<div class="content-wrapper profile-page">

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Account Information</h3>
            </div>
            <div class="card-body">
                <!-- Profile Details Section -->
                <div class="profile-details">
                    <!-- First Row -->
                    <div class="form-group">
                        <label>ID: </label>
                        <span>{{$getRecords->id}}</span>
                    </div>
                    <div class="form-group">
                        <label>User ID: </label>
                        <span style="color: red;">{{$getRecords->user_number}}</span>
                    </div>

                    <!-- Second Row -->
                    <div class="form-group">
                        <label>Name: </label>
                        <span>{{$getRecords->first_name}} {{$getRecords->last_name}}</span>
                    </div>
                    <div class="form-group">
                        <label>Company Name: </label>
                        <span>{{$getRecords->company_name}}</span>
                    </div>

                    <!-- Third Row -->
                    <div class="form-group">
                        <label>Country: </label>
                        <span>{{$getRecords->country}}</span>
                    </div>
                    <div class="form-group">
                        <label>Address: </label>
                        <span>{{$getRecords->address}}, {{$getRecords->address_two}}</span>
                    </div>

                    <!-- Fourth Row -->
                    <div class="form-group">
                        <label>City: </label>
                        <span>{{$getRecords->city}}</span>
                    </div>
                    <div class="form-group">
                        <label>State: </label>
                        <span>{{$getRecords->state}}</span>
                    </div>

                    <!-- Fifth Row -->
                    <div class="form-group">
                        <label>Postcode: </label>
                        <span>{{$getRecords->postcode}}</span>
                    </div>
                    <div class="form-group">
                        <label>Phone: </label>
                        <span>{{$getRecords->phone}}</span>
                    </div>

                    <!-- Sixth Row -->
                    <div class="form-group">
                        <label>Email: </label>
                        <span>{{$getRecords->email}}</span>
                    </div>
                </div>

                <!-- User Status Section -->
                <div class="profile-status">
                    <p class="status-text">Account Status: 
                        @if($getRecords->status == 0)
                            <span class="status-active">Active</span>
                        @else
                            <span class="status-inactive">Inactive</span>
                        @endif
                    </p>
                </div>

                @php
                $getSystemSettingApp = App\Models\SystemSetting::getSingle();
                @endphp
                <!-- Additional Information Section -->
                <div class="additional-info">
                    <p>Thank you for being a valued user. If you need assistance, feel free to reach out to our support team.</p>
                    <a href="mailto:{{$getSystemSettingApp->email_one}}" class="btn-contact">Contact Support</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    // Additional JavaScript functionality can be added if required
    document.addEventListener("DOMContentLoaded", function () {
        // Example: Displaying an alert for the user status
        const statusText = document.querySelector('.status-text');
        if(statusText) {
            console.log('User status:', statusText.textContent.trim());
        }
    });
</script>
@endsection
