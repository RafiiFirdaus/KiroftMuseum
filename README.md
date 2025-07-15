# 🏛️ KIROFT MUSEUM - Museum Booking Tickets System

![Laravel](https://img.shields.io/badge/Laravel-12.0-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-purple.svg)
![SQLite](https://img.shields.io/badge/Database-SQLite-green.svg)

**Kiroft Museum** adalah sistem pemesanan tiket museum online yang memungkinkan pengguna untuk menjelajahi museum di Indonesia, memesan tiket, dan mengelola kunjungan mereka dengan mudah.

--------------------------------------------------------------------------------------

## 📋 **Deskripsi**

Kiroft Museum adalah website modern yang dibangun dengan Laravel versi 12 untuk memfasilitasi pemesanan tiket museum secara online. Aplikasi ini menyediakan pengalaman pengguna yang seamless untuk mengeksplorasi berbagai museum di Indonesia, melakukan booking, dan mengelola tiket mereka.

### 🎯 **Tujuan**
- Digitalisasi sistem pemesanan tiket museum
- Memberikan informasi lengkap tentang museum di Indonesia
- Mempermudah proses booking dan pembayaran
- Meningkatkan pengalaman wisata budaya

---------------------------------------------------------------------------------

## ✨ **Fitur Utama**

### 🔐 **Sistem Autentikasi**
- ✅ Registrasi pengguna baru
- ✅ Login dengan email dan password
- ✅ Logout dengan konfirmasi

### 🏛️ **Eksplorasi Museum**
- ✅ Browse museum berdasarkan provinsi (Jawa Timur, Jawa Barat, Jawa Tengah)
- ✅ Halaman detail museum dengan informasi lengkap
- ✅ Galeri foto dan deskripsi museum
- ✅ Informasi lokasi, jadwal, dan fasilitas
- ✅ Integrasi Google Maps

### 🎫 **Sistem Booking**
- ✅ Kalender interaktif untuk memilih tanggal kunjungan
- ✅ Pemilihan time slot (09:00-10:50, 13:00-14:50, dll)
- ✅ Tipe tiket: General (Rp 15.000), Student (Rp 10.000)
- ✅ Upload student ID untuk tiket pelajar
- ✅ Sistem promo code (STUDENT10, WELCOME20) *hidden*

### 💳 **Pembayaran**
- ✅ Integrasi QR Code Dana dan GoPay
- ✅ Pembayaran dengan timer 15 menit
- ✅ Konfirmasi pembayaran
- ✅ Receipt dan booking summary

### 📱 **Manajemen Tiket**
- ✅ Halaman "My Tickets" untuk melihat riwayat booking
- ✅ Status tiket (Pending, Confirmed, Used, Cancelled)
- ✅ Detail booking lengkap
- ✅ Dashboard pengguna

### 🎨 **User Interface**
- ✅ Responsive design untuk semua perangkat
- ✅ Modern UI dengan Bootstrap versi 5.3.3
- ✅ Smooth animations dan transitions
- ✅ Consistent navbar dengan authentication state

### ❓ **Dukungan Pengguna**
- ✅ FAQ page dengan pertanyaan umum
- ✅ Informasi kontak dan support
- ✅ User-friendly error messages

---------------------------------------------------------------------------------

## 🛠️ **Teknologi yang Digunakan**

### **Backend**
- **Framework:** Laravel 12.0
- **Language:** PHP 8.2+
- **Database:** SQLite
- **Authentication:** Laravel Sanctum
- **Validation:** Laravel Validation Rules

### **Frontend**
- **CSS Framework:** Bootstrap 5.3.3
- **JavaScript:** Vanilla JS + jQuery 3.7.1
- **Icons:** Font Awesome 6.4.0
- **Fonts:** Google Fonts (Rubik)
- **Build Tool:** Vite

### **Security**
- **CSRF Protection:** Enabled
- **Password Hashing:** BCrypt (12 rounds)
- **API Security:** Bearer Token Authentication
- **Input Sanitization:** Blade Template Engine

------------------------------------------------------------------------------------

## 📦 **Instalasi**

### **Persyaratan Sistem**
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- SQLite extension enabled

### **Langkah Instalasi**

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd KiroftMuseum
   ```

2. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install Node.js dependencies
   npm install
   ```

3. **Environment Setup**
   ```bash
   # Copy environment file
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   # Create SQLite database file
   touch database/database.sqlite
   
   # Run migrations
   php artisan migrate
   
   # (Optional) Seed database
   php artisan db:seed
   ```

5. **Build Assets**
   ```bash
   # Development build
   npm run dev
   
   # Production build
   npm run build
   ```

6. **Start Development Server**
   ```bash
   php artisan serve
   ```

7. **Akses Aplikasi**
   - Buka browser dan kunjungi: `http://localhost:8000`

----------------------------------------------------------------------------------

## 🚀 **Penggunaan Aplikasi**
akses link : kiroftmuseum.tugas1.id

### **1. Registrasi dan Login**
1. Kunjungi halaman utama
2. Klik tombol "Login" di navbar
3. Untuk pengguna baru, klik "Sign Up" dan isi form registrasi
4. Login dengan email dan password yang telah didaftarkan

### **2. Menjelajahi Museum**
1. Dari halaman utama, klik "Museums" di navbar
2. Pilih provinsi yang ingin dijelajahi
3. Browse museum yang tersedia di provinsi tersebut
4. Klik museum untuk melihat detail lengkap

### **3. Melakukan Booking**
1. Di halaman detail museum, klik tombol "Book Now"
2. Pilih tipe tiket (General atau Student)
3. Pilih tanggal kunjungan menggunakan kalender
4. Pilih time slot yang tersedia
5. Isi informasi pengunjung (nama, email, telepon)
6. Upload student ID jika memilih tiket student
7. Masukkan promo code jika ada
8. Review booking summary dan klik "Book Now & Pay"

### **4. Pembayaran**
1. Metode pembayaran akan muncul
2. Pilih metode pembayaran (Dana atau GoPay)
3. Scan QR Code yang ditampilkan
4. Lakukan pembayaran dalam waktu 15 menit
5. Klik "Confirm Payment" setelah transfer berhasil

### **5. Mengelola Tiket**
1. Klik "My Tickets" di navbar untuk melihat semua booking
2. Cek status tiket dan detail kunjungan
3. Download atau simpan informasi tiket untuk kunjungan

### **6. FAQ dan Support**
1. Kunjungi halaman "FAQ" untuk pertanyaan umum
2. Temukan informasi tentang kebijakan pembatalan, refund, dll

--------------------------------------------------------------------------------

## 🗺️ **Struktur Rute (Routes)**

### **Web Routes (`routes/web.php`)**

#### **Halaman Utama**
```php
Route::get('/', [HomeController::class, 'index'])->name('home');
```

#### **Autentikasi**
```php
Route::get('/auth', function () {
    return view('auth.login');
})->name('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.login');
})->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
```

#### **Museum & Booking**
```php
Route::get('/museums', [HomeController::class, 'museums'])->name('museums');
Route::get('/museums/{province}', [HomeController::class, 'museumsByProvince'])
    ->name('museums.province');
Route::get('/museum/{province}/{slug}', [HomeController::class, 'museumDetail'])
    ->name('museums.detail');
Route::get('/museum/{province}/{slug}/booking', [HomeController::class, 'museumBooking'])
    ->name('museums.booking');
Route::post('/booking/submit', [HomeController::class, 'bookingSubmit'])
    ->name('museums.booking.submit');
```

#### **User Dashboard & Support**
```php
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->name('user.dashboard');

Route::get('/my-tickets', function () {
    return view('my-tickets');
})->name('my.tickets');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');
```

#### **Testing Routes**
```php
Route::get('/test-api', function () {
    return view('test-api');
})->name('test.api');

Route::get('/quick-test', function () {
    return view('quick-test');
})->name('quick.test');

Route::get('/test-login', function () {
    return view('test-login');
})->name('test.login');
```

### **API Routes (`routes/api.php`)**

#### **Authentication**
```php
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
```

#### **Public API**
```php
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);
Route::get('/test-db', [TestController::class, 'testPurchases']);
```

#### **Protected Routes (Authentication Required)**
```php
Route::middleware('auth:sanctum')->group(function () {
    // User Management
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'updateProfile']);
    Route::delete('/user', [AuthController::class, 'deleteAccount']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Purchase & Booking Management
    Route::get('/purchases', [PurchaseController::class, 'getUserPurchases']);
    Route::post('/purchases', [PurchaseController::class, 'purchaseTicket']);
    Route::post('/bookings', [PurchaseController::class, 'createBooking']);
    Route::get('/purchases/{id}', [PurchaseController::class, 'getPurchaseDetail']);
    Route::put('/purchases/{id}/cancel', [PurchaseController::class, 'cancelPurchase']);

    // Testing
    Route::get('/test-auth', [TestController::class, 'testAuth']);
});
```

--------------------------------------------------------------------------------------

## 📁 **Struktur Database**

### **Tabel Utama**

#### **users**
- id, name, email, password, email_verified_at, timestamps

#### **purchases**
- id, user_id, museum_name, ticket_type, quantity, total_price
- visit_date, time_slot, visitor_name, visitor_phone, visitor_email
- payment_method, payment_status, booking_status, timestamps

#### **tickets**
- id, name, description, price, type, timestamps

#### **personal_access_tokens**
- id, tokenable_type, tokenable_id, name, token, abilities, timestamps

#### **cache & jobs**
- Tabel sistem untuk caching dan background jobs

-----------------------------------------------------------------------------------

## 🚀 **Deployment**

### **Untuk Production**

1. **Environment Setup**
   ```bash
   cp .env.production .env
   # Update APP_URL, APP_ENV=production, APP_DEBUG=false
   ```

2. **Optimize for Production**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   npm run build
   ```

3. **Set Permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

4. **Upload ke Hosting**
   - Upload semua file ke hosting
   - Set document root ke folder `/public`
   - Pastikan PHP 8.2+ dan SQLite enabled

### **Hosting Requirements**
- PHP 8.2+
- SQLite support
- Composer access
- File permissions 755/644

------------------------------------------------------------------------------------

## 🎉 **Thanks to....**

- Laravel Framework untuk foundation yang solid
- Bootstrap untuk responsive UI components
- Font Awesome untuk beautiful icons
- Google Fonts untuk typography
- Semua contributor yang telah membantu pengembangan project ini

------------------------------------------------------------------------------------

**Made with ❤️ for Indonesian Cultural Heritage**
