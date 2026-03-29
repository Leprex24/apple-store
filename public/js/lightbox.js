//to z LAB9
class Lightbox {
    constructor() {
        this.currentIndex = 0;
        this.images = [];
        this.isOpen = false;
        this.init();
    }

    init() {
        // Zbierz wszystkie zdjęcia z karuzeli
        this.collectImages();
        
        // Stwórz strukturę lightbox'a
        this.createLightbox();
        
        // Dodaj event listenery
        this.addEventListeners();
    }

    collectImages() {
        const carouselImages = document.querySelectorAll('#carouselExampleDark .carousel-item img');
        this.images = Array.from(carouselImages).map(img => ({
            src: img.src,
            alt: img.alt
        }));
    }

    createLightbox() {
        // Stwórz główny kontener lightbox'a
        const lightbox = document.createElement('div');
        lightbox.className = 'lightbox';
        lightbox.id = 'lightbox';

        lightbox.innerHTML = `
            <div class="lightbox-content">
                <button class="lightbox-close" id="lightbox-close">&times;</button>
                <button class="lightbox-nav lightbox-prev" id="lightbox-prev">&#8249;</button>
                <img class="lightbox-image" id="lightbox-image" src="" alt="">
                <button class="lightbox-nav lightbox-next" id="lightbox-next">&#8250;</button>
                <div class="lightbox-counter" id="lightbox-counter">1 / ${this.images.length}</div>
            </div>
        `;

        document.body.appendChild(lightbox);
    }

    addEventListeners() {
        // Kliknięcie na zdjęcia w karuzeli
        const carouselImages = document.querySelectorAll('#carouselExampleDark .carousel-item img');
        carouselImages.forEach((img, index) => {
            img.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.openLightbox(index);
            });
        });

        // Przyciski nawigacyjne i zamknięcia
        document.getElementById('lightbox-close').addEventListener('click', () => this.closeLightbox());
        document.getElementById('lightbox-prev').addEventListener('click', () => this.prevImage());
        document.getElementById('lightbox-next').addEventListener('click', () => this.nextImage());

        // Kliknięcie na tło - zamknij lightbox
        document.getElementById('lightbox').addEventListener('click', (e) => {
            if (e.target.id === 'lightbox') {
                this.closeLightbox();
            }
        });

        // Obsługa klawiatury
        document.addEventListener('keydown', (e) => {
            if (!this.isOpen) return;

            switch(e.key) {
                case 'Escape':
                    this.closeLightbox();
                    break;
                case 'ArrowLeft':
                    this.prevImage();
                    break;
                case 'ArrowRight':
                    this.nextImage();
                    break;
            }
        });

        // Obsługa gestów dotykowych (swipe) na urządzeniach mobilnych
        let startX = 0;
        let endX = 0;

        document.getElementById('lightbox-image').addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        document.getElementById('lightbox-image').addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            this.handleSwipe();
        });
    }

    handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Swipe w lewo - następne zdjęcie
                this.nextImage();
            } else {
                // Swipe w prawo - poprzednie zdjęcie
                this.prevImage();
            }
        }
    }

    openLightbox(index) {
        this.currentIndex = index;
        this.isOpen = true;
        this.updateImage();
        document.getElementById('lightbox').classList.add('active');
        document.body.style.overflow = 'hidden'; // Zablokuj przewijanie strony
    }

    closeLightbox() {
        this.isOpen = false;
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = ''; // Przywróć przewijanie strony
    }

    nextImage() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
        this.updateImage();
    }

    prevImage() {
        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
        this.updateImage();
    }

    updateImage() {
        const image = document.getElementById('lightbox-image');
        const counter = document.getElementById('lightbox-counter');
        
        // Dodaj efekt fade podczas zmiany zdjęcia
        image.style.opacity = '0';
        
        setTimeout(() => {
            image.src = this.images[this.currentIndex].src;
            image.alt = this.images[this.currentIndex].alt;
            counter.textContent = `${this.currentIndex + 1} / ${this.images.length}`;
            image.style.opacity = '1';
        }, 150);

        // Ukryj przyciski nawigacyjne jeśli jest tylko jedno zdjęcie
        const prevBtn = document.getElementById('lightbox-prev');
        const nextBtn = document.getElementById('lightbox-next');
        
        if (this.images.length <= 1) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
        } else {
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'block';
        }
    }

    // Metoda do aktualizacji zdjęć jeśli zawartość karuzeli się zmieni
    updateImages() {
        this.collectImages();
        if (this.isOpen) {
            this.updateImage();
        }
    }
}

// Inicjalizacja lightbox'a po załadowaniu DOM
document.addEventListener('DOMContentLoaded', function() {
    // Poczekaj chwilę na załadowanie Bootstrap carousel
    setTimeout(() => {
        window.lightbox = new Lightbox();
    }, 100);
});

// Export dla przypadku gdy używamy modułów
if (typeof module !== 'undefined' && module.exports) {
    module.exports = Lightbox;
}