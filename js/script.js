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
    console.log(document.getElementById("topic-content").value);
    modal.style.display = "none";
  });

  var cancelBtn = document.getElementById("cancel-btn");
  cancelBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });
});
