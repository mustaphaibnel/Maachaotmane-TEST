# 🧪 Symfony Calculator API – 1-Hourand 30 minutes Technical Test

## 🎯 Objective

This test evaluates your ability to:
- Build a Symfony API using clean architecture (DTO, DAO, Transformer)
- Use Docker + Docker Compose (with PostgreSQL)
- Document your API using Swagger (OpenAPI)
- Write at least one PHPUnit test
- Follow Git best practices (feature branching)

This is a real-world simulation. You are expected to deliver working, testable code in **1 :30hour**.

---

## ⏱️ Time Limit

**Total time: 90 minutes**

Push your code even if incomplete. Bonus points for good structure and traceability.

---

## ✅ Requirements

### 🔧 API Functionality

Implement the following:

| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/calculate` | Accepts two numbers and an operation, returns the result |
| `GET`  | `/api/doc`   | Swagger UI generated from annotations |
| *(Optional)* | `/history` | (Bonus) Return previous calculations (if persisted via DAO) |

---

### 🔢 Input Payload

```json
{
  "operation": "multiply",  // One of: add, subtract, multiply, divide
  "a": 8,
  "b": 2
}
````

### ✅ Success Response

```json
{
  "result": 16
}
```

### ⚠️ Error Handling

|Case|HTTP Status|Response|
|---|---|---|
|Division by zero|`400`|`{ "error": "Division by zero" }`|
|Invalid operation|`400`|`{ "error": "Invalid operation" }`|
|Bad input|`400`|`{ "error": "Invalid input" }`|

---

## 🔧 Tech Requirements

You must use:

- ✅ Symfony (minimal setup)
    
- ✅ Docker + Docker Compose
    
- ✅ PostgreSQL
    
- ✅ Swagger via NelmioApiDocBundle (`/api/doc`)
    
- ✅ Git (feature branch: `feat/calculator-api`)
    
- ✅ Clean structure with:
    
    - DTO (Data Transfer Object)
        
    - DAO (Data Access Object)
        
    - Service layer
        
    - Transformer
        
- ✅ PHPUnit test covering at least one case
    

---

## 📂 Folder Structure

| Path                                               | Purpose                             |
| -------------------------------------------------- | ----------------------------------- |
| `src/Controller/CalculatorController.php`          | Main controller                     |
| `src/DTO/CalculationRequestDTO.php`                | Parses and validates request data   |
| `src/DAO/CalculationHistoryDAO.php`                | Saves calculations (via DB or mock) |
| `src/Service/CalculatorService.php`                | Business logic layer                |
| `src/Transformer/CalculationResultTransformer.php` | Formats output                      |
| `config/packages/nelmio_api_doc.yaml`              | Swagger config                      |
| `tests/CalculatorTest.php`                         | At least one PHPUnit test           |
| `docker-compose.yml`                               | App + PostgreSQL stack              |
| `Dockerfile`                                       | Symfony/PHP app container           |
| `Makefile` (optional)                              | Local developer commands            |
| `README.md`                                        | These instructions                  |

---

## 🚀 Run Locally

> You need Docker & Docker Compose installed.

```bash
# Build and start the app
docker-compose up --build
```

API URL:  
➡️ `http://localhost:8000/calculate`

Swagger UI:  
➡️ `http://localhost:8000/api/doc`

---

## 🧪 Run Tests

```bash
docker-compose exec app ./vendor/bin/phpunit
```

---

## 🧠 Architecture Overview

|Component|Role|
|---|---|
|**DTO**|Wrap and validate request input (`a`, `b`, `operation`)|
|**DAO**|Abstract data access and (optionally) store history|
|**Service**|Central logic for calculations and error handling|
|**Transformer**|Format result into a clean JSON output|

---

## 📋 Submission Instructions

1. Push your code to a test GitHub or GitLab repository.
    
2. Use a feature branch named: `feat/calculator-api`
    
3. Share the repo URL.
    
4. Include any notes or assumptions in a separate `candidate.md` file if needed.
    

---

## 🌟 Bonus Points

|Bonus Task|Value|
|---|---|
|`/history` endpoint using DAO + DB|⭐⭐|
|Enum validation for operation types|⭐|
|Tests for invalid input or edge cases|⭐|
|Swagger response examples|⭐|
|Makefile (`make up`, `make test`)|⭐|

---

## 🚨 Important Notes

- This is a time-boxed test. We're not expecting a full production-ready system.
    
- Focus on **clarity**, **separation of concerns**, and **real-world structure**.
    
- Don't over-engineer. Just deliver a solid foundation with basic best practices.
    

Good luck 🚀
