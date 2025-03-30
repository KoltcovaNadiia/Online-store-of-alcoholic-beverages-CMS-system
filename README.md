# 🍷 Low-Alcohol Beverages from Around the World

Це кастомна CMS-система, розроблена для керування інтернет-магазином алкогольної продукції. Проєкт реалізований на PHP без використання фреймворків.


---
## 🚀 Функціональність


- Реєстрація та авторизація користувачів
- Кошик і управління товарами
- Категоризація продукції
- Адмін-панель для CRUD операцій
- API для взаємодії з frontend
- Документація: Swagger / Storybook / PHPDoc
- DPR: Cookie popup, Privacy Policy

---

## 🔧 Стек технологій

- PHP 8.x
- MySQL
- HTML/CSS/JS (чистий)
- Apache + .htaccess
- OOP MVC структура
- API: `json`, `fetch`
- **Документація**: Swagger / Storybook / PHPDoc
- **GDPR**: Cookie popup + Privacy policy

---


## 📦 Встановлення

1. Клонувати репозиторій:
   ```bash
   git clone https://github.com/KoltcovaNadiia/Online-store-of-alcoholic-beverages-CMS-system.git
   ```

   
2. **Запуск через OpenServer / XAMPP / WAMP**
    - Скопіювати проєкт у директорію `domains/`
    - Створити базу даних MySQL і імпортувати дамп у MySQL (дамп — див. `database/sms.sql`) 
    - Створити базу даних MySQL і імпортувати дамп (sms.sql)
    - Відкрийте в браузері:
    ```
      http://localhost/kursach/
   ```
3. **Налаштування бази даних**  
   Вкажіть ваші параметри у `config/database.php`: Відкрити: [database.php](database.php)


   ```php
     define('DATABASE_HOST', 'localhost');
     define('DATABASE_LOGIN', 'root');
     define('DATABASE_PASSWORD', '');
     define('DATABASE_BASENAME', 'cms');
   ```

      
### 📦 Встановлення залежностей (фронтенд/документація)

```bash
  npm install
```
Перейти до http://kursach/

---

## ⚖️ Ліцензія
- Цей проєкт ліцензовано за умовами [MIT License].
- Створено LICENSE MIT
- Перевірено через license-checker
- Результати перевірки ліцензій див. у [(licenses-report.md)](licenses-report.md)



## 🍪 Cookie та GDPR
- Реалізовано cookie банер (бібліотека cookieconsent)
- Всі куки згідно з GDPR класифіковані:
  - Обов’язкові
  - Функціональні
  - Аналітика

- [ Конфігурація банеру у (layout.php)](views/layout.php)


---

## 🔐 Політика конфіденційності
Документація доступна у 2 форматах:
Markdown: privacy-policy.md
HTML: privacy-policy.html
- [ HTML:(PRIVACY_POLICY.md)](PRIVACY_POLICY.md)
- [ HTML:(privacy-policy.html)](privacy-policy.html)


---

## 📘 Документація
Автоматично згенерована документація до коду:

Згенеровано через phpDocumentor

Шлях: docs/index.html 
[ Відкрити (index.html)](docs/index.html)

- ⚙️ **Команда для генерації**:

  
```bash
  php C:\OSPanel\progs\phpDocumentor.phar --ignore vendor
```

---

## 📖 Storybook
UI компоненти (якщо фронтенд винесено у окремий репо):
Описано два компоненти:

1. Button

- Primary, Secondary, Custom

- Змінні: label, variant, size

2. ProductCard

- Default, Premium, Discounted

- Змінні: name, price, image, onBuy

Конфігуруються через argTypes

Компоненти адаптивні та мають інтерактивну логіку

Запуск:

```bash
  npm run storybook
```


---

### 🧪 Документація
Swagger – для API

Storybook – для UI компонентів

README, LICENSE, PRIVACY_POLICY.md – у корені проєкту

---


## 📘  API (Swagger)

Swagger доступний на:

## ⚙️ Встановлення

1. Переконайся, що у тебе встановлено **Node.js**.

2. У корені проєкту встанови залежності:

```bash
  npm install express swagger-ui-express
```

```bash
  node swagger-server.js
```

## 🔗 Демо

Swagger UI буде доступний після запуску за адресою:

```
http://localhost:3001/api-docs
```

## 📑 Опис API

| Метод | Шлях         | Опис                         |
|-------|--------------|------------------------------|
| GET   | `/products`  | Отримати всі продукти        |
| POST  | `/products`  | Додати новий продукт         |

---

3.Докладно — у [ (swagger-server.js)](swagger-server.js)

---




### 👤 Автор
Кольцова Надія
Фронтенд & бекенд розробка