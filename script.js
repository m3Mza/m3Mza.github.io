

// Funkcija za crnu krivu (KUL)

(function() {
    
    var $curve = document.getElementById("curve");
    var last_known_scroll_position = 0;
    var defaultCurveValue = 350;
    var curveRate = 3;
    var ticking = false;
    var curveValue;
  
    
    function scrollEvent(scrollPos) {
      if (scrollPos >= 0 && scrollPos < defaultCurveValue) {
        curveValue = defaultCurveValue - parseFloat(scrollPos / curveRate);
        $curve.setAttribute(
          "d",
          "M 800 300 Q 400 " + curveValue + " 0 300 L 0 0 L 800 0 L 800 300 Z"
        );
      }
    }
  
    
    window.addEventListener("scroll", function(e) {
      last_known_scroll_position = window.scrollY;
  
      if (!ticking) {
        window.requestAnimationFrame(function() {
          scrollEvent(last_known_scroll_position);
          ticking = false;
        });
      }
  
      ticking = true;
    });
  })();
  

  // Navigacioni meni koji iskace pri listanju
  
  document.addEventListener('DOMContentLoaded', function() {
    var header = document.querySelector('header');
    var fixedNav = document.querySelector('.fiksirani-meni');
    var main = document.querySelector('main');
    
    var headerHeight = header.offsetHeight;
    
    window.addEventListener('scroll', function() {
        if (window.scrollY >= headerHeight) {
            fixedNav.style.display = 'block';
            fixedNav.style.opacity = '1';
        } else {
            fixedNav.style.display = 'none';
            fixedNav.style.opacity = '0';
        }
    });
});



// Slajder veliki

let slajdIndeks = 0;
prikaziSlajd(slajdIndeks);

function moveSlide(n) {
  prikaziSlajd(slajdIndeks += n);
}

function trenutniSlajd(n) {
  prikaziSlajd(slajdIndeks = n);
}

function prikaziSlajd(n) {
  let i;
  let slides = document.getElementsByClassName("slajd");
  if (n >= slides.length) {slajdIndeks = 0}
  if (n < 0) {slajdIndeks = slides.length - 1}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.opacity = 0;
    slides[i].style.display = "none";
  }
  slides[slajdIndeks].style.display = "flex";
  setTimeout(() => slides[slajdIndeks].style.opacity = 1, 10);
  dots[slajdIndeks].className += " active";
}


// Alert za poruke na email formi


document.getElementById('kontakt-forma').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting normally
  
  // Perform form validation if needed (e.g., check if fields are filled properly)
  // You can add validation logic here
  
  // Submit the form using fetch API
  fetch('slanje_poruke.php', {
      method: 'POST',
      body: new FormData(document.getElementById('kontakt-forma'))
  })
  .then(response => {
      if (response.ok) {
          alert('Poruka je uspješno poslana!');
          document.getElementById('kontakt-forma').reset(); // Reset the form
      } else {
          alert('Došlo je do greške prilikom slanja poruke. Molimo pokušajte ponovo.');
      }
  })
  .catch(error => {
      console.error('Greška:', error);
      alert('Došlo je do greške prilikom slanja poruke. Molimo pokušajte ponovo.');
  });
});




// Pretraga recepata

function searchRecipes() {
  const searchInput = document.getElementById('searchInput').value.toLowerCase();
  const dietType = document.querySelector('input[name="dietType"]:checked').value;

  const xhr = new XMLHttpRequest();
  xhr.open("GET", `pretraga-recepata.php?searchInput=${encodeURIComponent(searchInput)}&dietType=${encodeURIComponent(dietType)}`, true);
  xhr.onload = function() {
      if (xhr.status === 200) {
          const results = JSON.parse(xhr.responseText);
          displayResults(results);
      } else {
          console.error('Zahtev neuspesan. Status:', xhr.status);
          displayError();
      }
  };
  xhr.onerror = function() {
      console.error('Zahtev neuspesan. Greska mreze');
      displayError();
  };
  xhr.send();
}

function displayResults(results) {
  const resultsContainer = document.getElementById('searchResults');
  resultsContainer.innerHTML = '';

  if (results.length === 0) {
      resultsContainer.innerHTML = '<p>Nismo pronašli recepte</p>';
      return;
  }

  results.forEach(result => {
      const resultItem = document.createElement('div');
      resultItem.classList.add('result-item');
      resultItem.innerHTML = `<a href="${result.link}" target="_blank">${result.titl}</a>`;
      resultsContainer.appendChild(resultItem);
  });
}

function displayError() {
  const resultsContainer = document.getElementById('searchResults');
  resultsContainer.innerHTML = '<p>Došlo je do greške prilikom pretrage. Molimo pokušajte ponovo kasnije.</p>';
}

















  
  






















