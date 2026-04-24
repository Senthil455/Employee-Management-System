# 🧑‍💼 Employee Management System (EMS)

A web‑based **Employee Management System** built with **HTML, CSS, JavaScript, PHP, and PostgreSQL**.  
This system enables organizations to efficiently manage **employee records, payroll workflows, and basic reporting** through a clean, responsive interface.

---

## 🧠 Overview

The **Employee Management System (EMS)** is a **backend‑focused CRUD application** that streamlines workforce administration tasks such as:

- Employee onboarding and profile management  
- Role‑based access and basic payroll workflows  
- Simple reporting and dashboard views  

Designed for **local or small‑scale teams**, this project is ideal for learning PHP‑based backend development, relational database design, and secure web forms.

---

## 🛠️ Tech Stack

- **Frontend**  
  - HTML5, CSS3, JavaScript (vanilla)  
  - Responsive layout for basic dashboards and forms  

- **Backend**  
  - **PHP** (plain PHP, no framework)  
  - PostgreSQL for relational data storage  

- **Database**  
  - **PostgreSQL** – Stores employee records, departments, roles, and basic payroll data  

- **Security & Auth**  
  - Secure login/logout flow  
  - Session‑based authentication  
  - Basic input handling and SQL‑safe patterns via PHP

---

## ✨ Key Features

### Employee Management

- Add, view, edit, and delete **employee records**.  
- Store **employee details** (name, contact, department, role, joining date, salary, etc.).  
- Maintain **employee status** (active, on‑leave, inactive) and timestamps for updates.  

### Admin Dashboard

- **Admin‑only dashboard** (`admin_dashboard.php`)  
  - Centralized view of all employees  
  - Overview of departments, roles, and basic stats  
  - Links to manage employees, payroll, and system settings  

### Login & Authentication

- **Login page** (`login.php`) with secure credential handling  
- **Login process** (`login_process.php`) that validates user credentials and sets up a PHP session  
- **Logout** functionality (`logout.php`) to invalidate sessions  

### Data & Structure

- **Database configuration** (`db_config.php`)  
  - PostgreSQL connection details centralization  
  - Easy to switch between local and hosted DB instances  
- **Database schema** (`schema.sql`)  
  - Well‑defined tables for:
    - `employees`  
    - `departments` / `roles`  
    - `payroll` or transactions (if added later)  
- **File structure overview** (`structure.txt`)  
  - Documented layout for easy onboarding and contribution

---

## 📂 Project Structure

```text
Employee-Management-System/
├── assets/              # CSS, JS, and static assets
├── includes/            # PHP includes (headers, footers, navs)
├── modules/             # Functional PHP modules (e.g., employee CRUD)
├── admin_dashboard.php  # Main admin panel  
├── db_config.php        # Database connection settings  
├── index.php            # Home / landing page  
├── login.php            # Login view  
├── login_process.php    # Login logic  
├── logout.php           # Logout logic  
├── schema.sql           # PostgreSQL schema  
└── structure.txt        # Project structure documentation  
```

Developed and maintained by **Senthil Raja R** — Full Stack Developer | AI Automation Enthusiast.  
🔗 GitHub: [https://github.com/Senthil455/Employee-Management-System](https://github.com/Senthil455/Employee-Management-System)  
🔗 Profile: [https://github.com/Senthil455](https://github.com/Senthil455)

---

## ⚙️ Getting Started

### Prerequisites

- **PHP** (7.4+ recommended)  
- **PostgreSQL** installed and running  
- Web server (Apache or Nginx) with PHP support  
- `php-pgsql` extension enabled  

### 1. Clone the repository

```bash
git clone https://github.com/Senthil455/Employee-Management-System.git
cd Employee-Management-System
```

### 2. Configure the database

1. Import the schema:

   ```bash
   psql -U your_user -d your_db -f schema.sql
   ```

2. Update `db_config.php` with your PostgreSQL credentials:

   ```php
   $host = "localhost";
   $dbname = "employee_ems";
   $username = "your_user";
   $password = "your_password";
   ```

(Replace with your actual DB details.)

### 3. Configure the web server

- Place the project in your web root (e.g., `/var/www/html/ems` or `C:\xampp\htdocs\ems`).  
- Make sure `index.php`, `login.php`, and `admin_dashboard.php` are accessible via browser.  

### 4. Run the app

- Open in browser: `http://localhost/ems` (or your configured path).  
- Use the default admin / user accounts (if configured in the DB or via `INSERT` SQL).  
- From the admin dashboard, you can:
  - Add new employees  
  - View and edit existing records  
  - Monitor basic payroll / status views  

---

## 🔐 Security & Best Practices

- **Session‑based authentication** to protect admin routes.  
- Centralized DB config (`db_config.php`) for easier environment‑switching.  
- PostgreSQL schema (`schema.sql`) designed with:
  - Proper primary keys  
  - Foreign keys where applicable  
  - Clear naming conventions  
- Ready to extend with:
  - **bcrypt** password hashing  
  - **role‑based permissions** beyond admin / employee  
  - **parameterized queries** or prepared‑statement‑style patterns for stronger SQL injection safety  

---

## 🚀 Project Value for Portfolio

This project demonstrates:

- **Relational database design** with PostgreSQL.  
- **Plain PHP backend patterns** without a framework.  
- **Admin‑centric dashboards** for data management.  
- **Extensible base** for:
  - Payroll processing enhancements  
  - Time‑tracking / attendance modules  
  - Export‑to‑PDF or CSV reports  

It’s a **solid intermediate‑level PHP project** that looks great on resumes for **web developer, backend engineer, or junior full‑stack roles**.

---


## 📫 Let’s Connect

- 📧 **Email**: [senthilrajasen637@gmail.com](mailto:senthilrajasen637@gmail.com)  
- 🔗 **GitHub Profile**: [https://github.com/Senthil455](https://github.com/Senthil455)  

---

Build with 💡 using **PHP, PostgreSQL, HTML, CSS, and JavaScript**  
A clear, role‑based **Employee Management System** ready for practice and extension.  
