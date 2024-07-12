<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<img src="https://img.shields.io/badge/template-tested-green" alt="Build Status">
<img src="https://img.shields.io/badge/laravel-10.10-red" alt="Laravel 10.10" />
<img src="https://img.shields.io/badge/laravel_breeze-1.28.1-red" alt="Laravel Breeze 1.28.1" />
<img src="https://img.shields.io/badge/bootstrap-5.3.2-red" alt="Bootstrap 5.3.2" />
<img src="https://img.shields.io/badge/vite-5.00-red" alt="Vite 5.00" />
<br>
<img src="https://img.shields.io/badge/license-boolean_95-blue" alt="Licensed to Boolean Students #95" />
<img src="https://img.shields.io/badge/license-boolean_109-blue" alt="Licensed to Boolean Students #109" />
<img src="https://img.shields.io/badge/license-boolean_125-blue" alt="Licensed to Boolean Students #125" />
</p>

# INFO

Questo git-template fornisce lo scaffold di una web application realizzata con Laravel 10, Blade, Breeze, SCSS, Bootstrap e Vite. 

- [Documentazione Laravel 10.x](https://laravel.com/docs/10.x).
- [Documentazione Laravel Breeze](https://laravel.com/docs/10.x/starter-kits).

# SETUP INIZIALE

- Creare un repository a partire da questo template, cliccando in alto a destra sul pulsantone verde `Use this template` e poi su `Create a new repository`
- Clonare il repository appena creato sul proprio PC
- Da phpMyAdmin creare un database, importarvi i dati e segnarvi il nome dato al DB
- Creare un file `.env`. Si può procedere copiandolo da `.env.example`
- Per creare la APP_KEY nel `.env`, lanciare il comando dedicato, ma prima installare le dipendenze composer
	```bash
    composer install
	php artisan key:generate
	```
 - Installare anche le dipendenze NPM
	```bash
	npm i
	```
- Ri-controllare che tutti i dati nel `.env` siano corretti (attenzione al database!)
- Lanciare migrazioni e seeder
	```bash
	php artisan migrate:fresh --seed
	```
- Lanciare il progetto tramite il server built-in di PHP
	```bash
	php artisan serve
	```
- Lanciare vite
	```bash
	npm run dev
	```
- Puntare il browser all'indirizzo mostrato in terminale per controllare che tutto funzioni.
- Navigate all'indirizzo per fare [login](http://localhost:8000/admin). Potete registrare un nuovo utente o usare:
	```bash
	user: luca@lambia.it
	pass: 1backdoor2big
	```
- Una volta loggati dovreste poter raggiungere [la dashboard](http://localhost:8000/admin)

# RISORSE: MODEL, CONTROLLER, MIGRATION, SEEDER

Si possono creare tutti insieme con:

```bash
php artisan make:model NomeModello -rmsR
```

-r o --resource indica se creare un controller di tipo Resource Controller
<br>
-c o --controller crea un normale Controller (se non usato insieme a -r)
<br>
-m o --migration crea la Migration per il modello
<br>
-s o --seed crea il Seeder per il modello
<br>
-R o --requests crea le FormRequest e le usa nel Resource Controller
<br>

Qui trovate la lista dei parametri accettati da [`make:model`](https://artisan.page/#makemodel)

A questo punto potete andare a definire il comportamento di migration e seeder nei relativi file.

Infine lanciate entrambi usando il comando:
```bash
php artisan migrate:fresh --seed
```

# CRUD

Una volta creato un Resource Controller richiamatelo dalla rotte, come abbiamo sempre fatto.
```php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController; // <---- Importare il controller da usare!!

Route::resource('posts', PostController::class);
```

Testato che tutto funzioni possiamo valutare di spostarlo sotto autenticazione.

Spostare il Resource Controller appena creato da `App\Http\Controllers` a una nuova cartella `App\Http\Controllers\Admin` 

Nel controller correggere il namespace ed importare il Controller generico
```php
<?php
namespace App\Http\Controllers\Admin; // era "App\Http\Controllers"
use App\Http\Controllers\Controller; // Controller di base da importare (!)
//...ecc
```

Ora possiamo spostare le rotte del Resource Controller all'interno del blocco protetto da autenticazione:

```php

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
	
	// Admin Post CRUD
	Route::resource('posts', PostController::class);
});
```

A questo punto avrebbe senso anche spostare tutte le viste richiamate dal controller. Se prima si creava sotto "views" una cartella "nomeRisorsa" con tutte le viste:
```bash
/resources/views/posts/*.blade.php
```
Adesso invece quella cartella andrà creata sotto "views/admin"
```bash
/resources/views/admin/posts/*.blade.php
```
-------------------
Ciao a tutti, anche oggi continuate su Boolfolio. Oggi ci avviciniamo al mondo delle relazioni, ma su Laravel.
:uno CRUD
Dovrete creare un nuovo Model (con relative Migration, Seeder e Resource Controller) per la risorsa Type.
Ogni Type prevede: nome, descrizione e icona.
Type possibili sono: Front-end, Back-end, Full stack e Design.
Procedete poi realizzando le CRUD per questo tipo di dato, in modo da poter gestire da dashboard i Tipi previsti.
Solo quando tutto funziona concentratevi sulle relazioni.


:due: RELAZIONI SU DB
Create una nuova migration che vi permetta di aggiungere la foreign key "type_id" sul Project.
In questo modo ogni Project sarà collegato a un Type. Ogni Type sarà collegato a più Project.
Quale di questi due dati è indipendente? Quale invece dipende dalla presenza dell'altro? :avviso:
Riflettete la modifica nel seeder, se ne avete uno.
A cose fatte dovrà essere possibile avviare il classico php artisan migrate:fresh --seed senza che si rompa nulla.
A questo punto nella show dei Project potrete stampare il ->type_id del progetto corrente. Restituirà solo l'ID del Type.


:tre: RELAZIONI SUI MODEL
Aggiungete ai model le relazioni: hasMany o belongTo.
Quale dei due Model è indipendente? Quale invece dipende dalla presenza dell'altro? :avviso:
La relazione si traduce in: Indipendente possiede Dipendente e Dipendente appartiene a Indipendente.
Nei model: Indipendente hasMany Dipendente e Dipendente belongsTo Indipendente.
Una volta capita la direzione delle relazioni rifatevi al codice pushato in live coding e/o alle slide per trovare la giusta sintassi.
A questo punto nella show dei Project potrete stampare il ->type->name del progetto corrente. Restituirà la stringa col nome del Type.
:regalo: CRUD CON SELECT
Partite modificando create/edit dei Project, a questo punto dovranno avere un campo aggiuntivo: il campo TypeId, dove scrivere un valido ID.
Quando tutto funziona provate a ragionare su come far arrivare alla vista l'intera lista dei Type, così da farne una select.
:linguette_segnalibro: NOTE
Può essere naturale essere confusi a questo punto. Stiamo lavorando ad altissimi livelli di astrazione.
Le milestone 1 e 2 dovreste portarle a casa senza problemi.
Nel caso di problemi sulla milestone 3 approfondiremo l'argomento lunedì, non temete :faccia_leggermente_sorridente:
Buon lavoro a tutti e buon weekend!
-------------
esecuzione milestone 1:
andare a creare un Model Type con relativo controller, tabella migration e seeder : fatto 
esecuzione comando
```bash
 php artisan make:model Type -rms
 ```
 

 (r crea resource controller, m migration e s seeder)
dopo il comando da terminale in migration andare ad assegnare i valori delle colonne della tabella :fatto 
```php
$table->string('name');
$table->string('description');
$table->string('icon');
```

sul seeder poi vado a creare i tre tipi di progetto :Frontend,Backend,Fullstack,Design. :fatto 

```php
$full_stack=new Type(); // se lo scrivi la Classe con l'autocompilamento crea anche il link use App\Models\Type
$full_stack->name="Full Stack";
$full_stack->description="project worked on both frontend and backend ";
$full_stack->icon="fa-solid fa-sitemap";
<i class="fa-brands fa-firefox-browser"></i>// per frontend
<i class="fa-solid fa-desktop"></i>//per backend
```


lanciare poi il comando
```bash
  php artisan make:migration 
  php artisan db:seed --class=TypeSeeder
```
c'è anche php artisan col fresh --seed ma non ricordo 

dalla documentazione :

You may also seed your database using the migrate:fresh command in combination with the --seed option, which will drop all tables and re-run all of your migrations. This command is useful for completely re-building your database. The --seeder option may be used to specify a specific seeder to run:
```bash
php artisan migrate:fresh --seed
 
php artisan migrate:fresh --seed --seeder=DatabaseSeeder
```
eventualmente, questi ultimi comandi penso sia auspicabile usarli solo ad inizio progetto.
In caso di creazione di nuovo modello con relativi -rms sarebbe meglio poi fare il comando db:seed(opinione personale)

collego le rotte del TypeController nel file web.php :fatto
```php
        Route::resource('/type',TypeController::class );
	//ricordati di aver messo anche 
	use App\Http\Controllers\TypeController;
	// se hai scritto nella Route il TypeController con il compilamento automatico ti crea anche il percorso 

```

dopo aver fatto la semina, vado a lavorare sulle funzioni 
C.R.U.D. nel file TypeController 

quindi nel file TypeController, vado a scrivere le funzioni C.R.U.D.
```php
    public function index()
    {
         $types = Type::all();

         $data = [
             "categorie" => $types
         ];
         
		 return view("admin.types.index", $data);
    }

	 public function create()
    {
        return view('admin.types.create');
    }

	    public function store(Request $request)
    {
        //sono i dati che attivano dal form
        $data = $request->validate([
            "name" => "required|min:5|max:50",
            "description" => "required|min:10|max:200",
            "icon" => "required",
        ]);
        $newType = new Type();
        $newProject->fill($data);
        dump($data);
        
        $newType->save();
        return redirect()->route('admin.types.show', ['type' => $newProject]);
    }

	    public function edit(Type $type)
    {
        $data = [
            'type' => $type
        ];
        return view('admin.types.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();

        $type->name= $data['name'];
        $type->description= $data['description'];
        $type->creation_date= $data['creation_date'];

        $type->save();

        return redirect()->route('project.show', ['project'=> $type] );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');

    }
```
creare le viste relative alla cartella types(index,create,show)
copio le viste dagli altri file e modifico gli attributi name negli input in modo che combacino con le colonne della tabella Types :fatto

aggiungere il bottone Add Type nel layout admin :fatto
implementare la funzione per distruggere un dato nella cartella types and project

fine milestone 1
-------------
