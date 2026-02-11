<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Logistics Express',
                'ruc' => '20123456789',
                'slogan' => 'Entrega rápida y confiable',
                'description' => 'Empresa líder en logística y distribución a nivel nacional',
                'email' => 'contacto@logisticsexpress.com',
                'phone' => '+51 999 888 777',
                'address' => 'Av. Industrial 123, Lima',
                'website' => 'https://logisticsexpress.com',
                'whatsapp' => '+51999888777',
                'facebook' => 'facebook.com/logisticsexpress',
                'instagram' => '@logisticsexpress',
                'color_primary' => '#4030E8',
                'plan' => 'enterprise',
                'active' => true,
            ],
            [
                'name' => 'Fast Delivery Pro',
                'ruc' => '20987654321',
                'slogan' => 'Tu paquete, nuestra prioridad',
                'description' => 'Servicio de mensajería y courier express',
                'email' => 'info@fastdelivery.com',
                'phone' => '+51 988 777 666',
                'address' => 'Jr. Comercio 456, Lima',
                'website' => 'https://fastdelivery.com',
                'whatsapp' => '+51988777666',
                'color_primary' => '#059669',
                'plan' => 'pro',
                'active' => true,
            ],
            [
                'name' => 'Cargo Solutions',
                'ruc' => '20555444333',
                'slogan' => 'Soluciones integrales de transporte',
                'description' => 'Transporte de carga pesada y almacenamiento',
                'email' => 'ventas@cargosolutions.com',
                'phone' => '+51 977 666 555',
                'address' => 'Av. Logística 789, Callao',
                'color_primary' => '#2563EB',
                'plan' => 'free',
                'active' => true,
            ],
        ];

        foreach ($companies as $companyData) {
            Company::create($companyData);
        }
    }
}
