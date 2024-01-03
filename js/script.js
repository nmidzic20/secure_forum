document.addEventListener("DOMContentLoaded", function () {
  var modal = document.getElementById("new-topic-submission");
  var postContentLink = document.getElementById("post-content-btn");
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

  var postTopicBtn = document.getElementById("post-topic-btn");
  postTopicBtn.addEventListener("click", function () {
    var title = document.getElementById('topic-title').value;
    var content = document.getElementById('topic-content').value;
    var file = document.getElementById('file-upload').files[0];

    var formData = new FormData();
    formData.append('title', title);
    formData.append('content', content);
    formData.append('file', file);

    modal.style.display = "none";

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/src/topic.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert('Topic posted successfully!');
        } else {
            alert('Error posting topic. Please try again.');
        }
    };
    xhr.send(formData);
  });

  var cancelBtn = document.getElementById("cancel-btn");
  cancelBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });
});
