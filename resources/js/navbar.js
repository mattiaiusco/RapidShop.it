let searchBarNavbar = document.querySelector('#searchBar-navbar');
let searchBarHeader = document.querySelector('#searchBarHeader');

let observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      searchBarNavbar.classList.add("d-none"); // Rimuovi la classe "d-none" quando l'elemento è visibile
    } else {
      searchBarNavbar.classList.remove("d-none"); // Aggiungi la classe "d-none" quando l'elemento è fuori dalla vista
    }
  });
});

observer.observe(searchBarHeader);
