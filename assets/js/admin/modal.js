const userModal = document.getElementById("activityModal");
const announcementModal = document.getElementById("announcementModal");
const addActBtn = document.querySelectorAll(
  ".editBtn, #addAnnounceBtn"
);
console.log(addActBtn)
addActBtn.forEach((btn) => {
  btn.onclick = function () {
    if (btn.id == "addAnnounceBtn") {
      announcementModal.style.display = "block";
    }
    if (btn.id == "addActBtn") {
      activityModal.style.display = "block";
    }
  };
});

const modals = document.querySelectorAll(".modal");
console.log(modals);

function closeModal(modal) {
  if (modal) {
    modal.style.display = "none";
  }
}

modals.forEach((modal) => {
  modal.onclick = function (e) {
    if (
      e.target.classList.contains("close") ||
      e.target.classList.contains("times")
    ) {
      closeModal(modal);
      e.stopPropagation();
    }
  };
});

window.addEventListener("click", function (e) {
  if (e.target.classList.contains("modal")) {
    closeModal(e.target);
  }
});
