# Projekt zaliczeniowy z laboratorium "Programowanie aplikacji internetowych"

## Tematyka projektu: Sklep Apple Store

## Autor: Kacper Sawicki

---

## Funkcjonalności

### Dla wszystkich użytkowników:
- **Katalog produktów**: przeglądanie i kategoryzacja produktów Apple
- **Koszyk**: dodawanie produktów, zarządzanie ilością, obsługa dla gości i zalogowanych użytkowników
- **System opinii**: przeglądanie ocen i komentarzy produktów ze zdjęciami

### Dla zalogowanych użytkowników:
- **Uwierzytelnianie**: rejestracja i logowanie użytkowników
- **Składanie zamówień**: formularz danych do wysyłki, walidacja, opcjonalny zapis danych adresowych
- **Panel użytkownika**:
    - Zarządzanie danymi osobowymi
    - Zarządzanie adresem dostawy
    - Historia zamówień
    - Wystawianie opinii dla zakupionych produktów (oceny, komentarze, zdjęcia)

### Dla administratorów:
- **Panel administratora**:
    - Zarządzanie zamówieniami (zmiana statusów)
    - Moderacja opinii

---

## Narzędzia i technologie

Wersje programów wykorzystane do tworzenia aplikacji (aplikacja nie została przetestowana z kompatybilnością wcześniejszych wersji):
- XAMPP
- DBngin (MySQL Server 8.4.2)
- PHP 8.2.x
- Composer 2.9.3
- Laravel Framework 11.x
- Node 24.13.0
---

## Instalacja i uruchomienie

1. Plik projektowy `apple-store` należy umieścić w `XAMPP\htdocs`
2. W folderze projektu, w terminalu wpisać `npm install` w celu instalacji zaleznosci `node_modules`
3. W folderze projektu, w terminalu wpisać `composer install` w celu instalacji zaleznosci `vendor`
4. Uzupełnić plik .env poprawnymi danymi
5. Uruchomić MySQL w XAMPP lub DBngin
6. Migracja bazy danych: `php artisan migrate` (w celu utworzenia bazy danych wybrać opcję: `Would you like to create it? Yes`)
7. Wypełnienie bazy przykładowymi danymi: `php artisan db:seed`
8. Zlinkuj katalog storage 'php artisan storage:link'
9. Uruchomienie klienta poprzez wpisanie w terminalu `npm run dev`
10. W drugim terminalu uruchom serwer poprzez wpisanie komendy: `php artisan serve`
11. Uruchomienie aplikacji w przeglądarce pod adresem: `localhost:8000`

---
## Konta testowe
-   **Admin**
    -   Login: admin@apple-store.test
    -   Hasło: admin123
-   **Test**
    -   Login: testowy@test.pl
    -   Hasło: p@ssw0rd
