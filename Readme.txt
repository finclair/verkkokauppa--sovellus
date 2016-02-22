
Tietokantataulun eri ominaisuudet
1. tuote_indeksi
2. tuote_nimi
3. tuote_hinta
3. tuote_info
4. tuote_kategoria
5. tuote_saldo
5. tuote_kuva (indeksi)



HAKU

Sivuston on pystytt�v� listaamaan halutessa kaikki tuotteet.
Sivuston tulee my�s kyet� hakemaan v�hint��n kahdella ominaisuudella 
haluamaansa tuotetta.

OSTOSKORI

Tuotteet sijoitetaan sessiomuuttujiin ja siirryt��n sen j�lkeen kassalle
->Erillisell� sivulla laaditaan lasku ja kysyt��n
	*Tilaajan nimi
	*tilaajan osoite
	*s�hk�posti <-- Tarkistetaan PEAR:n validate oliolla.





TY�P�IV�KIRJA

16.11

Ty�t aloitettu
Tehtiin paperille prototyyppi verkkokaupan ulkoasusta ja informaatioarkkitehtuurista.
Pohdittiin teht�v�nannon osalta, ett�, mitk� kohdat tuotoksesta on helpompi ja mitk� vaikeita toteuttaa. 

Ty�h�n k�ytetty aika 3 tuntia

17.11

Luotiin html:n ja css:n avulla staattinen malli sivuston yleisest� rakenteesta. T�h�n kuului
mm. header-, footer- sek� navigaatio palkki ja n�iden on tarkoitus n�ky� ellei kaikissa,
niin suurimmassa osassa toteutettavaa sivustoa. Navigaatiopalkissa linkit ovat viel� staattisia ja
ohjaavat k�ytt�j�n samalle sivulle. My�s tuotteiden listaus tyyli toteuttiin kovakoodaamalla,
eli varsinaista tietokantaa viel� k�ytet� arvojen dynaamiseen tulostamiseen. Tietokanta ja sen taulut
kuitenkin luotiin valmiiksi, ja sinne tullaan laittamaan arvoja seuraavana ty�kertana.

Ty�h�n k�ytetty aika 3 tuntia

19.11

Luotuun tietokantaan sijoitettiin kymmenkunta arvoa, mink� pit�isi olla riitt�v�sti, ett� kyet��n
tekem��n testej�. Samalla my�s toteuttiin ensimm�iset tietokantahaut koskien tuotteiden tulostamista.
Toistaiseksi tyydyttiin ratkaisuun, ett� etusivulle tulostettaan koko tietokannan sis�lt�. T�h�n
ratkaisuun pohditaan muutosta my�hemmin ja yhten� ideana voisi etusivulla n�ky� vain uussimmat 6 tuotetta,
jotka on lis�tty viimeksi tietokannan tauluun.

Toinen tuntuva muutos oli navigaatiopalkin kehitt�minen. Nyt jokaisen linkin alta l�ytyy vain halutut tuotteet.
T�m� toteutettiin formin avulla k�ytt�en GET -metodia. 

Ty�h�n k�ytetty aika 5 tuntia

21.11

Hakupaneelin tekoa. Mietittiin mill� arvoilla tuotteita olisi j�rkevint� hakea ja toteutettiin sivu search.php ja hakuvaihtoehdoiksi
p��ttettiin nimi ja hinta.

Ty�h�n k�ytetty aika 4 tuntia

22.11

Haku eli search.php -sivun korjailua ja eheytt�mist�. Tehtiin lomakekenttien tarkistus ja luotiin kullekin haku skenaariolle
oma silmukka. 

Ty�h�n k�ytetty aika 2 tuntia

23.11

Ostoskorin tekoa ja pohdintaa. Tilattavan tuotteen m��r�n merkitsev� formi luotu ja t�h�n liittyv� painike luotu.

Ty�h�n k�ytetty aika 4 tuntia

25.11 

Ostokorin tekoa ja pohdintaa. Ensimm�inen versio ostoskorista ja sen logiikasta saatu toimivaksi. add-to-cart.php
sek� shopping-cart saatu toiminnaltaan valmiiksi.

Ty�h�n k�ytetty aika 4 tuntia

26.11

Ostoskorin raakaversion viimeistely�. HTML - ja CSS -rakenteiden tekoa.

Ty�h�n k�ytetty aika 1 tuntia

27.11

Koodin siivousta ja hajauttamista - tehtiin erillinen hakemisto 'plugin',
josta koodit haetaan include ja require funktioiden avulla tarvittaessa.

Ty�h�n k�ytetty aika 2 tuntia

29.11

Ostoskori -sivun virhehallintaa eheytetty. Toimii siis varmemmin. T�h�n kuulu html -tagien 
poistamista sek� s�hk�postin validointia. 

