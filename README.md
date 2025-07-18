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

## Concepts

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

## Screenshots

### Homepage

- Dynamic sorted movies sliders
<img width="1879" height="1880" alt="homepage" src="https://github.com/user-attachments/assets/bad4a78f-e481-4950-848f-ac81fbd92ded" />

- Movie card overlay
<img width="1855" height="914" alt="movie_card_overlay" src="https://github.com/user-attachments/assets/d4d7db33-744a-4df0-bd1e-63fa5de9c609" />

### Authentication

- Login / Sign in modals
<img width="472" height="395" alt="login_modal" src="https://github.com/user-attachments/assets/910237b2-ed02-4d2b-ad64-db1a13fa283f" />
<img width="503" height="592" alt="inscription" src="https://github.com/user-attachments/assets/91e06fa8-efbd-46c1-8fa8-d7c1fe5f74e2" />

- Profil page with update forms and favorites
<img width="450" height="481" alt="profil_modal" src="https://github.com/user-attachments/assets/de2a9b88-df9e-44c0-bcb7-32cfa5686a0b" />
<img width="406" height="335" alt="update_pseudo" src="https://github.com/user-attachments/assets/bf87d8cf-47d6-4329-a6e3-1b401d3d641d" />
<img width="402" height="418" alt="update_email_modal" src="https://github.com/user-attachments/assets/2f23e42e-abcd-4e5e-9506-fa9d7165952a" />
<img width="410" height="418" alt="update_password_modal" src="https://github.com/user-attachments/assets/adc9c807-444b-474d-b910-2c6095b6f615" />

### Catalog

- Full page
<img width="1786" height="1999" alt="catalog" src="https://github.com/user-attachments/assets/b262e0cf-7e32-457a-a9a4-4d64ef484c7b" />

- Search bar (accessible from anywhere) / results in the catalog
<img width="1520" height="277" alt="searchbar" src="https://github.com/user-attachments/assets/3d86ae02-0957-4bf3-bcda-2d476573258c" />
<img width="1509" height="621" alt="search_result" src="https://github.com/user-attachments/assets/c62be0aa-14e1-4147-a6a6-a1b8900aedc1" />


- Filter exemple : Action and Super-Heros tags, atleast 2 stars, sorted by date
<img width="1351" height="808" alt="filter_exemple" src="https://github.com/user-attachments/assets/c89f62f8-fe37-4fa3-82be-14f62a6bd068" />

### Movie page

- Top of the page with details followed by a synopsis and a trailer
<img width="1855" height="931" alt="movie_start" src="https://github.com/user-attachments/assets/64d3c495-4f1b-47e9-b81c-565608ea9401" />

- Update button (admin only) and comment section
<img width="1504" height="848" alt="comments" src="https://github.com/user-attachments/assets/5690d687-0584-414e-9ffa-237feb6f8d2d" />

- Similar movies slider (based on the tags)
<img width="1621" height="583" alt="similar_movies" src="https://github.com/user-attachments/assets/23597931-1df7-4844-90ed-7310ff0fb154" />

- The background is customized for each movie, actors/realisators/scenarists are hoverable.
<img width="1326" height="638" alt="actor_hover" src="https://github.com/user-attachments/assets/ecb0a396-3563-4947-8fc8-f0d5b6053672" />

### Feedback popup

- Feedback message when performing an action, trying to rate a movie when logged off will open the login modal
<img width="415" height="95" alt="rating" src="https://github.com/user-attachments/assets/11c2d21d-c2c4-4fcf-854b-133c2b314aed" />
<img width="279" height="142" alt="feedback_fav" src="https://github.com/user-attachments/assets/10a3eeba-8ae9-4d38-b088-fc23554e5e6a" />
<img width="405" height="198" alt="feedback_rating" src="https://github.com/user-attachments/assets/28e5e11d-0d4b-499b-a9fd-a7fa7a40114e" />
<img width="331" height="145" alt="feedback_report" src="https://github.com/user-attachments/assets/dce8509d-5768-4ec4-99a9-13856906651a" />

### Admin interface

- Dashboard with tabs
<img width="1554" height="916" alt="admin_dashboard" src="https://github.com/user-attachments/assets/aa59dcb1-4123-4867-9317-149c5ba9e62c" />
<img width="1501" height="446" alt="actor_crud" src="https://github.com/user-attachments/assets/0c035c01-5cf2-4126-90d6-aaeebd172291" />
<img width="1499" height="263" alt="tags_crud" src="https://github.com/user-attachments/assets/0ed6dc50-c202-4a65-bcb6-638118e32ba4" />

- Add movie form
<img width="666" height="757" alt="add_film_modal" src="https://github.com/user-attachments/assets/92af67d9-1379-4814-8d6c-3039329af286" />

- Movie infos modal
<img width="666" height="757" alt="add_film_modal" src="https://github.com/user-attachments/assets/06fcbeac-63b6-4866-abe2-b5f872861a60" />

### Data modeling
<img width="776" height="506" alt="image56" src="https://github.com/user-attachments/assets/7b66a623-af8e-4ba2-8579-95265a979969" />
<img width="489" height="446" alt="image66" src="https://github.com/user-attachments/assets/79205f0c-27a7-4802-a2d3-eaa85e87989b" />
