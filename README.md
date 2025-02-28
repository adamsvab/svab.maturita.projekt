# svab.maturita.projekt
**NÁVOD K INSTALACI**
1. Aby mohl být program spuštěn, je potřeba stáhnout potřebné aplikace:
   https://www.wampserver.com/en/
   https://www.mysql.com/products/workbench/
2. Pokud by byl problém při instalaci, je nutné doinstalovat chybějící Microsoft VC++ Packages
   https://wampserver.aviatechno.net/
3. ZIP soubor z GitHub repository je nutné extrahovat ve složce "www" která se vytvořila po instalaci WampServer. C:\wamp64\www
4. V souboru connect.php je potřeba předefinovat proměnné $LOGIN a $PASSWORD na takové, které bylo zadáno při instalaci MySQL Wokrbench
5. V aplikaci MySQL Workbench otevřete soubor create_eshop.sql a pomocí ikony blesku provedete automaticky všechny příkazy v souboru.
6. Nyní lze program spustit zadáním tohoto příkazu do URL řádku. http://localhost/eshop/index.php


**NÁVOD K POUŽITÍ**
1. Už na webu klikněte v navigačním menu na přihlásit se. Buď se přihlásíte jako admin (adam.dl@seznam.cz heslo: 12345) a nebo se zaregistrujete
2. Po té co jste přihlášen můžete začit nakupovat.
3. Kliknete na Přidat do košíku a produkt se přidá do košíku
4. Když se dostanete do košíku můžete buď měnit množství produktu( nastavením libovolné nezáporné hodnoty a stisknutim zelených šipek v kolečku) nebo ho smazat (červeným košem)
5. Po stisknutí tlačÍtka Vymazat celý košík, se smažou všechny produkty z košíku.
6. Když kliknete na tlačitko Dokončit objednávku, přesměruje vás to na na doručovací údaje a potvrzení objednávky.
7. Následným Potvrdit vás web přesměruje na souhrn vaší objednávky.
8. Když kliknete na v navigačním menu na Můj účet ukaží se vám údaje o vašem profilu a tlačítko pro odhlášení.

- ADMIN MÁ V MŮJ ÚČET TLAČÍTKO NAVÍC (ADMIN_PANEL) KDE VIDÍ SEZNAM VŠECH OBJEDNÁVEK
- PO STISKNUTÍ ČERVENÉHO TLAČÍTKA NA KONCI ŘÁDKU SE UKÁŽE DETAIL DANNÉ OBJEDENÁVKY S TLAČÍTKEM KTERÁ UMOŽŇUJE ZMĚNU STAVU OBJEDNÁVKY NA (ODESLÁNO)


