<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLOT Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Feedback Dialog */
        .feedback-dialog {
            position: fixed;
            top: -100%;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            z-index: 1000;
            transition: top 0.5s ease-in-out;
        }

        /* Content inside the dialog */
        .feedback-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .feedback-content .icon {
            font-size: 40px;
            color: green;
            margin-bottom: 10px;
        }

        .feedback-content p {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        /* Close Button */
        .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 20px;
            color: #555;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-btn:hover {
            color: red;
        }
    </style>
</head>
<body>

<div id="feedback-dialog" class="feedback-dialog">
    <div class="feedback-content">
        <span class="close-btn">&times;</span>
        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <p id="feedback-message">Feedback sent successfully</p>
    </div>
</div>

<div class="container mt-5">
    <h1 class="text-center">We Value Your Feedback</h1>
    <form id="feedback-form" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Feedback Type</label>
            <select class="form-select" id="type" name="type" required>
                <option value="">Select...</option>
                <option value="Positive">Positive</option>
                <option value="Negative">Negative</option>
                <option value="Neutral">Neutral</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Concerned Department</label>
            <select class="form-select" id="department" name="department" required>
                <option value="">Select...</option>
                <option value="Customer Service">Customer Service</option>
                <option value="Tech Team">Tech Team</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Your Feedback</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>

<script>
    document.getElementById('feedback-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(event.target);

        fetch('submitFeedback.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const dialog = document.getElementById('feedback-dialog');
            const messageElement = document.getElementById('feedback-message');

            if (data.status === 'success') {
                messageElement.textContent = 'Feedback sent successfully';
                document.querySelector('.icon').classList.add('fas', 'fa-check-circle');
                document.querySelector('.icon').style.color = 'green';
            } else {
                messageElement.textContent = data.message;
                document.querySelector('.icon').classList.add('fas', 'fa-times-circle');
                document.querySelector('.icon').style.color = 'red';
            }

            dialog.style.top = '30%'; // Center the dialog on the screen
            dialog.style.transform = 'translate(-50%, -50%)';

            // Automatically hide the dialog after 5 seconds
            setTimeout(() => {
                dialog.style.top = '-100%';
            }, 5000);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Add event listener for close button
    document.querySelector('.close-btn').addEventListener('click', function() {
        document.getElementById('feedback-dialog').style.top = '-100%';
    });
</script>

</body>
</html>
