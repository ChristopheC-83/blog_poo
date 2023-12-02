const btnNewPostCard = document.querySelector("#btnNewPostCard");
const title = document.querySelector("#title");
const pitch = document.querySelector("#pitch");
const url = document.querySelector("#url");

function allFieldsCompleted() {
  if (title.value !== "" && pitch.value !== "" && url.value !== "") {
    btnNewPostCard.classList.remove("disabled");
  } else {
    btnNewPostCard.classList.add("disabled");
  }
}
if (title) {
  title.addEventListener("keyup", () => {
    allFieldsCompleted();
  });
  pitch.addEventListener("keyup", () => {
    allFieldsCompleted();
  });
  url.addEventListener("keyup", () => {
    allFieldsCompleted();
  });
}

const selectPost = document.querySelector("#selectPost");
if (selectPost) {
  selectPost.addEventListener("change", function () {
    document.getElementById("containerNewPostCard").submit();
  });
}
const selectTemplate = document.querySelector("#selectTemplate");
if (selectTemplate) {
  selectTemplate.addEventListener("change", function () {
    document.getElementById("containerNewTemplate").submit();
  });
}
