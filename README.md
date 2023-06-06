PRESTO CODEVENGERS:

[TEMA]:
  Sistema di prenotazione apparatamenti/camere
//Tipo Airbnb
//Tipo Booking

[LINK-ISPIRAZIONE-LATO-FRONT]:
   https://www.airbnb.it/
   https://www.booking.com/

[PALETTE-COLORI]:
 DarkRed: #910000;
 SemiDarkRed: #BD1212;
 LightRed: #C10000;
 

[FONT]:
//


ACCEPTANCE CRITERIA:

- Utente deve potersi loggare->redirect a "inserisci annuncio" [AUTENTICAZIONE]
- Bottone “inserisci annuncio” in HOME->Utilizzo di Laravel Livewire per l'inserimento dell'annuncio [CREA-ANNUNCIO]
- Solo gli utenti loggati possono inserire un annuncio [AUTH]

RELAZIONI
- 10 Categorie dell'annuncio pre-compilate [CATEGORIE]:
 Tipologia luogo:
   /Mare
   /Lago
   /Montagna
   /Neve
   /Deserto
   /Città

Tipologia di app:
   /Appartamento
   /Villa
   /Hotel
   /Camping
   /Agriturismo
   
Contesto->opzionale(cosa fare):
  /Sport: sci, trekking, canottaggio
  /Parco giochi
  /Arte e cultura
  /Ristorazione
  /Spa


- La relazione tra Categoria e Annuncio è  1 a N []
- La relazione tra Utente e Annuncio è 1 a N []


- Ad annuncio inserito visualizzare un messaggio di conferma [ALERT-DI-CONFERMA]
