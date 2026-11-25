# Writeup Vault

A Laravel web application where hackers share and organize their CTF writeups
(TryHackMe, HackTheBox, picoCTF and more). Users can publish their own writeups,
browse and filter writeups from others, and manage their own records from a personal dashboard.

Built as the final project for the Web Programming course.

## Main Features

- **Browse writeups** with search and filters by category, difficulty and platform (paginated)
- **Full CRUD** for writeups: create, read, update and delete, with validation and flash messages
- **Authentication**: register, login and logout, written by hand (no starter kit)
- **Authorization**: only the author can edit or delete a writeup (policy, `@can` and controller checks)
- **Dashboard**: shows the logged-in user's own writeups
- **Profile page**: update name, email and password
- **Spoiler-protected flags**: flags in a writeup (like `THM{...}` or `HTB{...}`) are blurred until clicked, with a copy button
- **Responsive design** with a terminal-style dark theme and a mobile menu

## Tech Stack

- Laravel (PHP 8.4)
- SQLite
- Blade components (layout with slots, reusable components with props)
- Tailwind CSS
- Alpine.js (mobile menu, dismissible alerts, flag reveal and copy)

## Concepts Covered

| Area | Where |
|------|-------|
| Routing (named routes, parameters, groups) | `routes/web.php` |
| Resource controller and Request object | `app/Http/Controllers/WriteupController.php` |
| Blade layout component with slots, components with props | `resources/views/components/` |
| Migrations (including one that updates a table) | `database/migrations/` (`add_platform_to_writeups_table`) |
| One-to-many relationship | `User` has many `Writeup` |
| Factories and seeders | `database/factories/`, `database/seeders/` |
| Route model binding, validation, flash messages | `WriteupController` |
| Middleware (`auth`, `guest`) | `routes/web.php` |
| Policy and `@can` | `app/Policies/WriteupPolicy.php`, `resources/views/writeups/show.blade.php` |
| Pagination | writeups list and dashboard |

## How to Run

Requirements: PHP, Composer, Node.js and npm.

```bash
# 1. Clone the repository
git clone https://github.com/maidejakupi/writeup-vault.git
cd writeup-vault

# 2. Install dependencies
composer install
npm install

# 3. Set up the environment
cp .env.example .env
php artisan key:generate

# 4. Create the SQLite database file
# (on Windows PowerShell: New-Item database/database.sqlite)
touch database/database.sqlite

# 5. Run migrations and seed test data
php artisan migrate --seed

# 6. Start the app (use two terminals)
npm run dev
php artisan serve
```

Then open `http://127.0.0.1:8000`.
If you use Laravel Herd, the site is served automatically at `http://writeup-vault.test`.

## Test Account

After seeding, you can log in with:

- Email: `test@example.com`
- Password: `password`

The seeder also creates 5 other users with writeups, so you can check that only
the author can edit or delete their own writeups.

## Author

GitHub: [@maidejakupi](https://github.com/maidejakupi)
