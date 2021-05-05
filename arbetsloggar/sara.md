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
