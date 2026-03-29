// // sprawia ze scrollowanie ma bardziej gładki efekt gdy klikamy na naglowek
// document.querySelectorAll('.nav-link').forEach(link => {
//     link.addEventListener('click', function (e) {
//         e.preventDefault();
//         const targetId = this.getAttribute('href');
//         const targetElement = document.querySelector(targetId);

//         if (targetElement) {
//             targetElement.scrollIntoView({
//                 behavior: 'smooth',
//                 block: 'start'
//             });

//             // zmienia ktory z naglowkow ma miec otoczke
//             document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
//             this.classList.add('active');
//         }
//     });
// });

// // zmienia ktory naglowek ma miec otoczke poprzez scrollowanie
// window.addEventListener('scroll', () => {
//     const sections = document.querySelectorAll('.content-section');
//     const navLinks = document.querySelectorAll('.nav-link');

//     let current = '';
//     sections.forEach(section => {
//         const sectionTop = section.offsetTop - 100;
//         if (pageYOffset >= sectionTop) {
//             current = section.getAttribute('id');
//         }
//     });

//     navLinks.forEach(link => {
//         link.classList.remove('active');
//         if (link.getAttribute('href') === `#${current}`) {
//             link.classList.add('active');
//         }
//     });
// });

//// Poprawiony kod bo w wersji wyslanej nie dziala przenoszenie na strone index.html
//// przez pokrywajace sie nazwy klas. Dodalem sprawdzanie czy klasa z tym linkiem
//// prowadzi do odnosnika na stronie zaczynajacego sie # czy do linku do innej strony
// // sprawia ze scrollowanie ma bardziej gładki efekt gdy klikamy na naglowek
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
        const targetId = this.getAttribute('href');
        
        // Sprawdź czy link prowadzi do sekcji na tej samej stronie (zaczyna się od #)
        if (targetId && targetId.startsWith('#')) {
            e.preventDefault();
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // zmienia ktory z naglowkow ma miec otoczke
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        }
        // Jeśli link nie zaczyna się od #, pozwól na normalne działanie (np. przejście do index.html)
    });
});

// zmienia ktory naglowek ma miec otoczke poprzez scrollowanie
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('.content-section');
    const navLinks = document.querySelectorAll('.nav-link');

    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        if (pageYOffset >= sectionTop) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});