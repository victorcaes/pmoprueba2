const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", () => {
  navMenu.classList.toggle("nav-menu_visible");

  if (navMenu.classList.contains("nav-menu_visible")) {
    navToggle.setAttribute("aria-label", "Cerrar menú");
  } else {
    navToggle.setAttribute("aria-label", "Abrir menú");
  }
});

const activePage=window.location.pathname;

const navLinks = document.querySelectorAll(".nav-menu li a").
forEach(link => {
  if(link.href.includes(`${activePage}`)){
    link.classList.add('nav-menu-link_active')
  }
  
});

// const numb=document.querySelector(".numb");
// let counter=0;
// setInterval(()=>{
//   if(counter==4.8){
//     clearInterval();
//   }else{
//     counter= counter +0.1;
    
//     numb.textContent=counter +"%";
//   }
// },500);