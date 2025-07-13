# AlloSimplon

My first fullstack dynamic website :
A movie catalogue, featuring user authentification, searching/sorting/filtering, notes, likes, discussions and a CRUD for administrative stuff.

# Functionalities

Global :

- A database driven movie catalog with the ability to search / sort or filter through.
- Each movie has a like count and a note which are both dynamically updated based on users interactions.
- When viewing a movie, similar movies are suggested.

User specific :

- User authentification, with sessions keeping you logged in.
- Ability to update your infos (username, email, password).
- Grade / Like a movie.
- Access your likes.
- Post / Edit / Delete your comment
- Report another comment

Admin specific :

- Update a movie directly from the it's page.
- Delete any comment directly.
- Access to the CRUD : Create/Read/Update/Delete Movies, Actors, Realisators, Scenarists, Genres, Users, Comments

# Notions

New notions :

- Git usage
- Full website creation process (Sketching, organization tool, database design...)
- Database design (conceptual/logical data model) and creation (sql script)
- Tailwind css
- SQL queries (and sql injections)
- Backend form validation

Strenghtening notions :

- UI experience

# Usage

I updated this project to use docker since it was annoying to run otherwise

`docker compose up --build`
Visit `http://localhost:8000`

Admin account :
mail: admin@admin.admin
password : admin

Allows you to navigate the administrateur interface and CRUD. Managing accounts, movies, comments...
