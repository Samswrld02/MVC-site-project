# 📺 Media Tracker MVC Framework

Een custom-built PHP MVC framework voor het beheren van een media-bibliotheek (series en films). Dit project is vanaf de basis opgebouwd om de architectuur van moderne frameworks zoals Laravel te doorgronden en toe te passen.



## 🚀 Key Features

* **Custom Regex Router:** Een krachtige routing engine die wildcards en dynamische URL-parameters ondersteunt (bijv. `/details/{resource}/{id}`).
* **Gecentraliseerde Middleware:** Beveiliging via een **Base Controller-patroon**. De `HomeController` constructor fungeert als "gatekeeper" voor alle onderliggende controllers via overerving.
* **CLI Database Suite:**
    * **Migrations:** Geautomatiseerd database-schema beheer via `migrate.php`.
    * **Factory Seeder:** Razendsnel testdata genereren via de terminal, inclusief ondersteuning voor variabelen via `$argv`.
* **Dynamic Class Loading:** Slimme class-resolutie (`turnToClass`) om resources automatisch te koppelen aan de juiste Models en Controllers.
* **Volledige Auth Flow:** Veilig inlogsysteem met sessiebeheer en een geïntegreerde logout-procedure.

---

## 🛠 Gebruikte Technieken

* **PHP 8.0** (Object-Oriented Programming, PDO, Sessions)
* **Regex** (Gebruikt voor URL-parsing en Factory template parsing)
* **MySQL**
* **MVC Design Pattern**

---

## 📂 Project Structuur

```text
├── authentication/    # Login controller & Middleware logica
├── controllers/       # Controllers (Add, Edit, Home overerven van Base)
├── Models/            # Database interactie & Business logica
├── migrations/        # Database schema definities & Migration class
├── factory/           # Seeder configuratie en Factory engine
├── views/             # De UI templates (HTML/PHP)
├── Router/            # De core routing engine
├── migrate.php        # CLI entry point voor migraties
└── seed.php           # CLI entry point voor seeding
