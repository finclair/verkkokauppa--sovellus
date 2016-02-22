
Tietokantataulun eri ominaisuudet
1. tuote_indeksi
2. tuote_nimi
3. tuote_hinta
3. tuote_info
4. tuote_kategoria
5. tuote_saldo
5. tuote_kuva (indeksi)



HAKU

Sivuston on pystyttävä listaamaan halutessa kaikki tuotteet.
Sivuston tulee myös kyetä hakemaan vähintään kahdella ominaisuudella 
haluamaansa tuotetta.

OSTOSKORI

Tuotteet sijoitetaan sessiomuuttujiin ja siirrytään sen jälkeen kassalle
->Erillisellä sivulla laaditaan lasku ja kysytään
	*Tilaajan nimi
	*tilaajan osoite
	*sähköposti <-- Tarkistetaan PEAR:n validate oliolla.





TYÖPÄIVÄKIRJA

16.11

Työt aloitettu
Tehtiin paperille prototyyppi verkkokaupan ulkoasusta ja informaatioarkkitehtuurista.
Pohdittiin tehtävänannon osalta, että, mitkä kohdat tuotoksesta on helpompi ja mitkä vaikeita toteuttaa. 

Työhön käytetty aika 3 tuntia

17.11

Luotiin html:n ja css:n avulla staattinen malli sivuston yleisestä rakenteesta. Tähän kuului
mm. header-, footer- sekä navigaatio palkki ja näiden on tarkoitus näkyä ellei kaikissa,
niin suurimmassa osassa toteutettavaa sivustoa. Navigaatiopalkissa linkit ovat vielä staattisia ja
ohjaavat käyttäjän samalle sivulle. Myös tuotteiden listaus tyyli toteuttiin kovakoodaamalla,
eli varsinaista tietokantaa vielä käytetä arvojen dynaamiseen tulostamiseen. Tietokanta ja sen taulut
kuitenkin luotiin valmiiksi, ja sinne tullaan laittamaan arvoja seuraavana työkertana.

Työhön käytetty aika 3 tuntia

19.11

Luotuun tietokantaan sijoitettiin kymmenkunta arvoa, minkä pitäisi olla riittävästi, että kyetään
tekemään testejä. Samalla myös toteuttiin ensimmäiset tietokantahaut koskien tuotteiden tulostamista.
Toistaiseksi tyydyttiin ratkaisuun, että etusivulle tulostettaan koko tietokannan sisältö. Tähän
ratkaisuun pohditaan muutosta myöhemmin ja yhtenä ideana voisi etusivulla näkyä vain uussimmat 6 tuotetta,
jotka on lisätty viimeksi tietokannan tauluun.

Toinen tuntuva muutos oli navigaatiopalkin kehittäminen. Nyt jokaisen linkin alta löytyy vain halutut tuotteet.
Tämä toteutettiin formin avulla käyttäen GET -metodia. 

Työhön käytetty aika 5 tuntia

21.11

Hakupaneelin tekoa. Mietittiin millä arvoilla tuotteita olisi järkevintä hakea ja toteutettiin sivu search.php ja hakuvaihtoehdoiksi
päättettiin nimi ja hinta.

Työhön käytetty aika 4 tuntia

22.11

Haku eli search.php -sivun korjailua ja eheyttämistä. Tehtiin lomakekenttien tarkistus ja luotiin kullekin haku skenaariolle
oma silmukka. 

Työhön käytetty aika 2 tuntia

23.11

Ostoskorin tekoa ja pohdintaa. Tilattavan tuotteen määrän merkitsevä formi luotu ja tähän liittyvä painike luotu.

Työhön käytetty aika 4 tuntia

25.11 

Ostokorin tekoa ja pohdintaa. Ensimmäinen versio ostoskorista ja sen logiikasta saatu toimivaksi. add-to-cart.php
sekä shopping-cart saatu toiminnaltaan valmiiksi.

Työhön käytetty aika 4 tuntia

26.11

Ostoskorin raakaversion viimeistelyä. HTML - ja CSS -rakenteiden tekoa.

Työhön käytetty aika 1 tuntia

27.11

Koodin siivousta ja hajauttamista - tehtiin erillinen hakemisto 'plugin',
josta koodit haetaan include ja require funktioiden avulla tarvittaessa.

Työhön käytetty aika 2 tuntia

29.11

Ostoskori -sivun virhehallintaa eheytetty. Toimii siis varmemmin. Tähän kuulu html -tagien 
poistamista sekä sähköpostin validointia. 

