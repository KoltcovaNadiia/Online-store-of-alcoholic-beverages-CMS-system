# 🍷 Low-Alcohol Beverages from Around the World

Це кастомна CMS-система, розроблена для керування інтернет-магазином алкогольної продукції. Проєкт реалізований на PHP без використання фреймворків.


---
## 🚀 Функціональність

- Реєстрація та авторизація користувачів
- Перегляд та управління товарами
- Категоризація продукції
- Кошик для покупок
- Адмін-панель (додавання/редагування продуктів)
- API для інтеграції з фронтендом
---

## 🔧 Стек технологій

- PHP 8.x
- MySQL
- HTML/CSS/JS (чистий)
- Apache + .htaccess
- OOP MVC структура
- JSON API
- **Документація**: Swagger / Storybook / PHPDoc
- **GDPR**: Cookie popup + Privacy policy

---

## 📁 Структура проекту

## 📦 Встановлення

1. Клонувати репозиторій:
   ```bash
   git clone https://github.com/yourusername/low-alcohol-cms.git
  
   
1. **Запуск через OpenServer / XAMPP / WAMP**
    - Скопіювати проєкт у директорію `domains/`
    - Створити базу даних MySQL і імпортувати дамп у MySQL (дамп — див. `database/sms.sql`) Створити базу даних MySQL і імпортувати дамп (sms.sql)
    - Відкрийте в браузері:
      ```
      http://localhost/kursach/
      ```
2. **Налаштування бази даних**  
   Вкажіть ваші параметри у `config/database.php`:

   ```php
     define('DATABASE_HOST', 'localhost');
     define('DATABASE_LOGIN', 'root');
     define('DATABASE_PASSWORD', '');
     define('DATABASE_BASENAME', 'cms');
      ```
### 📦 Встановлення залежностей (фронтенд/документація)
```
npm install
```
Перейти до http://kursach/

---

### 📑 API
GET /api/products – отримати список продуктів

POST /api/cart/add – додати товар до кошика

Докладніше – див. Swagger документацію у docs/swagger.yaml

---

🍪 Cookie та GDPR
- Реалізовано cookie банер (бібліотека cookieconsent)

- Всі куки згідно з GDPR класифіковані:

- Обов’язкові

- Функціональні

- Аналітика

- Конфігурація банеру — у public .

---

🔐 Політика конфіденційності
Документ знаходиться у файлі: privacy-policy.md

---

📘 Документація
Автоматично згенерована документація до коду:

phpDocumentor HTML версія → /docs/index.html

Або відкрийте Markdown-версію → docs/README.md

---

📖 Storybook
UI компоненти (якщо фронтенд винесено у окремий репо):

ProductCard

BuyButton

Доступ:

---
npm run storybook


---

### 🧪 Документація
Swagger – для API

Storybook – для UI компонентів

README, LICENSE, PRIVACY_POLICY.md – у корені проєкту

---

### ⚖️ Ліцензія
Проєкт ліцензовано за умовами MIT License.
Результати перевірки ліцензій див. у license-report.txt

---


## 📚 Документація коду

Проєкт містить згенеровану документацію до PHP-коду за допомогою [phpDocumentor](https://www.phpdoc.org/)

- 📁 **Шлях**: `/output/index.html`
- ⚙️ **Команда для генерації**:
  ```bash
  php C:\OSPanel\progs\phpDocumentor.phar --ignore vendor


---

Ініціалізація Storybook
У корені проєкту виконай у терміналі:


npx storybook init
Це створить потрібні конфіги: .storybook/ та приклади.

Так! Перевірмо твоє **завдання по Storybook**:

---

✅ **2 компоненти описано**  
Ти маєш:

1. **Button**
   - Файл: `Button.jsx`
   - Story: `Button.stories.jsx`
2. **ProductCard**
   - Файл: `ProductCard.jsx`
   - Story: `ProductCard.stories.jsx`

---

✅ **Властивості конфігуруються**  
В `argTypes` для обох сторі-файлів прописані конфігурування:

- `Button`: `label`, `variant`
- `ProductCard`: `name`, `price`, `image`

Це дозволяє змінювати їх значення через Storybook UI.

---

✅ **2-3 варіації (сторі) на компонент**

- **Button**:
   - `Primary`
   - `Secondary`
   - `Custom`

- **ProductCard**:
   - `Default`
   - `Premium`
   - `Discounted`

---

📦 **Storybook успішно запускається** і відображає компоненти → перевірено.

---

🎉 **Висновок**: Завдання **Storybook на 100% виконано правильно**.

Хочеш допомогу з наступним пунктом (Swagger, ReadMe, Cookie popup)?


npm run storybook


npm init -y




### 👤 Автор
Кольцова Надія
Фронтенд & бекенд розробка