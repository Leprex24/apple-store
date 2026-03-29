<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iphone16pro = Product::where('slug', 'iphone-16-pro')->first();

        if($iphone16pro){
            $iphone16pro->features()->create([
                'icon' => 'cpu',
                'title' => 'Wydajność',
                'subtitle' => 'Nowy wymiar wydajności',
                'description' => 'Poznaj iPhone\'a 16 Pro - smartfon, który wyznacza nowe standardy innowacji i wydajności. Zaawansowany **procesor A18 Pro Bionic** gwarantuje płynność działania nawet najbardziej wymagających aplikacji, a energooszczędna konstrukcja zapewnia dłuższą pracę na jednym ładowaniu. Dzięki wyświetlaczowi **ProMotion o częstotliwości odświeżania 120 Hz** każde przewijanie i animacja stają się niezwykle płynne, a obraz zachwyca głębią kolorów oraz szczegółowością.',
                'order' => 1
            ]);

            $iphone16pro->features()->create([
                'icon' => 'camera',
                'title' => 'Fotografia',
                'subtitle' => 'Fotografia na najwyższym poziomie',
                'description' => 'iPhone 16 Pro to także prawdziwa rewolucja w fotografii mobilnej.
                                Nowy zestaw aparatów z ulepszonym **sensorem głównym 48 MP** oraz usprawnioną optyką
                                pozwala uchwycić zdjęcia pełne detali - zarówno w dzień, jak i w nocy.
                                Funkcje takie jak **fotografowanie przestrzenne i wideo w jakości 8K**
                                czynią z tego modelu narzędzie spełniające oczekiwania nawet najbardziej wymagających twórców.',
                'order' => 2
            ]);

            $iphone16pro->features()->create([
                'icon' => 'shield-check',
                'title' => 'Trwałość',
                'subtitle' => 'Niezrównana trwałość i bezpieczeństwo',
                'description' => 'Dbałość o detale widać w każdym elemencie - od wytrzymałej **ramki z tytanu klasy lotniczej**,
                                po niezwykle odporną ceramikę ochraniającą ekran.
                                Nowoczesne rozwiązania w zakresie bezpieczeństwa, w tym **ulepszony Face ID**
                                czy zaawansowana ochrona prywatności, sprawiają, że korzystanie z iPhone\'a 16 Pro jest nie tylko wygodne,
                                ale również w pełni bezpieczne.',
                'order' => 3
            ]);
        }

        $iphone16 = Product::where('slug', 'iphone-16')->first();

        if($iphone16){
            $iphone16->features()->create([
                'icon' => 'lightbulb',
                'title' => 'Inteligencja',
                'subtitle' => 'Inteligencja w Twojej dłoni',
                'description' => 'iPhone 16 przenosi codzienną wygodę na nowy poziom. Dzięki **procesorowi A18
                                    Bionic**
                                korzystanie z aplikacji, gier i narzędzi staje się jeszcze bardziej intuicyjne.
                                Nowa generacja **wyświetlacza Liquid Retina**
                                gwarantuje obraz pełen naturalnych barw
                                i doskonałą czytelność, nawet w ostrym świetle dziennym. Bezproblemowa wielozadaniowość
                                i zoptymalizowana praca baterii
                                sprawią, że przez cały dzień możesz polegać na swoim telefonie, gdziekolwiek jesteś.',
                'order' => 1
            ]);

            $iphone16->features()->create([
                'icon' => 'camera-fill',
                'title' => 'Fotografia',
                'subtitle' => 'Zdjęcia, które zachwycają',
                'description' => 'Aparat iPhone\'a 16 został zoptymalizowany, by sprostać oczekiwaniom każdego użytkownika.
                                **Ulepszony system dwóch kamer** pozwala łatwo uchwycić radosne chwile,
                                miejskie pejzaże
                                i portrety wyróżniające się głębią oraz naturalnymi kolorami.
                                **Rozszerzone możliwości fotografowania nocnego**
            oraz inteligentny tryb HDR
                                sprawiają, że Twoje fotografie zawsze będą wyglądały doskonale, niezależnie od warunków.',
                'order' => 2
            ]);

            $iphone16->features()->create([
                'icon' => 'shield-fill',
                'title' => 'Trwałość',
                'subtitle' => 'Stworzony, by trwać',
                'description' => 'Solidna, **aluminiowa rama i szkło odporne na zarysowania** chronią
                                iPhone\'a 16
                                przed codziennymi wyzwaniami. Odporność na wodę i pył pozwala korzystać z urządzenia bez
                                obaw
                                w każdej sytuacji - także podczas aktywności na świeżym powietrzu.
            Najnowsze zabezpieczenia biometryczne oraz zaawansowane funkcje ochrony danych dbają o
                                Twój spokój i bezpieczeństwo,
                                a **system iOS 18** gwarantuje płynność oraz
                                regularne aktualizacje.',
                'order' => 3
            ]);
        }

        $iphone16e = Product::where('slug', 'iphone-16e')->first();

        if($iphone16e) {
            $iphone16e->features()->create([
                'icon' => 'phone',
                'title' => 'Funkcjonalność',
                'subtitle' => 'Lekkość i funkcjonalność na co dzień',
                'description' => 'iPhone 16e to propozycja dla tych, którzy cenią sobie wygodę użytkowania i nowoczesny styl w kompaktowej formie.
                            **Smukła, lekka obudowa** sprawia, że urządzenie doskonale leży w dłoni i bez trudu mieści się w każdej kieszeni.
                            Zoptymalizowany **procesor A17 Light** zapewnia płynną obsługę najpotrzebniejszych aplikacji,
                            a energooszczędny tryb pracy pozwala cieszyć się smartfonem przez cały dzień bez konieczności częstego ładowania.',
                'order' => 1
            ]);

            $iphone16e->features()->create([
                'icon' => 'camera2',
                'title' => 'Fotografia',
                'subtitle' => 'Udane zdjęcia zawsze pod ręką',
                'description' => 'Dzięki praktycznemu **podwójnemu aparatowi i inteligentnym algorytmom** poprawy obrazu
                            iPhone 16e doskonale radzi sobie z fotografowaniem codziennych chwil.
                            **Automatyczny tryb portretowy** i szybkie przełączanie się między trybami
                            sprawia, że każda sesja jest przyjemnością, a zdjęcia zachowują autentyczne kolory i ostrość -
                            zarówno na spotkaniach ze znajomymi, jak i podczas spontanicznych wypadów.',
                'order' => 2
            ]);

            $iphone16e->features()->create([
                'icon' => 'check-circle',
                'title' => 'Niezawodność',
                'subtitle' => 'Prosty. Bezpieczny. Niezawodny.',
                'description' => 'iPhone 16e stawia na prostotę i bezpieczeństwo. **Szkło o zwiększonej odporności** na uszkodzenia
                            chroni wyświetlacz w codziennych sytuacjach, a wodoodporność zapewnia spokój ducha w przypadku
                            niespodziewanych zachlapań. Rozbudowane opcje ochrony prywatności i najnowsze udoskonalenia w
                            **iOS 18 Light** gwarantują, że Twoje dane pozostają poufne,
                            a korzystanie ze smartfona jest bezstresowe, szybkie i wygodne.',
                'order' => 3
            ]);
        }

        $iphone15 = Product::where('slug', 'iphone-15')->first();

        if($iphone15) {
            $iphone15->features()->create([
                'icon' => 'star-fill',
                'title' => 'Nowoczesność',
                'subtitle' => 'Nowoczesność, którą pokochasz',
                'description' => 'iPhone 15 to smartfon zaprojektowany, by sprostać wymaganiom współczesnego życia.
                                **Elegancka, odświeżona obudowa** oraz **wyświetlacz Super Retina XDR**
                                sprawiają, że każda chwila z tym telefonem wygląda wyjątkowo - od przeglądania zdjęć po
                                oglądanie wideo w wysokiej rozdzielczości.
                                Nowy **procesor A17** daje pewność płynnego działania nawet najbardziej
                                wymagających aplikacji,
                                a **zoptymalizowany system zarządzania energią**
                                zagwarantuje Ci długi czas pracy bez ładowania.',
                'order' => 1
            ]);

            $iphone15->features()->create([
                'icon' => 'camera',
                'title' => 'Fotografia',
                'subtitle' => 'Zawsze gotowy do zdjęć',
                'description' => 'iPhone 15 to także znakomite narzędzie fotograficzne. **Udoskonalony aparat główny**
                                pozwoli Ci uchwycić wyraziste kolory i subtelne detały zarówno podczas słonecznego dnia,
                                jak i po zmroku.
                                **Inteligentny tryb nocny** oraz automatyczna
                                stabilizacja obrazu sprawią,
                                że każde zdjęcie i wideo będzie wyglądać profesjonalnie - bez względu na warunki.',
                'order' => 2
            ]);

            $iphone15->features()->create([
                'icon' => 'shield-check',
                'title' => 'Trwałość',
                'subtitle' => 'Trwałość i bezpieczeństwo nowej generacji',
                'description' => 'Dzięki **wzmocnionej konstrukcji ze szkła i aluminium** oraz podwyższonej
                                odporności na pył i wodę,
                                iPhone 15 jest gotowy na wszelkie codzienne wyzwania. **Bezpieczne uwierzytelnianie Face ID**,
                                regularne aktualizacje systemowe oraz rozbudowane ustawienia prywatności sprawiają,
                                że Twoje dane i prywatność są zawsze pod ochroną. Korzystaj z możliwości, które daje
                                Apple - **wygodnie, intuicyjnie i bez kompromisów**.',
                'order' => 3
            ]);
        }

        $ipadair = Product::where('slug', 'ipad-air')->first();

        if($ipadair){
            $ipadair->features()->create([
                'icon' => 'brush',
                'title' => 'Kreatywność',
                'subtitle' => 'Przestrzeń dla Twojej kreatywności',
                'description' => 'iPad Air to niezwykle wszechstronne narzędzie, które łączy lekkość z potężnymi
                                możliwościami.
                                **Smukła, aluminiowa obudowa** i **wyświetlacz Liquid Retina**
                                o żywych kolorach sprawiają, że każde zdjęcie, film i szkic wygląda zachwycająco.
                                Dzięki nowoczesnemu **procesorowi z serii M** iPad Air radzi sobie bez
                                trudu z zaawansowanymi aplikacjami
                                do nauki, pracy czy rozrywki, umożliwiając płynną edycję zdjęć, montaż wideo oraz
                                szybkie przełączanie się między zadaniami.',
                'order' => 1
            ]);

            $ipadair->features()->create([
                'icon' => 'lightbulb',
                'title' => 'Wszechstronność',
                'subtitle' => 'Gotowy na Twoje pomysły',
                'description' => 'Niezależnie od tego, czy tworzysz grafiki z **Apple Pencil**,
                                robisz notatki na zajęciach czy projektujesz prezentacje, iPad Air daje Ci wolność
                                działania tam, gdzie chcesz.
                                **Kamera szerokokątna** rejestruje wspomnienia i usprawnia wideorozmowy,
                                a długie godziny pracy na jednym ładowaniu pozwalają realizować plany bez przerwy na
                                ładowarkę.
                                Zintegrowane wsparcie dla klawiatur **Smart Keyboard oraz łączność 5G**
                                sprawiają, że możesz pracować i bawić się praktycznie wszędzie.',
                'order' => 2
            ]);

            $ipadair->features()->create([
                'icon' => 'shield-lock',
                'title' => 'Mobilność',
                'subtitle' => 'Mobilność i bezpieczeństwo',
                'description' => '**Lekki, wytrzymały i gotowy na wyzwania każdego dnia** - iPad Air to
                                idealny towarzysz podczas podróży,
                                w biurze, czy na uczelni. **Touch ID** zapewnia
                                niezawodne bezpieczeństwo,
                                a najnowszy iPadOS podkreśla intuicyjność i wygodę obsługi.
                                Wszystko, czego potrzebujesz, masz zawsze pod ręką - jeszcze szybciej, jeszcze łatwiej,
                                **jeszcze bliżej Twoich marzeń**.',
                'order' => 3
            ]);
        }

        $ipadmini = Product::where('slug', 'ipad-mini')->first();

        if($ipadmini){
            $ipadmini->features()->create([
                'icon' => 'phone',
                'title' => 'Kompaktowość',
                'subtitle' => 'Wielkie możliwości, kompaktowa forma',
                'description' => 'iPad mini to połączenie wydajności i poręczności, której nie sposób się oprzeć.
                                Jego **niewielkie wymiary** sprawiają, że zmieści się w każdej torbie,
                                a nowoczesny design i **lekka, aluminiowa obudowa**
                                nadają mu wyjątkową mobilność.
                                Płynny **wyświetlacz Liquid Retina o przekątnej 8,3 cala** zachwyca
                                wyrazistymi kolorami i precyzją -
                                niezależnie od tego, czy czytasz książki, przeglądasz Internet czy oglądasz filmy w
                                podróży.',
                'order' => 1
            ]);

            $ipadmini->features()->create([
                'icon' => 'magic',
                'title' => 'Wszechstronność',
                'subtitle' => 'Zawsze pod ręką - gotowy na wszystko',
                'description' => 'iPad mini to wszechstronne narzędzie do nauki, pracy i rozrywki.
                                **Szybki procesor nowej generacji** sprawia, że granie, edytowanie zdjęć
                                czy korzystanie z aplikacji kreatywnych
                                jest szybkie i płynne. Zintegrowana obsługa **Apple
                                    Pencil** czyni z niego rewelacyjny notatnik i szkicownik,
                                a **ultraszybka łączność Wi-Fi lub 5G** pozwala być online dokładnie wtedy,
                                gdy tego potrzebujesz.',
                'order' => 2
            ]);

            $ipadmini->features()->create([
                'icon' => 'gem',
                'title' => 'Moc',
                'subtitle' => 'Mały rozmiar. Wielkie możliwości.',
                'description' => 'Chroń swoje dane dzięki **zaawansowanym rozwiązaniom biometrycznym** i
                                ciesz się długimi godzinami pracy na jednym ładowaniu -
                                idealnie podczas zajęć, wyjazdów czy spontanicznych spotkań z przyjaciółmi.
                                iPad mini to **Twoje prywatne centrum kreatywności**
                                i niezrównany kompan każdego dnia -
                                tam, gdzie duży tablet byłby już za duży, a smartfon to za mało.',
                'order' => 3
            ]);
        }

        $ipad = Product::where('slug', 'ipad')->first();

        if ($ipad) {
            $ipad->features()->create([
                'icon' => 'tablet',
                'title' => 'Klasyka',
                'subtitle' => 'Klasyka w nowoczesnym wydaniu',
                'description' => 'iPad to niezawodne centrum rozrywki, nauki i pracy, które od lat wyznacza standardy
                                wśród tabletów.
                                Przestronny **wyświetlacz Retina** pozwala wygodnie
                                czytać, tworzyć,
                                uczyć się i oglądać ulubione filmy w doskonałej jakości. **Cienka, lekka obudowa** sprawia,
                                że iPad idealnie sprawdza się zarówno w domu, jak i poza nim - zawsze gotowy do
                                działania,
                                gdziekolwiek go potrzebujesz.',
                'order' => 1
            ]);

            $ipad->features()->create([
                'icon' => 'people',
                'title' => 'Wszechstronność',
                'subtitle' => 'Dla każdego i na każdą okazję',
                'description' => 'Dzięki szybkiemu procesorowi i najnowszemu **systemowi iPadOS**, codzienne
                                zadania wykonasz sprawnie i bez przeszkód:
                                czy jesteś uczniem, nauczycielem, rodzicem czy kreatywnym twórcą. Rysowanie, robienie
                                notatek z
                                **Apple Pencil**, a także korzystanie z tysięcy
                                aplikacji edukacyjnych i rozrywkowych z App Store
                                staje się przyjemnością. Przednia i tylna kamera ułatwiają prowadzenie wideorozmów,
                                rejestrowanie wspomnień
                                czy udział w lekcjach online.',
                'order' => 2
            ]);
            $ipad->features()->create([
                'icon' => 'check-circle',
                'title' => 'Niezawodność',
                'subtitle' => 'Prosty. Praktyczny. iPad.',
                'description' => '**Wytrzymała konstrukcja i długo działająca bateria** pozwalają zabrać
                                iPada wszędzie tam,
                                gdzie go potrzebujesz - w podróż, do szkoły lub biura. Bezpieczeństwo danych oraz
                                intuicyjność obsługi
                                sprawiają, że korzystanie z tabletu jest komfortowe, a **regularne aktualizacje Apple**
                                chronią Twoją prywatność. iPad - po prostu działa. Zawsze, gdy go potrzebujesz.',
                'order' => 3
            ]);
        }

        $ipadpro = Product::where('slug', 'ipad-pro')->first();

        if($ipadpro){
            $ipadpro->features()->create([
                'icon' => 'award',
                'title' => 'Profesjonalizm',
                'subtitle' => 'Siła profesjonalizmu w Twoich rękach',
                'description' => 'iPad Pro to urządzenie stworzone dla tych, którzy nie uznają kompromisów.
                                **Niesamowicie smukła konstrukcja z aluminium** mieści potężny **procesor z serii M**,
                                dzięki któremu nawet najbardziej wymagające zadania - od zaawansowanej edycji wideo po
                                renderowanie grafiki 3D -
                                odbywają się płynnie i błyskawicznie. Zachwycający **wyświetlacz Liquid Retina
                                    XDR** wypełnia cały ekran
                                intensywnymi kolorami i niezwykłą szczegółowością, sprawiając, że każda prezentacja,
                                film czy projekt wygląda olśniewająco.',
                'order' => 1
            ]);

            $ipadpro->features()->create([
                'icon' => 'easel',
                'title' => 'Kreatywność',
                'subtitle' => 'Twój kreatywny warsztat bez ograniczeń',
                'description' => 'iPad Pro staje się niezastąpionym narzędziem dla profesjonalistów z każdej branży.
                                Z **Apple Pencil** pracujesz z precyzją szkicując,
                                projektując lub retuszując zdjęcia,
                                a magnetyczna **klawiatura Magic Keyboard** zamienia tablet w pełnoprawny
                                laptop, gotowy na każde wyzwanie.
                                Wielozadaniowość staje się jeszcze wygodniejsza - przełączaj się pomiędzy aplikacjami,
                                twórz, współpracuj i prezentuj w każdych warunkach,
                                także dzięki **ultraszybkiej łączności 5G i Wi-Fi 6E**.',
                'order' => 2
            ]);

            $ipadpro->features()->create([
                'icon' => 'star',
                'title' => 'Premium',
                'subtitle' => 'Bezpieczeństwo. Mobilność. Wyjątkowy styl.',
                'description' => '**Wytrzymały i lekki, gotowy do pracy w każdej sytuacji** - od studia po
                                plenerowe prezentacje. Nowoczesne zabezpieczenia, **Face ID** i ciągłe
                                aktualizacje iPadOS dbają o Twoje dane i prywatność.
                                **Długi czas pracy na baterii** zapewnia Ci pełną swobodę, a wyrafinowane
                                wzornictwo i szeroka gama akcesoriów
                                czynią z iPad Pro narzędzie, które **spełni oczekiwania
                                    nawet najbardziej wymagających użytkowników**.',
                'order' => 3
            ]);
        }

        $macbookpro = Product::where('slug', 'macbook-pro')->first();

        if($macbookpro){
            $macbookpro->features()->create([
                'icon' => 'lightning-charge',
                'title' => 'Wydajność',
                'subtitle' => 'Moc, która napędza Twoją pracę',
                'description' => 'MacBook Pro to narzędzie stworzone z myślą o profesjonalistach, twórcach i wszystkich,
                                którzy oczekują najwyższej wydajności bez kompromisów.
                                Dzięki **ultranowoczesnym procesorom z serii M**,
                                MacBook Pro sprawia, że edycja filmów w rozdzielczości 8K,
                                wielowarstwowa obróbka zdjęć, czy zaawansowana analiza danych odbywają się szybciej niż
                                kiedykolwiek wcześniej.
                                **Wyświetlacz Liquid Retina XDR** zachwyca kontrastem, odwzorowaniem barw i
                                nieskazitelną ostrością obrazu -
                                to wizualny standard dla najbardziej wymagających projektów.',
                'order' => 1
            ]);

            $macbookpro->features()->create([
                'icon' => 'infinity',
                'title' => 'Kreatywność',
                'subtitle' => 'Tworzenie bez granic',
                'description' => 'Niezależnie, czy pracujesz w domu, w biurze, czy podróżujesz - MacBook Pro daje Ci pełną
                                swobodę działania.
                                **Długi czas pracy na baterii** pozwala na kreatywność i produktywność
                                przez cały dzień,
                                a zaawansowane systemy chłodzenia gwarantują ciszę i stabilność pod największym
                                obciążeniem.
                                **Złącza Thunderbolt 4**, obsługa wielu monitorów i
                                szybka łączność Wi-Fi 6E
                                czynią z niego centrum dowodzenia w każdym środowisku pracy.',
                'order' => 2
            ]);

            $macbookpro->features()->create([
                'icon' => 'shield-lock',
                'title' => 'Premium',
                'subtitle' => 'Bezpieczeństwo i styl, które zawsze idą w parze',
                'description' => 'MacBook Pro to nie tylko wydajność, ale też bezpieczeństwo i prestiż. **Touch ID**
                                chroni Twoje dane, a regularne aktualizacje systemu macOS gwarantują poufność i
                                odporność na zagrożenia.
                                Preferujesz minimalistyczną elegancję czy nowoczesny design? **Solidna aluminiowa
                                    obudowa i smukły profil**
                                sprawiają, że MacBook Pro zawsze prezentuje się wyjątkowo - zarówno na sali
                                konferencyjnej, jak i w ulubionej kawiarni.',
                'order' => 3
            ]);
        }

        $macbookair = Product::where('slug', 'macbook-air')->first();

        if ($macbookair) {
            $macbookair->features()->create([
                'icon' => 'feather',
                'title' => 'Lekkość',
                'subtitle' => 'Lekkość, która daje moc',
                'description' => 'MacBook Air redefiniuje pojęcie mobilności, łącząc **smukłą, ultralekką
                                    konstrukcję** z wyjątkową wydajnością.
                                Dzięki **procesorom Apple z serii M** błyskawicznie
                                uruchamiasz aplikacje,
                                płynnie pracujesz nad wieloma zadaniami i cieszysz się bezgłośną pracą - gdziekolwiek
                                jesteś.
                                Zachwycający **wyświetlacz Retina** prezentuje obrazy pełne żywych kolorów
                                i detali,
                                czyniąc każde zadanie - od nauki po montaż filmów - jeszcze przyjemniejszym.',
                'order' => 1
            ]);

            $macbookair->features()->create([
                'icon' => 'laptop',
                'title' => 'Mobilność',
                'subtitle' => 'Mobilność, na którą możesz liczyć',
                'description' => 'Niezależnie czy uczysz się, prowadzisz prezentację, tworzysz, czy po prostu relaksujesz
                                się w sieci,
                                MacBook Air zmieści się w niemal każdej torbie i dotrzyma Ci kroku przez cały dzień
                                dzięki **wydajnej baterii**.
                                **Szybka łączność Wi-Fi**, komfortowa klawiatura
                                Magic Keyboard oraz szeroka gama portów
                                pozwalają na efektywną pracę w każdych warunkach, bez kompromisów.',
                'order' => 2
            ]);

            $macbookair->features()->create([
                'icon' => 'award',
                'title' => 'Niezawodność',
                'subtitle' => 'Uniwersalny. Niezawodny. Stylowy.',
                'description' => 'MacBook Air łączy nowoczesny design z trwałością, dzięki **odpornej na zarysowania aluminiowej obudowie**.
                                **System macOS** zapewnia bezpieczeństwo Twoich
                                danych oraz intuicyjną obsługę,
                                ułatwiając zarówno codzienne zadania, jak i kreatywne wyzwania. To laptop, który wygląda
                                doskonale, działa niezawodnie
                                i zawsze dotrzymuje Ci kroku - **niezależnie od tego, co chcesz osiągnąć**.',
                'order' => 3
            ]);
        }

        $imac = Product::where('slug', 'imac')->first();

        if ($imac) {
            $imac->features()->create([
                'icon' => 'palette',
                'title' => 'Design',
                'subtitle' => 'Piękno i moc, które inspirują',
                'description' => 'iMac to więcej niż komputer - to designerskie centrum dowodzenia każdej nowoczesnej
                                przestrzeni.
                                Smukła, **aluminiowa obudowa w intensywnych, stylowych kolorach** sprawia,
                                że iMac zachwyca już od pierwszego spojrzenia.
                                Duży, spektakularny **wyświetlacz Retina**, pełen
                                żywych barw i oszałamiających detali,
                                zamienia codzienną pracę, naukę i rozrywkę w wyjątkowe doświadczenie wizualne.',
                'order' => 1
            ]);

            $imac->features()->create([
                'icon' => 'lightning',
                'title' => 'Wydajność',
                'subtitle' => 'Cała moc na jednym biurku',
                'description' => 'Sercem iMaca jest szybki i wydajny **procesor Apple z serii M**, dzięki
                                któremu montaż filmów,
                                projektowanie graficzne czy praca z wieloma aplikacjami staje się zadziwiająco płynna i
                                cicha.
                                Zaawansowane głośniki, studyjny mikrofon oraz doskonała **kamera FaceTime HD**
                                sprawiają, że wideorozmowy, konferencje online czy domowe kino nabierają nowej jakości.
                                Jeszcze szybsza łączność Wi-Fi i szeroki zestaw portów ułatwiają podłączenie wszystkich
                                niezbędnych akcesoriów.',
                'order' => 2
            ]);

            $imac->features()->create([
                'icon' => 'puzzle',
                'title' => 'Integracja',
                'subtitle' => 'Jedność formy i funkcji',
                'description' => 'iMac to urządzenie intuicyjne, niezawodne i bezpieczne. Zaktualizowany **system macOS**
                                gwarantuje łatwą obsługę, pełne bezpieczeństwo danych oraz gotowość na każdą kreatywną i
                                biznesową przygodę.
                                **Minimalistyczne wzornictwo kryje w sobie maksimum możliwości**,
                                a integracja z innymi urządzeniami Apple sprawia, że codzienna praca i zabawa stają się
                                płynniejsze niż kiedykolwiek.',
                'order' => 3
            ]);
        }

        $applewatchseries10 = Product::where('slug', 'apple-watch-series-10')->first();

        if($applewatchseries10){
            $applewatchseries10->features()->create([
                'icon' => 'stars',
                'title' => 'Przyszłość',
                'subtitle' => 'Przyszłość na Twoim nadgarstku',
                'description' => 'Apple Watch Series 10 to definicja połączenia elegancji z zaawansowaną technologią.
                                **Nowa, jeszcze smuklejsza i lżejsza konstrukcja**, dostępna w szerokiej
                                gamie kolorów i materiałów,
                                podkreśli Twój styl niezależnie od okazji. **Bezramkowy
                                    wyświetlacz o jeszcze większej powierzchni**
                                pozwala wygodniej korzystać z ulubionych aplikacji, odczytywać wiadomości i śledzić
                                powiadomienia jednym rzutem oka.',
                'order' => 1
            ]);

            $applewatchseries10->features()->create([
                'icon' => 'heart-pulse',
                'title' => 'Zdrowie',
                'subtitle' => 'Twoje zdrowie w centrum uwagi',
                'description' => 'Apple Watch Series 10 wynosi dbanie o formę na wyższy poziom — **nowoczesne czujniki** precyzyjnie śledzą
                                aktywność, puls, poziom tlenu we krwi i jakość snu, a także wprowadzają innowacyjne
                                funkcje,
                                takie jak **monitorowanie temperatury ciała** oraz
                                zaawansowane alerty zdrowotne.
                                **Wodoodporność i tryby treningowe** dopasują się do każdego stylu życia,
                                nawet najbardziej wymagającego.',
                'order' => 2
            ]);

            $applewatchseries10->features()->create([
                'icon' => 'shield-check',
                'title' => 'Niezawodność',
                'subtitle' => 'Niezawodne wsparcie na co dzień',
                'description' => 'Dzięki **jeszcze szybszemu procesorowi i lepszej optymalizacji baterii**,
                                Apple Watch Series 10 to niezawodny asystent
                                w pracy, podczas spotkań i w trakcie treningów. **Precyzyjna nawigacja GPS**, płatności zbliżeniowe,
                                obsługa połączeń i natychmiastowe reagowanie na wiadomości sprawiają, że masz wszystko
                                pod kontrolą - bez konieczności sięgania po telefon.
                                Bezpieczeństwo? **Alarmy SOS, wykrywanie upadków i lokalizacja** sprawią,
                                że czujesz się pewniej, gdziekolwiek jesteś.',
                'order' => 3
            ]);
        }

        $applewatchultra2 = Product::where('slug', 'apple-watch-ultra-2')->first();

        if($applewatchultra2){
            $applewatchultra2->features()->create([
                'icon' => 'compass',
                'title' => 'Przygoda',
                'subtitle' => 'Gotowy na każdą wyprawę',
                'description' => 'Apple Watch Ultra 2 to smartwatch stworzony dla tych, którzy przekraczają granice -
                                wytrzymały, niezawodny i gotowy na ekstremalne wyzwania.
                                Jego **masywna, tytanowa obudowa** zapewnia lekkość i wyjątkową odporność
                                na uszkodzenia,
                                a **jasny, duży wyświetlacz** zawsze pozostaje
                                czytelny -
                                nawet w pełnym słońcu lub pod wodą. To urządzenie, któremu możesz zaufać w
                                najtrudniejszym terenie.',
                'order' => 1
            ]);

            $applewatchultra2->features()->create([
                'icon' => 'cpu',
                'title' => 'Technologia',
                'subtitle' => 'Technologia, która dotrzyma Ci kroku',
                'description' => 'Apple Watch Ultra 2 wyznacza standardy monitorowania aktywności i zdrowia.
                                **Precyzyjne czujniki**
                                analizują każdy ruch, tętno, poziom tlenu we krwi i temperaturę ciała, a zaawansowane
                                narzędzia wspomagające trening
                                pozwalają analizować wyniki zarówno na bieżni, jak i podczas wspinaczki górskiej czy
                                nurkowania.
                                **Ultra-dokładna nawigacja GPS** sprawia, że zawsze
                                odnajdziesz drogę -
                                niezależnie od tego, gdzie zaprowadzą Cię Twoje pasje.',
                'order' => 2
            ]);

            $applewatchultra2->features()->create([
                'icon' => 'shield-fill-exclamation',
                'title' => 'Ekstremalna wytrzymałość',
                'subtitle' => 'Niezawodność na ekstremalnym poziomie',
                'description' => '**Wytrzymała bateria** pozwala na długie godziny działania, nawet podczas
                                maratonów czy wypraw w nieznane.
                                **Dedykowane przyciski akcji** ułatwiają obsługę
                                zegarka w rękawiczkach,
                                a zaawansowane funkcje bezpieczeństwa - w tym syrena alarmowa i wykrywanie awaryjnych
                                upadków -
                                dają poczucie pewności na każdym szlaku. Apple Watch Ultra 2 to Twój osobisty trener,
                                nawigator i ratownik -
                                **nie tylko w mieście, ale wszędzie tam, gdzie liczą się wyzwania i adrenalina**.',
                'order' => 3
            ]);
        }

        $applewatchse = Product::where('slug', 'apple-watch-se')->first();

        if ($applewatchse) {
            $applewatchse->features()->create([
                'icon' => 'smartwatch',
                'title' => 'Funkcjonalność',
                'subtitle' => 'Wszystko, czego potrzebujesz na nadgarstku',
                'description' => 'Apple Watch SE łączy w sobie kluczowe funkcje, których oczekujesz od inteligentnego
                                zegarka,
                                z przystępną ceną i minimalistycznym designem. **Smukła, lekka koperta**
                                doskonale prezentuje się na każdym nadgarstku,
                                a **szybki wyświetlacz Retina** pozwala wygodnie
                                przeglądać powiadomienia,
                                śledzić aktywność i odbierać połączenia - bez sięgania po telefon.',
                'order' => 1
            ]);

            $applewatchse->features()->create([
                'icon' => 'heart-pulse',
                'title' => 'Zdrowie',
                'subtitle' => 'Twoje zdrowie i aktywność w zasięgu jednego dotknięcia',
                'description' => 'Apple Watch SE sprawia, że dbanie o siebie staje się prostsze niż kiedykolwiek.
                                **Monitorowanie tętna**, analiza spalonych kalorii i
                                wykrywanie codziennego ruchu
                                motywują do realizacji celów zdrowotnych - niezależnie czy ćwiczysz na siłowni, biegasz,
                                czy po prostu chcesz ruszać się więcej.
                                **Inteligentne przypomnienia**, dokładne rejestrowanie tras i automatyczne
                                śledzenie wybranych treningów
                                czynią z niego idealnego towarzysza każdego dnia.',
                'order' => 2
            ]);

            $applewatchse->features()->create([
                'icon' => 'shield-check',
                'title' => 'Bezpieczeństwo',
                'subtitle' => 'Bezpieczeństwo i wygoda na co dzień',
                'description' => 'Dzięki funkcjom **wykrywania upadków**, alarmom SOS i
                                płatnościom Apple Pay
                                masz gwarancję spokoju i komfortu w każdej sytuacji. Apple Watch SE działa płynnie,
                                **świetnie współpracuje z Twoim iPhonem** i wspiera funkcje rodzinne,
                                pozwalając zadbać o najbliższych.
                                Pozostań w kontakcie, mierz postępy i korzystaj z najważniejszych rozwiązań Apple -
                                **wygodnie i stylowo**.',
                'order' => 3
            ]);
        }

        $airpods4 = Product::where('slug', 'airpods-4')->first();

        if($airpods4) {
            $airpods4->features()->create([
                'icon' => 'heart',
                'title' => 'Komfort',
                'subtitle' => 'Lekkość i wygoda na co dzień',
                'description' => 'AirPods 4 to słuchawki stworzone z myślą o codziennym komforcie - **lekkie, ergonomiczne i dopasowane do ucha**,
                                dzięki czemu możesz nosić je przez cały dzień, nawet nie czując ich obecności.
                                Minimalistyczny design i doskonała jakość wykonania sprawiają, że idealnie wpasują się w
                                Twój styl,
                                a **kompaktowe etui** pozwala zabrać je ze sobą
                                wszędzie, gdzie tylko zechcesz.',
                'order' => 1
            ]);

            $airpods4->features()->create([
                'icon' => 'soundwave',
                'title' => 'Dźwięk',
                'subtitle' => 'Czysty, naturalny dźwięk',
                'description' => 'Zaprojektowane przez Apple głośniki zapewniają **wyraźne, zbalansowane brzmienie** -
                                zarówno podczas słuchania muzyki, oglądania filmów, jak i prowadzenia rozmów.
                                AirPods 4 gwarantują niskie opóźnienia i bezproblemową synchronizację z urządzeniami
                                Apple,
                                co sprawia, że korzystanie z nich jest jeszcze bardziej intuicyjne i komfortowe.
                                **Wbudowane mikrofony** precyzyjnie wychwytują Twój
                                głos,
                                zapewniając świetną jakość każdej rozmowy.',
                'order' => 2
            ]);

            $airpods4->features()->create([
                'icon' => 'ear',
                'title' => 'Świadomość otoczenia',
                'subtitle' => 'Zawsze w kontakcie z otoczeniem',
                'description' => 'Bez aktywnej redukcji hałasu AirPods 4 pozwalają Ci zachować świadomość tego, co dzieje
                                się wokół -
                                to doskonałe rozwiązanie dla osób, które cenią bezpieczeństwo i pragną słyszeć odgłosy
                                otoczenia
                                podczas biegania, spacerów czy jazdy na rowerze. **Długa żywotność baterii i
                                    szybkie ładowanie**
                                sprawiają, że możesz cieszyć się swoją ulubioną muzyką i wygodą użytkowania przez wiele
                                godzin, gdziekolwiek jesteś.',
                'order' => 3
            ]);
        }

        $airpods42 = Product::where('slug', 'airpods-4-z-anc')->first();

        if($airpods42) {
            $airpods42->features()->create([
                'icon' => 'music-note-beamed',
                'title' => 'Dźwięk premium',
                'subtitle' => 'Dźwięk bez kompromisów',
                'description' => 'AirPods 4 z aktywną redukcją hałasu przenoszą wrażenia muzyczne na zupełnie nowy poziom.
                            Dzięki **zaawansowanej technologii ANC** błyskawicznie eliminujesz niepożądane odgłosy otoczenia -
                            skup się na muzyce, podcaście lub rozmowie, niezależnie od tego, gdzie akurat jesteś.
                            **Czysty, pełen detali dźwięk** pozwala zanurzyć się w ulubionych utworach jak nigdy dotąd.',
                'order' => 1
            ]);

            $airpods42->features()->create([
                'icon' => 'gear',
                'title' => 'Technologia',
                'subtitle' => 'Komfort i technologia na wyciągnięcie ręki',
                'description' => 'Nowoczesna konstrukcja AirPods 4 łączy wygodę codziennego użytkowania z najnowszymi rozwiązaniami Apple.
                            **Lekka, ergonomiczna budowa** sprawia, że nawet wielogodzinne słuchanie staje się przyjemnością,
                            a prosta obsługa pozwala na szybkie przełączanie się między trybami - aktywnej redukcji hałasu i trybem kontaktu z otoczeniem.
                            **Wbudowane mikrofony** precyzyjnie wyłapują Twój głos, zapewniając klarowność każdej rozmowy.',
                'order' => 2
            ]);

            $airpods42->features()->create([
                'icon' => 'battery-charging',
                'title' => 'Wydajność',
                'subtitle' => 'Pełna możliwość na jednym ładowaniu',
                'description' => 'AirPods 4 z ANC doskonale współpracują z urządzeniami Apple, oferując łatwe i natychmiastowe połączenie
                            oraz **wydajną baterię**, która zapewnia wiele godzin słuchania w najwyższej jakości.
                            Szybkie ładowanie i kompaktowe etui sprawią, że Twoje słuchawki zawsze będą gotowe na kolejne wyzwania -
                            w domu, w biurze i w podróży. **AirPods 4 to wybór dla tych, którzy szukają wygody,
                            najwyższej jakości dźwięku i nowoczesnych funkcji** w jednej stylowej formie.',
                'order' => 3
            ]);
        }

        $airpodspro2 = Product::where('slug', 'airpods-pro-2')->first();

        if($airpodspro2){
            $airpodspro2->features()->create([
                'icon' => 'award',
                'title' => 'Perfekcja',
                'subtitle' => 'Perfekcja dźwięku w każdej sytuacji',
                'description' => 'AirPods Pro 2 to słuchawki, które redefiniują, czym jest bezkompromisowa jakość dźwięku.
                            Dzięki **zaawansowanej, aktywnej redukcji hałasu** możesz zanurzyć się w ulubionej muzyce,
                            filmie lub podcaście, całkowicie izolując się od zgiełku otoczenia.
                            **Tryb kontaktu z otoczeniem** pozwala szybko wyłapać
                            najważniejsze dźwięki z zewnątrz - wystarczy jedno dotknięcie, by bez zdejmowania słuchawek
                            usłyszeć rozmowę lub ogłoszenie na peronie.',
                'order' => 1
            ]);

            $airpodspro2->features()->create([
                'icon' => 'star-fill',
                'title' => 'Komfort luksusu',
                'subtitle' => 'Luksusowy komfort i innowacje',
                'description' => 'Najnowsza generacja AirPods Pro została zaprojektowana z myślą o pełnym komforcie użytkowania.
                            **Regulowane, silikonowe końcówki** zapewniają idealne dopasowanie do każdego ucha,
                            pozwalając słuchać godzinami bez uczucia zmęczenia. Odporność na pot i wodę sprawia,
                            że AirPods Pro 2 świetnie sprawdzą się podczas treningów, a **intuicyjna obsługa dotykowa**
                            umożliwia sterowanie muzyką, połączeniami i trybami dźwięku bez sięgania po telefon.',
                'order' => 2
            ]);

            $airpodspro2->features()->create([
                'icon' => 'power',
                'title' => 'Kompaktowa moc',
                'subtitle' => 'Moc możliwości w kompaktowym wydaniu',
                'description' => 'AirPods Pro 2 błyskawicznie łączą się z Twoimi urządzeniami Apple - wystarczy jedno kliknięcie,
                            by cieszyć się pełnią możliwości ekosystemu. **Czas pracy na baterii został znacząco wydłużony**,
                            a kompaktowe etui z funkcją bezprzewodowego ładowania sprawia, że Twoje słuchawki są zawsze gotowe do działania.
                            To idealny wybór dla tych, którzy cenią wygodę, nowoczesność oraz **najlepszą jakość dźwięku**
                            wszędzie tam, gdzie się pojawią.',
                'order' => 3
            ]);
        }

        $airpodsmax = Product::where('slug', 'airpods-max')->first();

        if($airpodsmax){
            $airpodsmax->features()->create([
                'icon' => 'gem',
                'title' => 'Luksus',
                'subtitle' => 'Luksus i technologia na najwyższym poziomie',
                'description' => 'AirPods Max redefiniują pojęcie słuchawek nausznych, łącząc w sobie ekskluzywną
                                stylistykę,
                                szlachetne materiały i najbardziej zaawansowane technologie audio od Apple.
                                Ich **precyzyjnie wykonana, aluminiowa konstrukcja** oraz oddychający pałąk
                                z tkaniny zapewniają najwyższy komfort nawet podczas wielogodzinnego słuchania muzyki.
                                Każdy detal - od delikatnych nausznic po magnetyczne mocowania - został zaprojektowany,
                                aby zagwarantować Ci **luksusowy wygląd i doskonałe dopasowanie**.',
                'order' => 1
            ]);

            $airpodsmax->features()->create([
                'icon' => 'headphones',
                'title' => 'Dźwięk imersyjny',
                'subtitle' => 'Dźwięk, który przenosi w inny wymiar',
                'description' => 'Odkryj moc aktywnej redukcji hałasu w wydaniu premium. AirPods Max pozwalają całkowicie
                                odciąć się od otoczenia
                                i zanurzyć w nieskazitelnym, bogatym brzmieniu, jakie zapewniają **dedykowane przetworniki
                                    i zaawansowane przetwarzanie dźwięku**. Tryb kontaktu z otoczeniem umożliwia
                                natychmiastowy powrót do świata -
                                usłysz ruch uliczny, komunikaty lub rozmowę bez zdejmowania słuchawek.
                                **Dźwięk przestrzenny z dynamicznym śledzeniem ruchu głowy**
                                sprawia, że każda piosenka, film czy rozmowa staje się wyjątkowym doświadczeniem.',
                'order' => 2
            ]);

            $airpodsmax->features()->create([
                'icon' => 'laptop',
                'title' => 'Mobilność',
                'subtitle' => 'Wydajność, która idzie z Tobą wszędzie',
                'description' => 'AirPods Max to nie tylko piękny design i imponujący dźwięk, ale także praktyczność na co
                                dzień.
                                Dzięki **błyskawicznemu połączeniu z urządzeniami Apple** możesz płynnie
                                przełączać się
                                między iPhonem, iPadem a komputerem Mac. Bateria zapewnia długie godziny odsłuchu,
                                a **etui Smart Case** automatycznie aktywuje tryb
                                ultraniskiego zużycia energii,
                                gdy nie korzystasz ze swoich słuchawek. AirPods Max to wybór dla tych, którzy oczekują
                                doskonałego brzmienia,
                                komfortu i stylu gdziekolwiek są - w podróży, w domu czy w pracy.',
                'order' => 3
            ]);
        }

        $airtag = Product::where('slug', 'airtag')->first();

        if($airtag){
            $airtag->features()->create([
                'icon' => 'geo-alt',
                'title' => 'Lokalizacja',
                'subtitle' => 'Znajdź wszystko, co ważne',
                'description' => 'AirTag to niewielki, ale niezwykle sprytny lokalizator od Apple, który pomaga odnaleźć Twoje
                                najcenniejsze przedmioty - klucze, plecak, portfel czy bagaż. Wystarczy przypiąć lub włożyć AirTaga do
                                rzeczy, które często giną z pola widzenia, aby już nigdy nie martwić się ich utratą.
                                Dzięki integracji z **aplikacją Lokalizator** możesz w każdej chwili sprawdzić,
                                gdzie dokładnie znajduje się Twój przedmiot i odnaleźć go w zaledwie kilka sekund.',
                'order' => 1
            ]);

            $airtag->features()->create([
                'icon' => 'cpu',
                'title' => 'Technologia',
                'subtitle' => 'Precyzyjna technologia bez kompromisów',
                'description' => 'W AirTagu zastosowano najnowszą technologię Apple - od globalnej sieci urządzeń współpracujących z usługą
                                „Znajdź mój", po zaawansowaną lokalizację przy wykorzystaniu **ultraszerokopasmowego sygnału U1**.
                                Współpraca z iPhonem pozwala otrzymywać dokładne wskazówki na ekranie telefonu, prowadząc Cię prosto do
                                zguby nawet w trudno dostępnych miejscach. Każdy sygnał jest **bezpiecznie szyfrowany i całkowicie anonimowy**,
                                więc prywatność zawsze pozostaje Twoim priorytetem.',
                'order' => 2
            ]);

            $airtag->features()->create([
                'icon' => 'shield-check',
                'title' => 'Trwałość',
                'subtitle' => 'Wytrzymałość i wygoda na co dzień',
                'description' => 'AirTag został zaprojektowany z myślą o codziennym użytkowaniu - jest **odporny na zachlapania, pył i zarysowania**,
                                więc śmiało możesz nosić go przy kluczach, w torbie czy nawet w kieszeni dziecka.
                                Dzięki wymiennej baterii AirTag działa nawet przez rok bez konieczności ładowania.
                                To **dyskretne, stylowe i praktyczne rozwiązanie** dla każdego,
                                kto chce być pewny, że ważne przedmioty zawsze są tam, gdzie trzeba.',
                'order' => 3
            ]);
        }
    }
}
