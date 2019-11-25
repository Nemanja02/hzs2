## mula
# Pomoć za pronalaženje najboljeg događaja u vašoj blizini

Korišćene  tehnologije:

- APIs:
    - Za dobijanje koordinata lokacije na osnovu imena: https://locationiq.com/ 
    - Za dobijanje koordinata na osnovu korisničke ip adrese: https://ip-api.com/

- Jezici i framework:
    - HTML
    - SCSS https://sass-lang.com/
    - JavaScript
    - PHP https://www.php.net/
    - laravel https://laravel.com/ 
    - ajax

Web aplikacija koja omogućava pronalaženje dešavanja u vašoj blizini. Uz pomoć različitih parametra moguće je naći najbolje mesto za izlazak u grad, posetu lepe izložbe ili koncert vašeg omiljenog benda. 

Na početnoj strani nalaze se događaji koji najbolje odgovaraju širim masama i koji su najaktuelniji u datom trenutku ali u zavisnosti od interesovanja možete pronaći i događaje koje spadaju u ove kategorije:

- Koncert
- Film
- Predstava
- Sajam
- Izložba
- Javni čas
- Muzički festival
- Žurka

Korišićenjem asinhronog JavaScript-a (ajax) pri unosu lokacije događaja moguće je izabrati tačno mesto dešavanja.

Korišćenjem CSS promenjivih i malo JavaScript-a dodali smo opciju za svetlu ili temnu temu. Izabrana opcija ostaje upamćena i posle napuštanja sajta

Za instalaciju potrebnih biblioteka za pokretanje servera za ovu web aplikaciju potrebno je:
- PHP
- Apache server
- MySQL/MariaDB database
- Composer package manager
- npm package manager

Mala tajna koju smo dodali je sakriveni Konami kod na jednoj od stranica sajta. Ljubitelji starih video igara će veoma uživati ukoliko otkriju ovo malo iznenađenje.

Svi .css i .scss fajlovi se nalaze u folderu /public/styles

Stranice sajta se nalaze u resources/views. Stranice su pisane u Laravel Blade sintaksi koja se sastoji od obične html sintakse sa nekim specifičnim dodacima.

Skripte se nalaze u public/js

Ajax zahtevi su pisani unutar stranica u script tagovima

Folderi node_modules i vendor cuvaju strane biblioteke potrebne za rad aplikacije

Modeli za aplikaciju se nalaze u app folderu