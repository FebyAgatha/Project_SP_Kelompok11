<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        DB::table(table: 'products')->insert(values: [
            [
                'id' => 1,
                'category_id' => 1,
                'name' => 'Pedoman Sukses Budi Daya Ikan Lele',
                'price' => 50000,
                'amount' => 2,
                'image' => 'product1.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'name' => 'Beternak Maggot BSF: Tanpa Becek, Tanpa Bau, Dan Lahan Terbatas',
                'price' => 70000,
                'amount' => 2,
                'image' => 'product2.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 3,
                'category_id' => 2,
                'name' => 'Menjaga Jokowi, Menjaga Nusantara',
                'price' => 160000,
                'amount' => 2,
                'image' => 'product3.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 4,
                'category_id' => 2,
                'name' => 'Robert Rene Alberts',
                'price' => 125000,
                'amount' => 2,
                'image' => 'product4.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 5,
                'category_id' => 3,
                'name' => 'Cara Mudah Memahami Makroekonomi: Data Faktual Bicara - Edisi 1',
                'price' => 60000,
                'amount' => 2,
                'image' => 'product5.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 6,
                'category_id' => 3,
                'name' => 'Akuntansi Perpajakan : Teori dan Implementasinya',
                'price' => 29500,
                'amount' => 2,
                'image' => 'product6.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 7,
                'category_id' => 4,
                'name' => 'Fashion Tekstil, Pengetahuan Tentang Tekstil Dan Produk Teks',
                'price' => 165000,
                'amount' => 2,
                'image' => 'product7.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 8,
                'category_id' => 4,
                'name' => 'Textilepedia & Fashionpedia : Visual Glosarium Untuk Studi Tekstil & Fashion Design',
                'price' => 91800,
                'amount' => 2,
                'image' => 'product8.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 9,
                'category_id' => 5,
                'name' => 'Beruang Pemalu Mau Pup!',
                'price' => 74000,
                'amount' => 2,
                'image' => 'product9.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 10,
                'category_id' => 5,
                'name' => 'Goodnight, Sleep Tight',
                'price' => 44000,
                'amount' => 2,
                'image' => 'product10.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 11,
                'category_id' => 6,
                'name' => 'Yang Telah Lama Pergi',
                'price' => 105000,
                'amount' => 2,
                'image' => 'product11.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 12,
                'category_id' => 6,
                'name' => 'As Long as the Lemon Trees Grow',
                'price' => 139000,
                'amount' => 2,
                'image' => 'product12.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 13,
                'category_id' => 7,
                'name' => 'Rumah Kaca di Ujung Bumi',
                'price' => 66000,
                'amount' => 2,
                'image' => 'product13.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 14,
                'category_id' => 7,
                'name' => 'The Hidden Reality',
                'price' => 84100,
                'amount' => 2,
                'image' => 'product14.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 15,
                'category_id' => 8,
                'name' => 'The Secret Hospital',
                'price' => 83100,
                'amount' => 2,
                'image' => 'product15.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 16,
                'category_id' => 8,
                'name' => 'Tetangga Kanibal',
                'price' => 57500,
                'amount' => 2,
                'image' => 'product16.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 17,
                'category_id' => 9,
                'name' => 'Hukum Pidana Indonesia',
                'price' => 67500,
                'amount' => 2,
                'image' => 'product17.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 18,
                'category_id' => 9,
                'name' => 'Kepastian Hukum Masa Tunggu Eksekusi Pidana Mati : Ed.Revisi',
                'price' => 105000,
                'amount' => 2,
                'image' => 'product18.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 19,
                'category_id' => 10,
                'name' => 'Diary: Dagelan 2015',
                'price' => 79000,
                'amount' => 2,
                'image' => 'product19.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 20,
                'category_id' => 10,
                'name' => 'Solutions And Other Problems',
                'price' => 335000,
                'amount' => 2,
                'image' => 'product20.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 21,
                'category_id' => 11,
                'name' => 'Pemilu Dalam Kondisi Vuca',
                'price' => 200000,
                'amount' => 2,
                'image' => 'product21.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 22,
                'category_id' => 11,
                'name' => 'Pengantar Ilmu Politik',
                'price' => 90000,
                'amount' => 2,
                'image' => 'product22.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 23,
                'category_id' => 12,
                'name' => 'Touch Your Kids Heart',
                'price' => 93000,
                'amount' => 2,
                'image' => 'product23.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 24,
                'category_id' => 12,
                'name' => 'Parenting 101: An Essential Guide Mengasuh dan Mendampingi Anak Hebat',
                'price' => 71000,
                'amount' => 2,
                'image' => 'product24.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 25,
                'category_id' => 13,
                'name' => 'Gizi Makro Dan Implikasinya Terhadap Kesehatan',
                'price' => 160000,
                'amount' => 2,
                'image' => 'product25.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 26,
                'category_id' => 13,
                'name' => 'Puasa yang Benar dan Sehat',
                'price' => 74200,
                'amount' => 2,
                'image' => 'product26.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 27,
                'category_id' => 14,
                'name' => 'Level Comic: Bungo Stray Dogs 10',
                'price' => 50000,
                'amount' => 2,
                'image' => 'product27.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 28,
                'category_id' => 14,
                'name' => 'Girls Last Tour 01',
                'price' => 55000,
                'amount' => 2,
                'image' => 'product28.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 29,
                'category_id' => 15,
                'name' => 'Melody Pop Hits : Piano & Gitar',
                'price' => 69000,
                'amount' => 2,
                'image' => 'product29.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 30,
                'category_id' => 15,
                'name' => 'Basketik: Basket & Statistik',
                'price' => 84000,
                'amount' => 2,
                'image' => 'product30.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 31,
                'category_id' => 16,
                'name' => 'Buku Paten OSN Kimia SMA Sederajat',
                'price' => 95000,
                'amount' => 2,
                'image' => 'product31.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 32,
                'category_id' => 16,
                'name' => 'Matematika Tingkat Lanjut untuk Siswa SMA-MA Kelas 12',
                'price' => 227000,
                'amount' => 2,
                'image' => 'product32.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 33,
                'category_id' => 17,
                'name' => 'Majalah Kumpulan Resep Kue Kering Legendaris',
                'price' => 85000,
                'amount' => 2,
                'image' => 'product33.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 34,
                'category_id' => 17,
                'name' => 'Tasty: Koleksi Resep Sj Paling Banyak Di-Recook',
                'price' => 71200,
                'amount' => 2,
                'image' => 'product24.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 35,
                'category_id' => 18,
                'name' => 'Sastra, Sebuah Jalan Panjang',
                'price' => 58600,
                'amount' => 2,
                'image' => 'product35.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 36,
                'category_id' => 18,
                'name' => 'Seni Penerjemahan Sastra',
                'price' => 65000,
                'amount' => 2,
                'image' => 'product36.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 37,
                'category_id' => 19,
                'name' => 'Sejarah Jawa Jilid II (History of Java)',
                'price' => 137000,
                'amount' => 2,
                'image' => 'product37.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 38,
                'category_id' => 19,
                'name' => 'Sejarah Peradaban Prancis',
                'price' => 89000,
                'amount' => 2,
                'image' => 'product38.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 39,
                'category_id' => 20,
                'name' => 'Langkah Mudah Belajar Machine Learning dengan Python untuk Pemula',
                'price' => 44500,
                'amount' => 2,
                'image' => 'product39.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id' => 40,
                'category_id' => 20,
                'name' => 'Panduan UI/UX Aplikasi Digital',
                'price' => 84000,
                'amount' => 2,
                'image' => 'product40.png',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
