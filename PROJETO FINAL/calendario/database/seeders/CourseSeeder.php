<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            'name' => 'Redes e Sistemas Informáticos',
            'course_code' => 2100,
            'course_year' => 1,
            'type' => 'cstep',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Redes e Sistemas Informáticos',
            'course_code' => 2100,
            'course_year' => 2,
            'type' => 'cstep',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão de PME',
            'course_code' => 2110,
            'course_year' => 1,
            'type' => 'cstep',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão de PME',
            'course_code' => 2110,
            'course_year' => 2,
            'type' => 'cstep',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Instalações Elétricas e Automação',
            'course_code' => 2111,
            'course_year' => 1,
            'type' => 'cstep',
            'regime' => 'pós-laboral'
        ]);

        DB::table('course')->insert([
            'name' => 'Instalações Elétricas e Automação',
            'course_code' => 2111,
            'course_year' => 2,
            'type' => 'cstep',
            'regime' => 'pós-laboral'
        ]);

        DB::table('course')->insert([
            'name' => 'Manutenção Industrial',
            'course_code' => 2109,
            'course_year' => 1,
            'type' => 'cstep',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Manutenção Industrial',
            'course_code' => 2109,
            'course_year' => 2,
            'type' => 'cstep',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Programação de Sistemas Informação',
            'course_code' => 2106,
            'course_year' => 2,
            'type' => 'cstep',
            'regime' => 'pós-laboral'
        ]);

        DB::table('course')->insert([
            'name' => 'Programação de Sistemas Informação',
            'course_code' => 2106,
            'course_year' => 1,
            'type' => 'cstep',
            'regime' => 'pós-laboral'
        ]);

        DB::table('course')->insert([
            'name' => 'Tecnologia Mecânica',
            'course_code' => 2114,
            'course_year' => 1,
            'type' => 'cstep',
            'regime' => 'pós-laboral'
        ]);

        DB::table('course')->insert([
            'name' => 'Tecnologia Mecânica',
            'course_code' => 2114,
            'course_year' => 2,
            'type' => 'cstep',
            'regime' => 'pós-laboral'
        ]);

        DB::table('course')->insert([
            'name' => 'Tecnologias da Informação',
            'course_code' => 8905,
            'course_year' => 1,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Tecnologias da Informação',
            'course_code' => 8905,
            'course_year' => 2,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Tecnologias da Informação',
            'course_code' => 8905,
            'course_year' => 3,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão comercial',
            'course_code' => 8908,
            'course_year' => 1,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão comercial',
            'course_code' => 8908,
            'course_year' => 2,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão comercial',
            'course_code' => 8908,
            'course_year' => 3,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Engenharia Eletrotécnica',
            'course_code' => 8909,
            'course_year' => 3,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Engenharia Eletrotécnica',
            'course_code' => 8909,
            'course_year' => 2,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);
        DB::table('course')->insert([
            'name' => 'Engenharia Eletrotécnica',
            'course_code' => 8909,
            'course_year' => 1,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão da Qualidade',
            'course_code' => 8910,
            'course_year' => 1,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão da Qualidade',
            'course_code' => 8910,
            'course_year' => 2,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão da Qualidade',
            'course_code' => 8910,
            'course_year' => 3,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Secretariado e Comunicação Empresarial',
            'course_code' => 8911,
            'course_year' => 3,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Secretariado e Comunicação Empresarial',
            'course_code' => 8911,
            'course_year' => 2,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Secretariado e Comunicação Empresarial',
            'course_code' => 8911,
            'course_year' => 1,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Eletrónica e Mecânica Industrial',
            'course_code' => 8912,
            'course_year' => 1,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Eletrónica e Mecânica Industrial',
            'course_code' => 8912,
            'course_year' => 2,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Eletrónica e Mecânica Industrial',
            'course_code' => 8912,
            'course_year' => 3,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão pública',
            'course_code' => 8913,
            'course_year' => 3,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão pública',
            'course_code' => 8913,
            'course_year' => 2,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão pública',
            'course_code' => 8913,
            'course_year' => 1,
            'type' => 'licenciatura',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão Comercial',
            'course_code' => 9268,
            'course_year' => 1,
            'type' => 'mestrado',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão Comercial',
            'course_code' => 9268,
            'course_year' => 2,
            'type' => 'mestrado',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão Qualidade Total',
            'course_code' => 9282,
            'course_year' => 1,
            'type' => 'mestrado',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Gestão Qualidade Total',
            'course_code' => 9282,
            'course_year' => 2,
            'type' => 'mestrado',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Informática Aplicada',
            'course_code' => 9286,
            'course_year' => 1,
            'type' => 'mestrado',
            'regime' => 'diurno'
        ]);

        DB::table('course')->insert([
            'name' => 'Informática Aplicada',
            'course_code' => 9286,
            'course_year' => 2,
            'type' => 'mestrado',
            'regime' => 'diurno'
        ]);
    }
}
