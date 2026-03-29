// to z LAB11 czesc 2
// Funkcja inicjalizująca mapę
function initMap() {
    var wspolrzedne = new google.maps.LatLng(51.235376082919664, 22.553055996448503);
    var opcjeMapy = {
        zoom: 15,
        center: wspolrzedne,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var mapa = new google.maps.Map(
        document.getElementById("mapka"),
        opcjeMapy
    );

    // Dodaj marker
    var marker = new google.maps.Marker({
        position: wspolrzedne,
        map: mapa,
        title: 'Nasza lokalizacja'
    });
}


function renderCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const itemsCount = document.getElementById('items-count');

    if (!cartItemsContainer) return; // Zabezpieczenie - jeśli nie ma kontenera, nie wykonuj

    if (cartData.products.length === 0) {
        cartItemsContainer.innerHTML = `
            <div class="empty-cart-message alert alert-danger">
                <i class="fa-shopping-cart fa-3x mb-3"></i>
                <h4>Koszyk jest pusty</h4>
                <p>Dodaj produkty do koszyka, aby kontynuować zakupy.</p>
            </div>
        `;
        if (itemsCount) itemsCount.textContent = '0 produktów';
        return;
    }

    let cartHTML = '';
    let totalItems = 0;

    cartData.products.forEach((product, index) => {
        totalItems += product.quantity;
        cartHTML += `
            <div class="product-item">
                <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <h6 class="text-muted">Produkt</h6>
                        <h6 class="mb-0">${product.name}</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2" onclick="changeQuantity(${index}, -1)">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" min="1" value="${product.quantity}"
                               class="form-control form-control-sm text-center"
                               onchange="updateQuantity(${index}, this.value)" />
                        <button class="btn btn-link px-2" onclick="changeQuantity(${index}, 1)">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0">${(product.price * product.quantity).toFixed(2)} zł</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <button class="btn btn-danger" onclick="removeProduct(${index})">
                            <i class="bi-trash-fill me-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    });

    cartItemsContainer.innerHTML = cartHTML;
    if (itemsCount) {
        const itemText = totalItems === 1 ? 'produkt' : totalItems < 5 ? 'produkty' : 'produktów';
        itemsCount.textContent = `${totalItems} ${itemText}`;
    }
}

function changeQuantity(index, change) {
    cartData.products[index].quantity += change;
    if (cartData.products[index].quantity < 1) {
        cartData.products[index].quantity = 1;
    }
    saveCart();
    renderCart();
    updateSummary();
}

function updateQuantity(index, newQuantity) {
    const qty = parseInt(newQuantity);
    if (qty >= 1) {
        cartData.products[index].quantity = qty;
        saveCart();
        renderCart();
        updateSummary();
    }
}

function removeProduct(index) {
    cartData.products.splice(index, 1);
    saveCart();
    renderCart();
    updateSummary();
}
// to z LAB6
function updateSummary() {
    const summaryItems = document.getElementById('summary-items');
    const totalPriceEl = document.getElementById('total-price');
    const finalPriceEl = document.getElementById('final-price');
    const checkoutBtn = document.getElementById('checkout-btn');
    const installmentCheckbox = document.getElementById('installment-checkbox');

    if (!summaryItems || !totalPriceEl || !finalPriceEl) return; // Zabezpieczenie

    let totalItems = 0;
    let subtotal = 0;

    cartData.products.forEach(product => {
        totalItems += product.quantity;
        subtotal += product.price * product.quantity;
    });

    const shippingOption = document.getElementById('shipping-option');
    const shippingCost = shippingOption ? parseFloat(shippingOption.value) : 5;
    //const totalPrice = subtotal + shippingCost;
    // Sprawdź czy płatność ratalna jest włączona
    const isInstallment = installmentCheckbox && installmentCheckbox.checked;
    let totalPrice;

    if (isInstallment) {
        // Jeśli płatność ratalna jest włączona, oblicz całkowity koszt rat + dostawa
        const installmentMonths = document.getElementById('installmentMonths');
        const months = installmentMonths ? parseInt(installmentMonths.value) || 12 : 12;

        // Symulacja odsetek (3% rocznie)
        const annualRate = 0.03;
        const monthlyRate = annualRate / 12;
        const subtotalWithInterest = subtotal * (1 + (monthlyRate * months));
        totalPrice = subtotalWithInterest + shippingCost;
    } else {
        // Cena standardowa
        totalPrice = subtotal + shippingCost;
    }
    summaryItems.textContent = `Cena produktów`;
    totalPriceEl.textContent = `${subtotal.toFixed(2)} zł`;
    finalPriceEl.textContent = `${totalPrice.toFixed(2)} zł`;

    // Aktywuj/dezaktywuj przycisk płatności
    if (checkoutBtn) {
        if (cartData.products.length > 0) {
            checkoutBtn.disabled = false;
            checkoutBtn.classList.remove('btn-disabled');
        } else {
            checkoutBtn.disabled = true;
            checkoutBtn.classList.add('btn-disabled');
        }
    }

    updateInstallmentCalculation();
}
// to z LAB6 funkcje obliczajace cene na podstawie wybranych rzeczy w formularzu
function updateInstallmentCalculation() {
    const installmentCheckbox = document.getElementById('installment-checkbox');
    const installmentMonths = document.getElementById('installment-months');
    const finalPriceEl = document.getElementById('final-price');
    const monthlyCostEl = document.getElementById('monthly-cost');
    const totalInstallmentCostEl = document.getElementById('total-installment-cost');

    if (!installmentCheckbox || !finalPriceEl) return;

    const isInstallment = installmentCheckbox.checked;
    const months = installmentMonths ? parseInt(installmentMonths.value) || 12 : 12;

    if (isInstallment && monthlyCostEl && totalInstallmentCostEl) {
        // Oblicz subtotal produktów (bez dostawy)
        let subtotal = 0;
        cartData.products.forEach(product => {
            subtotal += product.price * product.quantity;
        });

        // Oblicz koszt dostawy
        const shippingOption = document.getElementById('shipping-option');
        const shippingCost = shippingOption ? parseFloat(shippingOption.value) : 5;

        // Symulacja odsetek (3% rocznie) - tylko na produkty, nie na dostawę
        const annualRate = 0.03;
        const monthlyRate = annualRate / 12;
        const subtotalWithInterest = subtotal * (1 + (monthlyRate * months));
        const totalWithInterestAndShipping = subtotalWithInterest;

        // Rata miesięczna (produkty z odsetkami + proporcjonalna część dostawy)
        const monthlyCost = subtotalWithInterest / months;

        monthlyCostEl.textContent = `${monthlyCost.toFixed(2)} zł`;
        totalInstallmentCostEl.textContent = `${totalWithInterestAndShipping.toFixed(2)} zł`;
    }
}
// to z LAB11 czesc 1
// Funkcja do dodawania produktu do koszyka (uniwersalna)
function addToCart(product) {
    // Sprawdź czy produkt już istnieje w koszyku
    const existingProductIndex = cartData.products.findIndex(p => p.id === product.id);

    if (existingProductIndex !== -1) {
        // Jeśli produkt już istnieje, zwiększ ilość
        cartData.products[existingProductIndex].quantity += product.quantity || 1;
    } else {
        // Jeśli nie istnieje, dodaj nowy produkt
        cartData.products.push({
            id: product.id,
            name: product.name,
            price: product.price,
            quantity: product.quantity || 1
        });
    }

    saveCart();

    // Pokaż komunikat o dodaniu do koszyka (opcjonalnie)
    if (typeof showAddToCartMessage === 'function') {
        showAddToCartMessage(product.name);
    }
}



// Event listeners dla strony koszyka
document.addEventListener('DOMContentLoaded', function () {
    // Załaduj koszyk przy starcie strony
    loadCart();

    // Event listeners dla formularza kontaktowego (jeśli istnieje)
    const form = document.getElementById('contactForm');
    if (form) {
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const messageInput = document.getElementById('message');
        const radioInputs = document.querySelectorAll('input[name="CzyZakupy"]');
        const resetButton = document.getElementById('resetButton');
        const successMessage = document.getElementById('submitSuccessMessage');

        // Funkcja do czyszczenia formularza
        function clearForm() {
            form.reset();
            // Ukryj wszystkie błędy
            document.querySelectorAll('.error-message').forEach(error => {
                error.style.display = 'none';
            });
            // Usuń klasy błędów z inputów
            document.querySelectorAll('.form-control, .form-check-input').forEach(input => {
                input.classList.remove('is-invalid');
            });
            // Ukryj komunikat sukcesu
            if (successMessage) successMessage.classList.add('d-none');
        }
        // to z LAB8 praktycznie cala funkcja odnosi sie do wyswietlania bledow
        // Funkcja do pokazywania błędów
        function showError(inputId, errorId, message) {
            const errorElement = document.getElementById(errorId);
            const inputElement = document.getElementById(inputId);
            if (errorElement && inputElement) {
                errorElement.textContent = message;
                errorElement.style.display = 'block';
                inputElement.classList.add('is-invalid');
            }
        }

        // Funkcja do ukrywania błędów
        function hideError(inputId, errorId) {
            const errorElement = document.getElementById(errorId);
            const inputElement = document.getElementById(inputId);
            if (errorElement && inputElement) {
                errorElement.style.display = 'none';
                inputElement.classList.remove('is-invalid');
            }
        }

        // Walidacja imienia i nazwiska (tylko litery)
        if (nameInput) {
            nameInput.addEventListener('input', function () {
                const value = this.value;
                const regex = /^[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ\s]*$/;

                if (!regex.test(value)) {
                    this.value = value.replace(/[^A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ\s]/g, '');
                    showError('name', 'nameError', 'Imię i nazwisko może zawierać tylko litery.');
                } else {
                    hideError('name', 'nameError');
                }
            });
        }

        // Walidacja telefonu (tylko cyfry, max 9)
        if (phoneInput) {
            phoneInput.addEventListener('input', function () {
                let value = this.value.replace(/[^0-9]/g, '');
                if (value.length > 9) {
                    value = value.slice(0, 9);
                }
                this.value = value;

                if (value.length > 0 && value.length !== 9) {
                    showError('phone', 'phoneError', 'Numer telefonu musi składać się z dokładnie 9 cyfr.');
                } else {
                    hideError('phone', 'phoneError');
                }
            });
        }

        // Walidacja emaila
        if (emailInput) {
            emailInput.addEventListener('blur', function () {
                const value = this.value;
                const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                if (value && !regex.test(value)) {
                    showError('email', 'emailError', 'Wprowadź prawidłowy adres email (np. nazwa@domena.pl).');
                } else {
                    hideError('email', 'emailError');
                }
            });
        }

        // Walidacja formularza przy submicie
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            let isValid = true;

            // Sprawdź imię i nazwisko
            if (nameInput) {
                if (!nameInput.value.trim()) {
                    showError('name', 'nameError', 'Imię i nazwisko jest wymagane.');
                    isValid = false;
                } else if (!/^[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ\s]+$/.test(nameInput.value)) {
                    showError('name', 'nameError', 'Imię i nazwisko może zawierać tylko litery.');
                    isValid = false;
                }
            }

            // Sprawdź email
            if (emailInput) {
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailInput.value.trim()) {
                    showError('email', 'emailError', 'Email jest wymagany.');
                    isValid = false;
                } else if (!emailRegex.test(emailInput.value)) {
                    showError('email', 'emailError', 'Wprowadź prawidłowy adres email.');
                    isValid = false;
                }
            }

            // Sprawdź telefon
            if (phoneInput) {
                if (!phoneInput.value.trim()) {
                    showError('phone', 'phoneError', 'Numer telefonu jest wymagany.');
                    isValid = false;
                } else if (phoneInput.value.length !== 9 || !/^[0-9]{9}$/.test(phoneInput.value)) {
                    showError('phone', 'phoneError', 'Numer telefonu musi składać się z dokładnie 9 cyfr.');
                    isValid = false;
                }
            }

            // Sprawdź wiadomość
            if (messageInput) {
                if (!messageInput.value.trim()) {
                    showError('message', 'messageError', 'Wiadomość jest wymagana.');
                    isValid = false;
                } else {
                    hideError('message', 'messageError');
                }
            }

            // Sprawdź przyciski radio
            if (radioInputs.length > 0) {
                const isRadioSelected = Array.from(radioInputs).some(radio => radio.checked);
                const radioError = document.getElementById('radioError');
                if (!isRadioSelected && radioError) {
                    radioError.style.display = 'block';
                    isValid = false;
                } else if (radioError) {
                    radioError.style.display = 'none';
                }
            }

            // Sprawdź checkbox polityki prywatności
            const privacyCheckbox = document.getElementById('privacy');
            if (privacyCheckbox && !privacyCheckbox.checked) {
                isValid = false;
                // Bootstrap automatycznie pokaże błąd dla required checkbox
            }

            if (isValid && successMessage) {
                // Pokaż komunikat sukcesu
                successMessage.classList.remove('d-none');

                // Przewiń do komunikatu sukcesu
                successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });

                // Wyczyść formularz po 2 sekundach
                setTimeout(function () {
                    clearForm();
                }, 3000);
            }
        });

        // Ukryj błąd radio buttonów gdy któryś zostanie zaznaczony
        radioInputs.forEach(radio => {
            radio.addEventListener('change', function () {
                const radioError = document.getElementById('radioError');
                if (radioError) radioError.style.display = 'none';
            });
        });
    }

    // Event listeners dla strony koszyka
    const shippingOption = document.getElementById('shipping-option');
    if (shippingOption) {
        shippingOption.addEventListener('change', updateSummary);
    }

    const installmentCheckbox = document.getElementById('installment-checkbox');
    if (installmentCheckbox) {
        installmentCheckbox.addEventListener('change', function () {
            const installmentSection = document.getElementById('installment-section');
            if (installmentSection) {
                if (this.checked) {
                    installmentSection.style.display = 'block';
                    updateInstallmentCalculation();
                } else {
                    installmentSection.style.display = 'none';
                }
            }
            updateSummary();
        });
    }

    const installmentMonths = document.getElementById('installment-months');
    if (installmentMonths) {
        installmentMonths.addEventListener('input', function() {
            updateInstallmentCalculation();
            updateSummary(); // Przelicz także łączną cenę
        });
    }

    const checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function () {
            if (!this.disabled) {
                alert('Przekierowanie do płatności...');
            }
        });
    }
});

// Skrypt do dodawania produktów do koszyka (np. iPhone 16 Pro)
document.addEventListener('DOMContentLoaded', function () {
    const addToCartBtn = document.querySelector('.btn.btn-outline-primary.flex-shrink-0');

    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', async function (e) {
            e.preventDefault();

            // Pobierz ID produktu z data-attribute (musisz je dodać w widoku)
            const productId = this.dataset.productId;
            const quantityInput = document.getElementById('inputQuantity');
            const quantity = parseInt(quantityInput.value) || 1;

            try {
                const response = await fetch('/koszyk/dodaj', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Aktualizuj licznik koszyka w nawigacji
                    const cartBadge = document.querySelector('.badge.bg-dark.text-white.ms-1.rounded-pill');
                    if (cartBadge) {
                        cartBadge.textContent = data.cartCount;
                    }

                    // Pokaż komunikat sukcesu
                    const productName = document.querySelector('.display-5.fw-bolder').textContent.trim();
                    showAddToCartNotification(productName, quantity);
                } else {
                    alert('Błąd podczas dodawania produktu do koszyka');
                }
            } catch (error) {
                console.error('Błąd:', error);
                alert('Wystąpił błąd. Spróbuj ponownie.');
            }
        });
    }
});


// Funkcja do pokazywania powiadomienia o dodaniu do koszyka
function showAddToCartNotification(productName, quantity) {
    // Usuń poprzednie powiadomienie jeśli istnieje
    const existingNotification = document.getElementById('cart-notification');
    if (existingNotification) {
        existingNotification.remove();
    }

    // Utwórz powiadomienie
    const notification = document.createElement('div');
    notification.id = 'cart-notification';
    notification.className = 'alert alert-primary position-fixed';
    notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        animation: slideInRight 0.3s ease-out;
    `;

    const quantityText = quantity === 1 ? '' : ` (${quantity} szt.)`;
    notification.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2 text-primary fs-4"></i>
            <div>
                <strong>Dodano do koszyka!</strong><br>
                <small>${productName}${quantityText}</small>
            </div>
            <button type="button" class="btn-close ms-auto" aria-label="Close"></button>
        </div>
    `;

    // Dodaj style animacji do head jeśli nie istnieją
    if (!document.getElementById('cart-notification-styles')) {
        const style = document.createElement('style');
        style.id = 'cart-notification-styles';
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Dodaj powiadomienie do strony
    document.body.appendChild(notification);

    // Obsługa zamknięcia powiadomienia
    const closeBtn = notification.querySelector('.btn-close');
    closeBtn.addEventListener('click', function () {
        hideNotification();
    });

    // Automatyczne ukrycie po 4 sekundach
    setTimeout(hideNotification, 4000);

    function hideNotification() {
        notification.style.animation = 'slideOutRight 0.3s ease-in forwards';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 300);
    }
}

// Rozszerz istniejącą funkcję addToCart o dodatkową funkcjonalność (jeśli potrzebna)
function showAddToCartMessage(productName) {
    // Ta funkcja jest już wywoływana w scripts.js, ale możemy ją rozszerzyć
    console.log(`Dodano do koszyka: ${productName}`);
}
