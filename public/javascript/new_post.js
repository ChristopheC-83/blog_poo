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

title.addEventListener("keyup", () => {
    allFieldsCompleted();
});
pitch.addEventListener("keyup", () => {
    allFieldsCompleted();
});
url.addEventListener("keyup", () => {
    allFieldsCompleted();
});
