FORUM CON LARAVEL

Questo è un forum semplice sviluppato con Laravel dove gli utenti possono registrarsi, fare login e pubblicare post.

--------------------
SETUP DATABASE
--------------------
1. Crea un nuovo database MySQL:
   - Apri il terminale
   - Accedi a MySQL: mysql -u root -p
   - Crea il database: CREATE DATABASE forum_laravel;
   - Esci da MySQL: exit

2. Configura il file .env:
   - Copia il file di esempio: cp .env.example .env
   - Modifica questi valori nel file .env:
     DB_DATABASE=forum_laravel
     DB_USERNAME=root
     DB_PASSWORD=la_tua_password

--------------------
INSTALLAZIONE
--------------------
1. Installa le dipendenze:
   composer install

2. Genera la chiave dell'applicazione:
   php artisan key:generate

3. Collega Laravel al database:
   php artisan migrate

4. Avvia il server:
   php artisan serve

Il sito sarà disponibile all'indirizzo: http://localhost:8000

--------------------
COME USARE
--------------------
1. Registrazione:
   - Clicca su "Registrazione"
   - Inserisci nome, email e password
   - Verrai registrato e loggato automaticamente

2. Login:
   - Usa email e password per accedere

3. Pubblicare Post:
   - Dalla homepage, se sei loggato
   - Compila il form con titolo e contenuto
   - Clicca su "Pubblica"

--------------------
COMANDI UTILI
--------------------
- Ricreare il database da zero:
  php artisan migrate:fresh

- Pulire la cache:
  php artisan cache:clear
  php artisan config:clear
  php artisan view:clear

- In caso di errori:
  composer dump-autoload
  php artisan optimize:clear

--------------------
STRUTTURA DATABASE
--------------------
Il database contiene due tabelle principali:
- users: per gli utenti registrati
- posts: per i post pubblicati

Per vedere la struttura completa, guarda i file in:
database/migrations/ 