Ty�h�n k�ytetty aika 3 tuntia


1.12

Navigaatioon lis�tty kategoria 'kaikki' ja etusivu muutettu n�ytt�m��n ingressi sek� uutuuksia,
joka tehtiin valmistamalla erillinen tietokantalause.
Lis�ksi luotiin include funktiolla kutsuttuille koodeille oma kansio

Ty�h�n k�ytetty aika 4 tuntia

3.12

Luotiin client taulu ja lis�ttiin ostoskoriin ominaisuus, jossa client tauluun lis�t��n aina
asiakkaan antamat tiedot sek� tehdyn tilauksen tuotesis�lt�.

Ty�h�n k�ytetty aika 5 tuntia

4.12

Lis�ttiin sivun header-osioon painike, joka toimii linkkin� ostoskoriin. Luotiin my�s
sivu, jossa ilmoitetaan tilauksen onnistuneen ja kiitet��n asiaksta. Lis�ksi nostettiin tuotem��r� 15
taulukossa product.

Ty�h�n k�ytetty aika 3 tuntia

5.12

Aloitettiin sivuston k�ytt�ohjeen kirjoitus

Ty�h�n k�ytetty aika 1 tuntia

7.12

Luotiin ostoskori -sivulle erillinen header -osio, jossa 'Ostoskori' painiketta ei ole n�kyviss�. Luotiin
my�s tuotteille info sivu, jossa tulostetaan tarkasteltavan tuotteen tietoja, jotka haetaan kannasta.

Ty�h�n k�ytetty aika 3 tuntia

8.12

Kommentoitiin koodia sek� lis�ttiin add-to-cart -sivulle linkit etusivulle ja ostoskoriin. Lis�ksi ostoskori -sivuun tehtiin alkuun tarkastus,
joka eliminoi syntaksivirheen. Lopuksi viel� pohdittiin toista ratkaisua asiakastietojen tallettamiseen, sill� nykyisen tietokantaratkaisun luominen
vaatisi todella paljon aikaa.

Ty�h�n k�ytetty aika 2 tuntia

9.12

Jatkettiin sivuston k�ytt�ohjeen kirjoitusta

Ty�h�n k�ytetty aika 2 tuntia 

10.12

Viimeisteltiin sivuston k�ytt�ohje sek� tehtiin harkittu toisenlainen ratkaisu asiakastietojen tallettamiseen mail -funktiota k�ytt�en. 
T�ll� ratkaisulla asiakkaitten tekemi� tilauksia on helpompi selata kuin edellisess� yksinkertaisessa tietokantaratkaisussa,
jossa tilauksen sis�lt� tulostui yhteen sarakkeeseen.

Ty�h�n k�ytetty aika 4 tuntia

11.12.

Koodin korjailua validoimista varten. Aloitettiin teknisen kuvauksen tekeminen dokumenttia varten.

Ty�h�n k�ytetty aika 4 tuntia

12.12.

Koodin korjailu ja turhien debuggaamiseen k�ytettyjen tulostus lauseiden poistaminen.
Siirryttiin kullakin sivulla k�ytt�m��n https-protokollaa. Tehtiin viel� muokkaus, jossa placeholder kuva haetaan projektin img-
hakemistosta, sill� https-protokola ei toiminut haettaessa placeholder kuvaa erilliselt� sivulta placehold.it
Jatkettiin teknisen kuvauksen kirjoittamista. 

Ty�h�n k�ytetty aika 5 tuntia

13.12

Loput havaitut turhat kommentit pois ja lis�ttiin paremmin informoivia kommentteja
Ostoskori sivun hakukenttiin tehtiin viel� ominaisuus, jonka avulla sivu muistaa k�ytt�j�n antamat
edelliset sy�tteet mik�li jokin menee pieleen tilauksessa.
Tehtiin dokumentaatio loppuun. Lis�ksi tilauksen yhteydess� tieto v�litty nyt sek� kauppiaalle, ett� asiakkaalle.
Luotiin my�s asiakkaan yhteystiedot kysyv��n lomakkeeseen ominaisuus, joka muistaa virheen sattuessa k�ytt�j�n 
antamat edelliset sy�tteet. T�m� paransi sivun k�ytett�vyytt�.
Ty�h�n k�ytetty aika 6 tuntia

Aloitettiin teknisen 
					--- TODO ----
Etusivulle satunnais generointi tietokannan tietueista --> n�ytet��n 9 tuotetta

Sy�tteiden tarkistaminen hatitallisista merkeist�

Ostoskorin ilmeen uusiminen ja eheytys

ent� jos m��r��n laittaa 01 tai 03 tai vastaavaa fixed

Indeksin pit�� p�ivitty� taulussa client