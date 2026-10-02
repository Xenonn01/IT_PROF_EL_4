# Portfolio — Grace G. Getungo

Modern, responsive nga portfolio website nga gihimo gamit ang **CodeIgniter 4.7.4**.
Data-driven kini: halos tanan nimong personal nga impormasyon naa sa usa ka lugar
aron dali ra ilisan — walay kinahanglan hilabtan ang HTML matag-usab.

> **Status sa content:** Kompleto na ang tanan — ngalan, tagline, about, skills,
> experience, **9 ka projects uban live links ug tinuod nga screenshots**,
> phone, location, LinkedIn, St. Peter's College, ug profile picture.
> Naka-**production mode** na kini para limpyo ang presentation (walay debug toolbar).

---

## 1. Pagpadagan (Run)

Ang usa ka portable **PHP 8.3.35** ug **Composer** naka-install na sa `C:\Users\dell\tools`.

**Paagi A — double-click:**

```
start-portfolio.bat
```

**Paagi B — command line:**

```bash
C:\Users\dell\tools\php83\php.exe spark serve --host 127.0.0.1 --port 8088
```

Unya ablihi: **http://localhost:8088**

> **Mubo nga pahinumdom:** Ang XAMPP nimo (PHP 8.0) daan ra kaayo para niining
> bersyon sa CodeIgniter (nagkinahanglan og PHP 8.2+). `start-portfolio.bat`
> naggamit sa portable PHP 8.3, dili ang XAMPP.

---

## 2. Unsaon pag-ilis sa content

Usba lang ang array sa: **`app/Controllers/Home.php`**

| Section       | Unsaon |
|---------------|--------|
| Ngalan, role  | `$profile['name']`, `$profile['role']`, `$profile['tagline']` |
| Kontak        | `$profile['email']`, `$profile['phone']`, `$profile['location']` |
| Social links  | `$profile['socials']` |
| Stats         | `$stats` |
| About text    | `$about['body']` ug `$about['facts']` |
| Skills        | `$skills['groups']` |
| Mga proyekto  | `$projects['items']` |
| Kasinatian    | `$experience['items']` |
| Contact text  | `$contact` |

Pag-usab sa theme color: **`public/assets/css/style.css`** → pangitaa `:root` ug
ilisi ang `--accent` / `--accent-2`.

### Pag-ilis sa litrato ug screenshots

Ibutang ang imong files sa `public/assets/img/` ug i-update ang paths:

- `profile.svg` → imong aktwal nga litrato (pwede `.jpg`/`.png`)
- `project-1.svg`, `project-2.svg`, `project-3.svg` → project screenshots

Pananglitan sa controller:

```php
'photo' => 'assets/img/ako.jpg',
```

---

## 3. Contact form

Naa nay server-side validation. Ang endpoint kay `POST /contact`
(`app/Controllers/Home.php` → `contact()`).

Sa pagkakaron, gi-**log** lang ang mensahe sa `writable/logs/`.
Aron i-email kini, i-configure ang `app/Config/Email.php` ug ilisi ang
`log_message(...)` sa usa ka `Email` service nga send.

---

## 4. Istruktura sa proyekto

```
app/
  Controllers/Home.php          ← tanan content dinhi (data)
  Views/portfolio/
    layout.php                  ← header, nav, footer
    index.php                   ← hero, about, skills, projects, experience, contact
  Config/Routes.php             ← GET / ug POST /contact
public/
  assets/css/style.css          ← tanan style (theme tokens, responsive)
  assets/js/main.js             ← theme, nav, reveal, form AJAX
  assets/img/*.svg              ← placeholder images
```

---

## 5. Mga feature

- Responsive (mobile → desktop), mobile hamburger menu
- **Dark / light theme toggle** (na-save sa browser)
- Glassy fixed header + scroll progress bar
- Reveal-on-scroll animations, active nav highlighting
- Featured project layout, timeline, skill chips
- Contact form nga dunay client + server validation
- Accessible: skip link, ARIA labels, `prefers-reduced-motion`

---

## 6. Mga kapaki-pakinabang nga command

```bash
PHP="C:\Users\dell\tools\php83\php.exe"

# Tan-awa ang routes
"$PHP" spark routes

# Clear cache
"$PHP" spark cache:clear

# I-check ang environment
"$PHP" spark env
```
