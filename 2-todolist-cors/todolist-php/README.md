# Todo List Cors - Backend Side

-   `functions.php` mette in comunicazione front-end e il backend
-   Nella cartella **tasks** ci sono i file json relativi alle tasks eliminate, completate e da-fare.
-   Nella cartella **get** ci sono le varie chiamate per ottenere le diverse liste di tasks.
-   Gli altri file servono per elaborare le varie chiamate axios quali
    -   **complete** &rarr; Completa una task, la prende da `tasksTodo.json` e la sposta in `tasksDone.json`.
    -   **delete** &rarr; Elimina una task, la prende da `tasksDone.json` e la sposta in `tasksDeleted.json`.
    -   **recycleBin** &rarr; Elimina definitivamente tutte le task, svuotando `tasksDeleted.json`.
    -   **restore** &rarr; Ripristina una task, spostandola in `tasksTodo.json`.
    -   **restoreAll** &rarr; Ripristina ogni task, spostandole tutte in `tasksTodo.json`.
    -   **store** &rarr; Salva una task, mettendola in `tasksTodo.json`.
