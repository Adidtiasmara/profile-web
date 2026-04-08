# 💻 My Digital Portofolio— Muhammad Firman Aditiasmara 

Website ini adalah **Portofolio** pribadi saya yang berfungsi sebagai pusat dokumentasi seluruh proyek, mulai dari tugas Kuliah, hingga eksperimen lainnya.

<p align="center">
  <img src="https://skillicons.dev/icons?i=laravel,php,psql,mysql,tailwind,filament,arch,linux" />
</p>

---

## 📊 GitHub Ecosystem & Stats
Seorang developer diukur dari konsistensinya. Berikut adalah statistik aktivitas koding saya secara *real-time*:

<p align="center">
  <img src="https://github-readme-stats-sigma-five.vercel.app/api?username=Adidtiasmara&show_icons=true&theme=tokyonight&hide_border=true&count_private=true" alt="GitHub Stats" />
  <br>
  <img src="https://github-readme-stats-sigma-five.vercel.app/api/top-langs/?username=Adidtiasmara&layout=compact&theme=tokyonight&hide_border=true" alt="Top Languages" />
</p>
---

## 📂 Project Structure
Proyek ini dibangun dengan struktur **Laravel 11/13** yang modular. Konfigurasi tampilan dashboard (Filament) dipisahkan ke dalam folder `Tables` dan `Schemas` agar kodingan tetap *clean*.

```text
.
├── app/
│   ├── Filament/             # Dashboard Admin Engine
│   │   └── Resources/
│   │       ├── Profiles/
│   │       │   └── Tables/   # Konfigurasi Table (ProfilesTable.php)
│   │       └── Projects/     # Manajemen Portofolio
│   ├── Models/               # Business Logic & Database Relations
│   └── Http/Controllers/     # Main Logic untuk Front-end
├── database/
│   └── migrations/           # Skema Tabel (profiles, projects, skills)
├── public/
│   └── storage/              # Folder Assets (Project Thumbnails & Photos)
├── resources/
│   └── views/
│       └── home.blade.php    # Core UI (The 144Hz Optimized Web)
└── routes/                   # Web & Admin Routing