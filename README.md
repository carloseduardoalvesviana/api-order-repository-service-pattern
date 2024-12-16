# API de Gerenciamento de Pedidos no Laravel

Este projeto apresenta uma API de gerenciamento de pedidos (**Order**) no Laravel, utilizando o **padrão de repository** e **service** para manter a aplicação bem estruturada, seguindo boas práticas de separação de responsabilidades.

---

## Estrutura do Projeto

```plaintext
app/
├── Http/
│   ├── Controllers/
│   │   └── OrderController.php
├── Repositories/
│   ├── Interfaces/
│   │   └── OrderRepositoryInterface.php
│   └── OrderRepository.php
├── Services/
│   └── OrderService.php
├── Models/
│   └── Order.php
```

---

## Testando a API

Agora você pode testar as seguintes rotas:

| Método HTTP | Rota             | Descrição                     |
| ----------- | ---------------- | ----------------------------- |
| GET         | /api/orders      | Listar todos os pedidos       |
| GET         | /api/orders/{id} | Exibir um pedido específico   |
| POST        | /api/orders      | Criar um novo pedido          |
| PUT/PATCH   | /api/orders/{id} | Atualizar um pedido existente |
| DELETE      | /api/orders/{id} | Deletar um pedido específico  |

---
