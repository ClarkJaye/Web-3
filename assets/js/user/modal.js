const activityModal = document.getElementById("activityModal");
const setActivityModal = document.getElementById("setActivityModal");
const announcementModal = document.getElementById("announcementModal");
const addFriendsModal = document.getElementById("addFriendsModal");
const viewFriendsModal = document.getElementById("viewFriendsModal");
const addActBtn = document.querySelectorAll(
  "#addActBtn, #showSetModalBtn, #viewAnnounceBtn, #addFrndBtn, #viewFrndBtn"
);
console.log(addActBtn);

addActBtn.forEach((btn) => {
  btn.onclick = function () {
    if (btn.id == "addActBtn") {
      activityModal.style.display = "block";
    } else if (btn.id == "showSetModalBtn") {
      setActivityModal.style.display = "block";
    } else if (btn.id == "viewAnnounceBtn") {
      announcementModal.style.display = "block";
    } else if (btn.id == "addFrndBtn") {
      addFriendsModal.style.display = "block";
    } else if (btn.id == "viewFrndBtn") {
      viewFriendsModal.style.display = "block";
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

// window.addEventListener("click", function (e) {
//   if (e.target.classList.contains("modal")) {
//     closeModal(e.target);
//   }
// });

// For add
let uploadBtn = document.getElementById("file");
let imageCont = document.querySelector(".img-cont");
let choosenImage = document.getElementById("choosen-img");
let fileName = document.getElementById("photo-name");
console.log(uploadBtn);

uploadBtn.addEventListener("change", () => {
  imageCont.style.display = "block";
  let reader = new FileReader();
  reader.readAsDataURL(uploadBtn.files[0]);
  console.log(uploadBtn.files[0].name);
  reader.onload = () => {
    choosenImage.setAttribute("src", reader.result);
  };
  fileName.textContent = uploadBtn.files[0].name;
});
// For edit
let editUploadBtn = document.getElementById("edit-file");
let editImageCont = document.getElementById("edit-img-cont");
let editChoosenImage = document.getElementById("edit-choosen-img");
let editFileName = document.getElementById("edit-photo-name");

editUploadBtn.addEventListener("change", () => {
  editImageCont.style.display = "block";
  let reader = new FileReader();
  reader.readAsDataURL(editUploadBtn.files[0]);
  reader.onload = () => {
    editChoosenImage.setAttribute("src", reader.result);
  };
  editFileName.textContent = editUploadBtn.files[0].name;
});
