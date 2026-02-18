# Client PHP per REST API
[Torna al README iniziale](README.md)

## Indicazioni
Una volta creato il server REST, e basandosi sul codice del client `client_jasonplaceholder.php`, implementare un client PHP che interagisca con il server REST creato in Laravel.

Comando per eseguire il client:
```bash
php client.php
```

## Richieste da implementare:

- `GET https://localhost:8000/posts/1`

- `POST https://localhost:8000/api/posts with JSON body { "title": "foo", "content": "bar" }`

- `PUT https://localhost:8000/api/posts/1`

- `PATCH https://localhost:8000/api/posts/4`

- `DELETE https://localhost:8000/api/posts/4`