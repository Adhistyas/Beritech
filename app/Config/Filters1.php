<?php
/**
 * CATATAN INSTALASI
 * ------------------
 * File ini HANYA berisi bagian yang perlu ditambahkan/diubah dari
 * app/Config/Filters.php bawaan CodeIgniter 4 (hasil composer create-project).
 *
 * Buka app/Config/Filters.php proyekmu, lalu:
 *
 * 1. Tambahkan use statement:
 *      use App\Filters\AdminAuthFilter;
 *
 * 2. Di dalam property `$aliases`, tambahkan baris:
 *      'adminauth' => AdminAuthFilter::class,
 *
 * Contoh potongan aliases setelah diedit:
 *
 * public array $aliases = [
 *     'csrf'      => CSRF::class,
 *     'toolbar'   => DebugToolbar::class,
 *     'honeypot'  => Honeypot::class,
 *     'invalidchars' => InvalidChars::class,
 *     'secureheaders' => SecureHeaders::class,
 *     'adminauth' => AdminAuthFilter::class,
 * ];
 *
 * Filter 'adminauth' inilah yang dipakai pada app/Config/Routes.php
 * untuk melindungi seluruh route di dalam group admin (kecuali login/logout).
 */
