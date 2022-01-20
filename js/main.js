/*----- Navbar User Dropdown  -----*/
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
          
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


/*----- Account Edit Button -----*/
// Email Edit Button
const editBtn = document.querySelector('.edit-acc-btn');
const dataArea = document.querySelector('#dashboardEditEmail');
const editArea = document.querySelector('.edit-area');

editBtn.addEventListener('click', ()=>{
  dataArea.classList.toggle('dashboard-account-content-hide')
  editArea.classList.toggle('dashboard-account-content-reveal');
});

// Password Edit Button
const editBtn2 = document.querySelector('.edit-acc-btn2');
const dataArea2 = document.querySelector('#dashboardEditPassword');
const editArea2 = document.querySelector('.edit-area2');

editBtn2.addEventListener('click', ()=>{
  dataArea2.classList.toggle('dashboard-account-content-hide')
  editArea2.classList.toggle('dashboard-account-content-reveal');
});

// Phonenumber Edit Button
const editBtn3 = document.querySelector('.edit-acc-btn3');
const dataArea3 = document.querySelector('#dashboardEditPhonenumber');
const editArea3 = document.querySelector('.edit-area3');

editBtn3.addEventListener('click', ()=>{
  dataArea3.classList.toggle('dashboard-account-content-hide')
  editArea3.classList.toggle('dashboard-account-content-reveal');
});

// Firstname Parent Edit Button
const editBtn4 = document.querySelector('.edit-acc-btn4');
const dataArea4 = document.querySelector('#dashboardEditFirstname_parent');
const editArea4 = document.querySelector('.edit-area4');

editBtn4.addEventListener('click', ()=>{
  dataArea4.classList.toggle('dashboard-account-content-hide')
  editArea4.classList.toggle('dashboard-account-content-reveal');
});

// Lastname Parent Edit Button
const editBtn5 = document.querySelector('.edit-acc-btn5');
const dataArea5 = document.querySelector('#dashboardEditLastname_parent');
const editArea5 = document.querySelector('.edit-area5');

editBtn5.addEventListener('click', ()=>{
  dataArea5.classList.toggle('dashboard-account-content-hide')
  editArea5.classList.toggle('dashboard-account-content-reveal');
});

// Firstname Child Edit Button
const editBtn6 = document.querySelector('.edit-acc-btn6');
const dataArea6 = document.querySelector('#dashboardEditFirstname_child');
const editArea6 = document.querySelector('.edit-area6');

editBtn6.addEventListener('click', ()=>{
  dataArea6.classList.toggle('dashboard-account-content-hide')
  editArea6.classList.toggle('dashboard-account-content-reveal');
});

// Age Child Edit Button
const editBtn7 = document.querySelector('.edit-acc-btn7');
const dataArea7 = document.querySelector('#dashboardEditAge');
const editArea7 = document.querySelector('.edit-area7');

editBtn7.addEventListener('click', ()=>{
  dataArea7.classList.toggle('dashboard-account-content-hide')
  editArea7.classList.toggle('dashboard-account-content-reveal');
});


//Inplannen
