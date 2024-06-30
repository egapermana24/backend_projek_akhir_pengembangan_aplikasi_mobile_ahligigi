<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dokter::insert(
            [
                [
                    'id_user' => '3',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '4',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '5',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '6',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '7',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '8',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '9',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '10',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '11',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_user' => '12',
                    'pengalaman' => rand(1, 5),
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam odio omnis esse nam libero, dolorum, pariatur sapiente error similique fugit perferendis qui. Veniam perspiciatis labore nesciunt sunt laboriosam voluptates reprehenderit beatae qui! Sunt ullam error harum aperiam autem maiores quasi velit temporibus, neque rem voluptatum modi saepe aut dolorem dolor!',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]
        );
    }
}
