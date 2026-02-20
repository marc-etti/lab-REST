# Soluzioni agli esercizi
### Esercizi GET
1. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere tutti i post dell'utente con ID 2.
```bash
curl https://jsonplaceholder.typicode.com/posts?userId=2
```
2. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere il post con ID 5.
```bash
curl https://jsonplaceholder.typicode.com/posts/5
```
3. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere tutti i commenti del post con ID 3.
```bash
curl https://jsonplaceholder.typicode.com/comments?postId=3
```
4. Utilizza `curl` per effettuare una richiesta GET a `https://jsonplaceholder.typicode.com/` per ottenere tutti gli utenti.
```bash
curl https://jsonplaceholder.typicode.com/users
```

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
    ```bash
    curl "https://jsonplaceholder.typicode.com/users?address.city=Gwenborough"
    ```



### Esercizi POST
1. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/posts` con un corpo JSON che rappresenta un nuovo post.
```bash
curl -X POST https://jsonplaceholder.typicode.com/posts \
    -H "Content-Type: application/json" \
    -d '{"title": "foo", "body": "bar", "userId": 1}'
``` 
2. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/comments` con un corpo JSON che rappresenta un nuovo commento.
```bash
curl -X POST https://jsonplaceholder.typicode.com/comments \
    -H "Content-Type: application/json" \
    -d '{"name": "my comment", "email": "myemail@example.com", "body": "This is my comment"}'
```
3. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/users` con un corpo JSON che rappresenta un nuovo utente.
```bash
curl -X POST https://jsonplaceholder.typicode.com/users \
    -H "Content-Type: application/json" \
    -d '{"name": "John Doe", "username": "johndoe", "email": "john.doe@example.com"}'
```
4. Utilizza `curl` per effettuare una richiesta POST a `https://jsonplaceholder.typicode.com/albums` con un corpo JSON che rappresenta un nuovo album.

