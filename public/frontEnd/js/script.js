
$(function () {
  // $("#navBar").load("navBar.html");
  $("#country").load("sideMenu.html");
  // $("#footer").load("Footer.html");
  
});


// const viewBtn = document.querySelector(".view--btn");
// const summarySection = document.querySelector(".summary--section");
// const viewBtnImg = document.querySelector(".view--btn-img");
// viewBtn.addEventListener("click", () => {
//   summarySection.classList.toggle("hide-content");

//   let currentSrc = viewBtnImg.src;
//   let altSrc = viewBtnImg.getAttribute("data-alt-src");

//   viewBtnImg.src = altSrc;
//   viewBtnImg.setAttribute("data-alt-src", currentSrc);
// });

const cancelOrderBtn = document.querySelector(".cancel--order-btn");
const cancelPopUp = document.querySelector(".cancel-pop-up");
cancelOrderBtn.addEventListener("click", () => {
  cancelPopUp.classList.remove("hide-content");
});

const cancelCloseBtn = document.querySelector(".cancel-close--btn");
const keepBTn = document.querySelector(".keep");

cancelCloseBtn.addEventListener("click", () => {
  cancelPopUp.classList.add("hide-content");
});

keepBTn.addEventListener("click", () => {
  cancelPopUp.classList.add("hide-content");
});

const progressStatus = document.querySelector(".progress-status");
const cancelBtn = document.querySelector(".cancel");

cancelBtn.addEventListener("click", () => {
  cancelPopUp.classList.add("hide-content");
  progressStatus.innerHTML = "cancelled";
});
// ////////////////////////////////////////////////////////////////////////////
const addressesSection = document.querySelector(".addresses-section");
const addressForm = document.querySelector(".address-form");
const addAddressBtn = document.querySelector(".add-address--btn");

addAddressBtn.addEventListener("click", () => {
  addressesSection.classList.add("hide-content");
  addressForm.classList.remove("hide-content");
});

const cancelAddBtn = document.querySelector(".cancel--btn");

cancelAddBtn.addEventListener("click", () => {
  addressesSection.classList.remove("hide-content");
  addressForm.classList.add("hide-content");
});




