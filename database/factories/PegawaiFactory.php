<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pegawai::class;
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'nomor_hp' => $this->faker->phoneNumber,
            'tanggal_lahir' => $this->faker->date,
            'alamat' => $this->faker->address,
            'jabatan' => 'Pegawai',
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // Default password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}