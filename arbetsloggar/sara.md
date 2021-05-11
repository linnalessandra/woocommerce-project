Torsdag 29/4: 
Vi satt med Miss Hosting och försökte få det att fungera, vilket det ej gjorde. 
Vi skapade ett github repo och vi skrev ett gruppkontrakt tillsammans.

Fredag 30/4: 
På morgonen skapade jag en projekt-tavla och alla issues som behövs höras under 
arbetets gång. Vi delade upp så att alla fick ett issue var att jobba med. Jag 
skulle skapa shop-sidan. Satt och testade att ändra genom att kopiera över product-archive.php
 och content-product.php till en mapp som jag döpte till woocommerce. Tog bort sidebaren med 
hjälp av remove_action.

Måndag 3/5: 
Jag skapade en style-shop.css som jag köade in i functions.php. Här skriver jag stylingen 
till shop-sidan. Har i functions.php skapat ett custom post type som heter butik och har 
taxonomy: plats. När jag skapade min custom posttype ville jag att man skulle kunna lägga 
till en bild till butiken och fick då lägga till parametern ’supports’ som i sin tur tar 
in en lista:
$myTestArray = array( 'thumbnail', 'title', 'editor');
    register_post_type('stores', [
        'public' => true,
        'label' => 'Stores',
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => $myTestArray
        ]);

Title och editor är med per default om man inte ändrar något som jag gjorde så därför
fick jag skriva till dem annars kan man ej redigera den posttypen. Skapade sedan en 
sida i admin-panelen som jag döpte till stores som jag kopplade till en template-stores.php 
som jag skapade. I index.php la jag till loopen och skriver ut the content, annars visas inget 
när man ex går in på cart.

Tisdag 4/5:
I min template-stores.php har jag skapat en loop som loopar ut just poster med post-type: ’stores’. 
Har även lagt till lite styling till denna i style-shop.css. Har fortsatt lägga till lite styling på 
cart, checkout och enskild produkt.
Har skapat några pages på våran live sida som vi kan koppla sen när pushar upp koden.

Onsdag 5/5:
Idag har jag skapat en custom meta box till posttypen stores, i denna kan man i redigeringsläget välja vilken adress som tillhör affären man skapat. Har även lagt till så att detta skrivs ut i template-stores.php. Laddade ner plugin för kartor som heter leaflet maps marker och skapade kartor för varje affär. Kollade på plugin för caching så att sidan blir snabbare.
La till bildstorlek large i funktionen get_the_post_thumbnail_url för att inte få ut orginalbilderna som var på ca 554kb, istället en på ca 147kb så att sidan laddar snabbare.

Torsdag 6/5:
Idag på morgonen har vi suttit och laddat upp den senaste koden på live-sidan. Har suttit och fixat ett plugin för fraktmetoden ’cykelbud’. Har även lagt till en lite ”puff” för blogginlägg med hjälp av en widget.

Fredag 7/5:
Har idag suttit med frakt-pluginet (cykelbud), nu har jag fått det att fungera. Fraktkostnaden är beroende på hur mycket produkterna väger du handlar. Har även kollat lite på hur inloggningssystemet för kunderna på woocommerce fungerar (aktiverat att man kan skapa ett konto) och lagt till lite styling på sidan ”my account”.

Måndag 10/5: 
Har fortsatt på pluginet, har lagt till att man i admin-panelen kan välja kostnad för cykelbud under 5kg.

Tisdag 11/5:
Fortsatt med frakt-plugin, lagt till en funktion som kollar vilken postkod kunden som beställer har, har du inte någon av de postkoder som våra butiket liggir i blir det väldigt dyrt. Idag ska vi förbereda presentationen och fixa med småsaker på sidan.


