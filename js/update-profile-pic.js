document.addEventListener("DOMContentLoaded", function () {
  var modal = document.getElementById("new-profile-pic-submission");
  var postContentLink = document.getElementById("update-profile-pic-btn");
  var closeBtn = document.querySelector(".close");

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

  var postTopicBtn = document.getElementById("update-pic-btn");
  postTopicBtn.addEventListener("click", function () {
    var title = document.getElementById("pic-url").value;

    var formData = new FormData();
    formData.append("pic-url", title);

    modal.style.display = "none";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/api/update-profile-pic.php", true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        let response = JSON.parse(xhr.responseText);

        if (response.status === "success") {
          alert("Profile picture updated successfully!");
          window.location.reload();
        } else {
          alert("Error updating profile picture: " + response.message);
        }
      } else {
        alert("Error fetching image. Please try a different URL.");
      }
    };
    xhr.send(formData);
  });

  var cancelBtn = document.getElementById("cancel-btn");
  cancelBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });
});
