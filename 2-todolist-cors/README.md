# Todo List Cors

Seconda implementazione della Todo List con PHP.  
Per ottenere la persistenza dei dati mi sono avvalso di 3 file json in cui salvo le varie task e il loro stato. Tramite `Axios` metto in comunicazione il front-end creato con `Vite` e il Backend-PHP che gestisce i `file JSON`.

## Milestone

-   Deve essere anche gestita la persistenza dei dati leggendoli da, e scrivendoli in file JSON.
-   Permettere di segnare un task come completato spostandola nella lista di quelle completate
-   Permettere di eliminare una task spostandola nella lista di quelle eliminate
-   Permettere di ripristinare una task, riportandola in quelle da completare
-   Permette di ripristinare tutte le task eliminate con solo click.
-   Permettere di eliminare definitivamente le task, svuotando la lista di quelle eliminate con un solo click.