Työhön käytetty aika 3 tuntia


1.12

Navigaatioon lisätty kategoria 'kaikki' ja etusivu muutettu näyttämään ingressi sekä uutuuksia,
joka tehtiin valmistamalla erillinen tietokantalause.
Lisäksi luotiin include funktiolla kutsuttuille koodeille oma kansio

Työhön käytetty aika 4 tuntia

3.12

Luotiin client taulu ja lisättiin ostoskoriin ominaisuus, jossa client tauluun lisätään aina
asiakkaan antamat tiedot sekä tehdyn tilauksen tuotesisältö.

Työhön käytetty aika 5 tuntia

4.12

Lisättiin sivun header-osioon painike, joka toimii linkkinä ostoskoriin. Luotiin myös
sivu, jossa ilmoitetaan tilauksen onnistuneen ja kiitetään asiaksta. Lisäksi nostettiin tuotemäärä 15
taulukossa product.

Työhön käytetty aika 3 tuntia

5.12

Aloitettiin sivuston käyttöohjeen kirjoitus

Työhön käytetty aika 1 tuntia

7.12

Luotiin ostoskori -sivulle erillinen header -osio, jossa 'Ostoskori' painiketta ei ole näkyvissä. Luotiin
myös tuotteille info sivu, jossa tulostetaan tarkasteltavan tuotteen tietoja, jotka haetaan kannasta.

Työhön käytetty aika 3 tuntia

8.12

Kommentoitiin koodia sekä lisättiin add-to-cart -sivulle linkit etusivulle ja ostoskoriin. Lisäksi ostoskori -sivuun tehtiin alkuun tarkastus,
joka eliminoi syntaksivirheen. Lopuksi vielä pohdittiin toista ratkaisua asiakastietojen tallettamiseen, sillä nykyisen tietokantaratkaisun luominen
vaatisi todella paljon aikaa.

Työhön käytetty aika 2 tuntia

9.12

Jatkettiin sivuston käyttöohjeen kirjoitusta

Työhön käytetty aika 2 tuntia 

10.12

Viimeisteltiin sivuston käyttöohje sekä tehtiin harkittu toisenlainen ratkaisu asiakastietojen tallettamiseen mail -funktiota käyttäen. 
Tällä ratkaisulla asiakkaitten tekemiä tilauksia on helpompi selata kuin edellisessä yksinkertaisessa tietokantaratkaisussa,
jossa tilauksen sisältö tulostui yhteen sarakkeeseen.

Työhön käytetty aika 4 tuntia

11.12.

Koodin korjailua validoimista varten. Aloitettiin teknisen kuvauksen tekeminen dokumenttia varten.

Työhön käytetty aika 4 tuntia

12.12.

Koodin korjailu ja turhien debuggaamiseen käytettyjen tulostus lauseiden poistaminen.
Siirryttiin kullakin sivulla käyttämään https-protokollaa. Tehtiin vielä muokkaus, jossa placeholder kuva haetaan projektin img-
hakemistosta, sillä https-protokola ei toiminut haettaessa placeholder kuvaa erilliseltä sivulta placehold.it
Jatkettiin teknisen kuvauksen kirjoittamista. 

Työhön käytetty aika 5 tuntia

13.12

Loput havaitut turhat kommentit pois ja lisättiin paremmin informoivia kommentteja
Ostoskori sivun hakukenttiin tehtiin vielä ominaisuus, jonka avulla sivu muistaa käyttäjän antamat
edelliset syötteet mikäli jokin menee pieleen tilauksessa.
Tehtiin dokumentaatio loppuun. Lisäksi tilauksen yhteydessä tieto välitty nyt sekä kauppiaalle, että asiakkaalle.
Luotiin myös asiakkaan yhteystiedot kysyvään lomakkeeseen ominaisuus, joka muistaa virheen sattuessa käyttäjän 
antamat edelliset syötteet. Tämä paransi sivun käytettävyyttä.
Työhön käytetty aika 6 tuntia

Aloitettiin teknisen 
					--- TODO ----
Etusivulle satunnais generointi tietokannan tietueista --> näytetään 9 tuotetta

Syötteiden tarkistaminen hatitallisista merkeistä

Ostoskorin ilmeen uusiminen ja eheytys

entä jos määrään laittaa 01 tai 03 tai vastaavaa fixed

Indeksin pitää päivittyä taulussa client