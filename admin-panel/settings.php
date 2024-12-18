<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: #f7f8fc;
            font-family: Arial, sans-serif;
        }

        .settings-container {
            margin: 50px auto;
            padding: 30px;
            max-width: 800px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .settings-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .settings-header h2 {
            font-size: 2rem;
            color: #333;
        }

        .settings-header p {
            color: #666;
        }

        .setting-item {
            margin-bottom: 20px;
            padding: 15px 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
        }

        .setting-item:hover {
            background-color: #f0f4ff;
            border-color: #007bff;
        }

        .setting-item h5 {
            font-size: 1.2rem;
            margin: 0;
            color: #333;
        }

        .setting-item p {
            margin: 0;
            font-size: 0.9rem;
            color: #777;
        }

        .toggle-switch {
            position: relative;
            width: 40px;
            height: 20px;
            background: #ddd;
            border-radius: 15px;
            cursor: pointer;
        }

        .toggle-switch::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 14px;
            height: 14px;
            background: white;
            border-radius: 50%;
            transition: 0.3s;
        }

        .toggle-switch.active {
            background: #007bff;
        }

        .toggle-switch.active::before {
            left: 23px;
        }

        .select-dropdown {
            width: 50%;
        }

        .btn-custom {
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Admin Settings</h1>

        <!-- Form to Update Profile Picture -->
        <form action="update-settings.php" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="profilePicture" class="form-label">Upload Profile Picture</label>
                <input type="file" class="form-control" id="profilePicture" name="profilePicture" accept="image/*" required>
            </div>

            <!-- Form to Change Password -->
            <div class="mt-4">
                <h3>Change Password</h3>
                <div class="mb-3">
                    <label for="defaultPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="defaultPassword" name="defaultPassword" required>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    <div class="settings-container">
        <!-- Language Setting -->
        <div class="setting-item">
            <div>
                <h5>Language</h5>
                <p>Select your preferred language.</p>
            </div>
            <select class="form-select select-dropdown" aria-label="Language select">
                <option value="en" selected>English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
                <option value="de">German</option>
            </select>
        </div>

        <!-- Dark/Light Mode Setting -->
        <div class="setting-item">
            <div>
                <h5>Dark/Light Mode</h5>
                <p>Switch between dark and light themes.</p>
            </div>
            <div class="toggle-switch" id="theme-toggle"></div>
        </div>

        <!-- Notification Preferences -->
        <div class="setting-item">
            <div>
                <h5>Notification Preferences</h5>
                <p>Choose which notifications you'd like to receive.</p>
            </div>
            <button class="btn-custom" id="manage-notifications">Manage</button>
        </div>

        <!-- Profile Customization -->
        <div class="setting-item">
            <div>
                <h5>Profile Customization</h5>
                <p>Update your admin profile and credentials.</p>
            </div>
            <button class="btn-custom" id="edit-profile">Edit Profile</button>
        </div>
    </div>

    <script>
        // Toggle switch functionality
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', function () {
            this.classList.toggle('active');
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>

</html>
