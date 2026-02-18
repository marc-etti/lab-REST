# Laboratorio REST: Curl, Insomnia & JsonPlaceholder
[Torna al README iniziale](README.md)
## Requisiti
- `curl`: strumento da linea di comando per effettuare richieste HTTP
  Se non è installato, puoi installarlo con:
  ```bash
  sudo apt install curl
  ```
- `jq`: strumento da linea di comando per elaborare JSON
  Se non è installato, puoi installarlo con:
  ```bash
  sudo apt install jq
  ```
- `Insomnia`: strumento grafico per testare API REST
  Se non è installato, puoi scaricarlo da [qui](https://insomnia.rest/download).

## Esercizi svolti
### Esercizio 1: GET
1. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/posts/1` e visualizza la risposta.
    ```bash
    curl https://jsonplaceholder.typicode.com/posts/1
    ```
2. Utilizza `jq` per estrarre il titolo del post dalla risposta JSON.
    ```bash
    curl https://jsonplaceholder.typicode.com/posts/1 | jq '.title'
    ```
    - il parametro `| jq '.title'` estrae il campo `title` dalla risposta JSON
3. Utilizza Insomnia per effettuare la stessa richiesta GET e visualizza il titolo del post.

### Esercizio 2: POST
1. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/posts` con il seguente corpo JSON:
    ```json
    {
    "title": "foo",
    "body": "bar",
    "userId": 1
    }
    ```
    ```bash
    curl -X POST https://jsonplaceholder.typicode.com/posts \
      -H "Content-Type: application/json" \
      -d '{"title": "foo", "body": "bar", "userId": 1}'
    ```
    - il parametro `-X POST` specifica il metodo HTTP da utilizzare
    - il parametro `-H "Content-Type: application/json"` imposta l'intestazione per indicare che il corpo della richiesta è in formato JSON
    - il parametro `-d` specifica il corpo della richiesta in formato JSON
    - Nota: la risorsa non viene effettivamente creata, ma la risposta simula un successo
2. Utilizza `jq` per estrarre l'ID del nuovo post creato dalla risposta JSON.
    ```bash
    curl -X POST https://jsonplaceholder.typicode.com/posts \
      -H "Content-Type: application/json" \
      -d '{"title": "foo", "body": "bar", "userId": 1}' | jq '.id'
    ```
3. Utilizza Insomnia per effettuare la stessa richiesta POST e visualizza l'ID del nuovo post creato.

### Esercizio 3: PUT
1. Utilizza `curl` per effettuare una richiesta PUT a `https://jsonplaceholder.typicode.com/posts/1` con il seguente corpo JSON:
    ```json
    {
    "title": "foo",
    "body": "bar",
    "userId": 1
    }
    ```
    ```bash
    curl -X PUT https://jsonplaceholder.typicode.com/posts/1 \
      -H "Content-Type: application/json" \
      -d '{"title": "foo", "body": "bar", "userId": 1}'
    ```
    - Nota: la risorsa non viene effettivamente aggiornata, ma la risposta simula un successo
2. Utilizza Insomnia per effettuare la stessa richiesta PUT e visualizza il titolo aggiornato del post.

### Esercizio 4: PATCH
1. Utilizza `curl` per effettuare una richiesta PATCH a `https://jsonplaceholder.typicode.com/posts/1` con il seguente corpo JSON:
    ```json
    {
    "title": "foo updated"
    }
    ```
    ```bash
    curl -X PATCH https://jsonplaceholder.typicode.com/posts/1 \
      -H "Content-Type: application/json" \
      -d '{"title": "foo updated"}' 
    ```
    - Nota: la risorsa non viene effettivamente aggiornata, ma la risposta simula un successo
2. Utilizza Insomnia per effettuare la stessa richiesta PATCH e visualizza il titolo aggiornato del post.

### Esercizio 5: DELETE
1. Utilizza `curl` per effettuare una richiesta DELETE a `https://jsonplaceholder.typicode.com/posts/1`.
    ```bash
    curl -X DELETE https://jsonplaceholder.typicode.com/posts/1
    ```
    - Nota: la risorsa  non viene effettivamente eliminata, ma la risposta simula un successo
2. Utilizza Insomnia per effettuare la stessa richiesta DELETE

### Esercizio 6: Query Parameters
1. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere tutti i post dell'utente con ID 1.
    ```bash
    curl https://jsonplaceholder.typicode.com/posts?userId=1
    ```
2. Utilizza Insomnia per effettuare la stessa richiesta GET e visualizza i post dell'utente con ID 1.
### Esercizio 7: Errore 404
1. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/posts/9999` (un post che non esiste) e visualizza la risposta.
    ```bash
    curl https://jsonplaceholder.typicode.com/posts/9999
    ```
2. Utilizza Insomnia per effettuare la stessa richiesta GET e verifica che venga restituito un errore 404.

### Esercizio 8: Errori 400
1. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/posts` con un corpo JSON mancante di campi obbligatori (ad esempio solo `{"title": "foo"}`).
    ```bash
    curl -i -X POST https://jsonplaceholder.typicode.com/posts \
      -H "Content-Type: application/json" \
      -d '{"title": "foo"}'
    ```
    - il parametro `-i` include le intestazioni della risposta nella visualizzazione, in modo da poter vedere il codice di stato HTTP
    - Nota: la risorsa non viene effettivamente creata, ma la risposta simula un errore 400 a causa dei campi mancanti
2. Utilizza Insomnia per effettuare la stessa richiesta POST e verifica che venga restituito un errore 400.

### Esercizio 9: Autenticazione
1. Utilizza `curl` per effettuare una richiesta GET a `https://httpbin.org/basic-auth/user/passwd` con autenticazione di base (username: `user`, password: `passwd`).
    ```bash
    curl -i -u user:passwd https://httpbin.org/basic-auth/user/passwd
    ```
    - il parametro `-u user:passwd` specifica le credenziali per l'autenticazione di base
2. Ripeti la richiesta GET con credenziali errate (username: `user`, password: `wrong`) e verifica che venga restituito un errore 401.
    ```bash
    curl -i -u user:wrong https://httpbin.org/basic-auth/user/passwd
    ```
3. Utilizza Insomnia per effettuare la stessa richiesta GET con autenticazione di base e visualizza il codice di stato della risposta (dovrebbe essere 401)

## Esercizi da svolgere
### Esercizi GET
1. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere tutti i post dell'utente con ID 2.
2. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere il post con ID 5.
3. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere tutti i commenti del post con ID 3.
4. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere tutti gli utenti.
5. Struttura completa di user:
    ```json
    {
        "id": 1,
        "name": "Leanne Graham",
        "username": "Bret",
        "email": "Sincere@april.biz",
        "address": {
        "street": "Kulas Light",
        "suite": "Apt. 556",
        "city": "Gwenborough",
        "zipcode": "92998-3874",
        "geo": {
            "lat": "-37.3159",
            "lng": "81.1496"
        }
        },
        "phone": "1-770-736-8031 x56442",
        "website": "hildegard.org",
        "company": {
        "name": "Romaguera-Crona",
        "catchPhrase": "Multi-layered client-server neural-net",
        "bs": "harness real-time e-markets"
        }
    },
    ```
    Recuppera tutti gli utenti residenti a Gwenborough.

### Esercizi POST
1. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/posts` con un corpo JSON che rappresenta un nuovo post.
2. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/comments` con un corpo JSON che rappresenta un nuovo commento.
3. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/users` con un corpo JSON che rappresenta un nuovo utente.
4. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/albums` con un corpo JSON che rappresenta un nuovo album.