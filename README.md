# AlloSimplon

My first fullstack dynamic website:
A movie catalog featuring user authentication, search/sort/filter options, user ratings, likes, discussions, and a full admin CRUD system.

## Usage

I updated the project to use Docker since it was hard to replicate my old environment.

```bash
docker compose up --build
```

Then visit: [http://localhost:8000](http://localhost:8000)

### Admin account

- **Email**: [admin@admin.admin](mailto:admin@admin.admin)
- **Password**: admin

This account gives access to the administrator interface and full CRUD: managing accounts, movies, comments...

## Functionalities

### Global

- A database-driven movie catalog with pagination, search, sort, and filter capabilities.
- Each movie has a like count and a rating, both dynamically updated by user interactions.
- Suggested similar movies when viewing a movie page.

### User-specific

- User authentication with persistent login via sessions.
- Ability to update your info (username, email, password).
- Rate and like movies.
- Access your liked movies.
- Post, edit, and delete your comments.
- Report other users’ comments.

### Admin-specific

- Update a movie directly from its page.
- Delete any comment.
- Full CRUD access for Movies, Actors, Directors, Screenwriters, Genres, Users, and Comments.

## Notions

### New concepts learned

- Git usage
- Full website creation workflow (sketching, planning tools, database design, etc.)
- Database modeling (conceptual/logical) and creation (SQL scripts)
- Tailwind CSS
- Responsive
- SQL queries (and awareness of SQL injections)
- File uploads
- Backend form validation
- Multi-filtering and sorting

### Strengthened skills

- UI/UX experience
