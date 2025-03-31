Opis zadania:
Stwórz aplikację "To-Do list", która umożliwia użytkownikowi dodawanie, edytowanie, przeglądanie i usuwanie zadań (CRUD) oraz wysyłanie powiadomień e-mail.
-------------------------------------------------------------------------------------
Wymagania funkcjonalne:
1. CRUD:
- Pełne operacje CRUD (Create, Read, Update, Delete) na zadaniach, z następującymi polami:
- Nazwa zadania (max 255 znaków, wymagane)
- Opis (opcjonalnie)
- Priorytet (low/medium/high)
- Status (to-do, in progress, done)
- Termin wykonania (data, wymagane)
2. Przeglądanie zadań:
- Filtrowanie listy zadań według priorytetów, statusu i terminu.
3. Powiadomienia e-mail:
- Powiadomienie e-mail na 1 dzień przed terminem zadania. Użyj mechanizmów Laravel (Queues i Scheduler).
4. Walidacja:
- Upewnij się, że wszystkie formularze poprawnie walidują dane (np. wymagane pola, odpowiedni format daty, limity znaków dla pól tekstowych).
5. Obsługa wielu użytkowników:
- Każdy użytkownik powinien mieć możliwość zalogowania się i zarządzania własnymi zadaniami (użyj systemu uwierzytelniania Laravela).
6. Udostępnianie zadań bez autoryzacji za pomocą linka z tokenem dostępowym:
- Umożliw użytkownikowi generowanie linków publicznych do zadań z tokenem dostępu. Link ma ograniczony czas działania, po którym dostęp do zadania zostaje zablokowany.
-------------------------------------------------------------------------------------
Dodatkowe funkcje (opcjonalne):

7. Pełna historia edycji notatek:
- Zapisuj każdą zmianę zadań (nazwy, opisy, priorytety, statusy, daty itp.) wraz z możliwością przeglądania poprzednich wersji.
8. Integracja z Google Calendar:
- Umożliw przypięcie zadania do Google Kalendarza za pomocą integracji z biblioteką spatie/laravel-google-calendar. Użytkownik powinien mieć możliwość skojarzenia ważnych zadań z kalendarzem Google.
-------------------------------------------------------------------------------------
Wymagania techniczne:
1. Back-end:
Laravel 11, REST API, Eloquent ORM, MySQL/SQLite, migracje baz danych.
2. Front-end:
Prosty interfejs użytkownika stworzony w Laravel Blade (opcjonalnie AJAX).
3. (Opcjonalnie) Konfiguracja w Dockerze:
Możliwość dostarczenia projektu z konfiguracją Docker (Dockerfile, docker-compose.yml). Dzięki temu uruchomienie aplikacji będzie łatwiejsze.
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
Task Description:
Create a "To-Do List" application that allows users to add, edit, view, and delete tasks (CRUD) and send email notifications.
-------------------------------------------------------------------------------------
Functional Requirements:
1. CRUD:
- Full CRUD operations (Create, Read, Update, Delete) for tasks, with the following fields:
- Task Name (max 255 characters, required)
- Description (optional)
- Priority (low/medium/high)
- Status (to-do, in progress, done)
- Due Date (date, required)
2. Viewing Tasks:
- Filter the task list by priority, status, and due date.
3. Email Notifications:
- Send an email notification 1 day before the task's due date. Use Laravel mechanisms (Queues and Scheduler).
4. Validation:
- Ensure all forms validate data correctly (e.g., required fields, proper date format, character limits for text fields).
5. Multi-User Support:
- Each user should be able to log in and manage their own tasks (use Laravel's authentication system).
6. Sharing Tasks Without Authorization via Access Token:
- Allow users to generate public links to tasks with an access token. The link should have a limited validity period, after which access to the task is blocked.
-------------------------------------------------------------------------------------
Additional Features (Optional):

7. Full Edit History of Notes:
- Save every change to tasks (names, descriptions, priorities, statuses, dates, etc.) with the ability to view previous versions.
8. Integration with Google Calendar:
- Allow users to attach tasks to Google Calendar using the spatie/laravel-google-calendar library. Users should be able to associate important tasks with their Google Calendar.
-------------------------------------------------------------------------------------
Technical Requirements:
1. Back-End:
Laravel 11, REST API, Eloquent ORM, MySQL/SQLite, database migrations.
2. Front-End:
A simple user interface created with Laravel Blade (optionally with AJAX).
3. (Optional) Docker Configuration:
Provide the project with Docker configuration (Dockerfile, docker-compose.yml) to make the application easier to run.
