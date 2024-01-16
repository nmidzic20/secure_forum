var topicId=0;
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
    var title = document.getElementById("topic-title").value;
    var content = document.getElementById("topic-content").value;
    var file = document.getElementById("file").files[0];
    var userId = document.getElementById("user-id").innerText;

    var formData = new FormData();
    formData.append("title", title);
    formData.append("content", content);
    formData.append("file", file);
    formData.append("user_id", userId);

    modal.style.display = "none";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./api/post-topic.php", true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        let response = JSON.parse(xhr.responseText);

        if (response.status === "success") {
          alert("Topic posted successfully!");
          window.location.reload();
        } else {
          alert("Error posting topic: " + response.message);
        }
      } else {
        alert("Error posting topic. Please try again.");
      }
    };
    xhr.send(formData);
  });

  var cancelBtn = document.getElementById("cancel-btn");
  cancelBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  //COMMENT

  var commentModal = document.getElementById("new-comment-submission");
  var postContentLink = document.getElementById("post-comment-btn");
  var closeBtn = document.getElementById("close-comment-modal");

  postContentLink.addEventListener("click", function () {
    postComment();
  });

  closeBtn.addEventListener("click", function () {
    commentModal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target == commentModal) {
      commentModal.style.display = "none";
    }
  });

  var cancelBtn = document.getElementById("cancel-comment-btn");
  cancelBtn.addEventListener("click", function () {
    commentModal.style.display = "none";
  });
});


function postComment() {
  var commentModal = document.getElementById("new-comment-submission");

  var content = document.getElementById("comment-content").value;
  var file = document.getElementById("comment-file").files[0];
  var userId = document.getElementById("user-id").innerText;

  var formData = new FormData();
  formData.append("content", content);
  formData.append("file", file);
  formData.append("topic_id", topicId);
  formData.append("user_id", userId);

  commentModal.style.display = "none";

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./api/post-comment.php", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      let response = JSON.parse(xhr.responseText);

      if (response.status === "success") {
        alert("Comment posted successfully!");
        window.location.reload();
      } else {
        alert("Error posting comment: " + response.message);
      }
    } else {
      alert("Error posting comment. Please try again.");
    }
  };
  xhr.send(formData);
}

function setVar(id) {
  topicId = id;
  document.getElementById("new-comment-submission").style.display = "block";
}