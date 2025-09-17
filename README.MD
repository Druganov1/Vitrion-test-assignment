# Vitrion Proefopdracht – TODO API (Symfony)

Dit is de proefopdracht voor Vitrion:
een eenvoudige TODO applicatie als API, ontwikkeld met het Symfony framework.

---

## Vereisten

Zorg dat je het volgende hebt geïnstalleerd:

-   [PHP 8.1+](https://www.php.net/)
-   [Composer](https://getcomposer.org/)
-   [Symfony CLI](https://symfony.com/download)

---

## Installatie

1. Clone de repository:

    ```bash
    git clone https://github.com/Druganov1/Vitrion-test-assignment.git
    cd Vitrion-test-assignment
    ```

2. Installeer dependencies:

    ```bash
    composer install
    ```

---

## Applicatie starten

Start de Symfony server (of gebruik je eigen webserver):

```bash
symfony server:start
```

De API draait nu op:
[http://127.0.0.1:8000](http://127.0.0.1:8000)
de API is ook beschikbaar via deze link:
[http://localhost:8000](http://localhost:8000)

De automatische API documentatie is beschikbaar via Swagger:
[http://127.0.0.1:8000/api](http://127.0.0.1:8000/api)
of
[http://localhost:8000/api](http://localhost:8000/api)

---

## API Endpoints

-   **GET** `/api/todos` – Alle TODO’s ophalen
-   **POST** `/api/todos` – Nieuwe TODO aanmaken
-   **GET** `/api/todos/{id}` – Specifieke TODO ophalen
-   **PATCH** `/api/todos/{id}` – TODO bijwerken
-   **DELETE** `/api/todos/{id}` – TODO verwijderen

---

## Opmerking

Als je patch gebruikt om een todo item te updaten moet je de content-type header op application/merge-patch+json zetten
