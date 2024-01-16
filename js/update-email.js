document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("new-email-submission");
    var postContentLink = document.getElementById("update-profile-email-btn");
    var closeBtn = document.getElementById("close-email")

    postContentLink.addEventListener("click", function () {
        modal.style.display = "block";
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    var updateEmailBtn = document.getElementById("update-email-btn");
    updateEmailBtn.addEventListener("click", function () {
        var newEmail = document.getElementById("email").value;

        var formData = new FormData();
        formData.append("email", newEmail);

        var authToken = localStorage.getItem('authToken');
        formData.append("authToken", authToken);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/api/update-email.php", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);

                if (response.status === "success") {
                    alert("Email updated successfully!");
                    window.location.reload();
                } else {
                    alert("Error updating email: " + response.message);
                }
            } else {
                alert("Error updating email. Please try again.");
            }
        };
        console.log(formData);
        xhr.send(formData);
    });

    var cancelBtn = document.getElementById("cancel-btn-email");
    cancelBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });
});