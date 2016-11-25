<?php

use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divider = '---------------------------------------------';

        $this->command->comment('Starting to fill the database with fake data');
        $this->command->comment($divider);

        // Amounts
        $num_languages = rand(5, 10);
        $num_companies = rand(1, 3);
        $num_currencies = rand(1, 4);
        $num_clients = rand(10, 20);

        /*
         * Generate settings and other base data
         */
        $this->command->info('Generating settings...');

        // Languages
        $languages = factory(\App\Models\Settings\Language::class, $num_languages)->create();

        // Companies
        $companies = factory(\App\Models\Settings\Company::class, $num_companies)->create()
            ->each(function (\App\Models\Settings\Company $company) {
                // Create an address for each company
                $company->address()->associate(
                    factory(\App\Models\Clients\Address::class)->create()
                );
            });

        // Currencies
        $currencies = factory(\App\Models\Settings\Currency::class, $num_currencies)->create();

        $this->command->info('Settings successfully seeded.');
        $this->command->info($divider);

        /*
         * Generate clients
         */
        $this->command->info('Generating clients...');

        $clients = factory(\App\Models\Clients\Client::class, $num_clients)->create()
            ->each(function (\App\Models\Clients\Client $client) {
                $num_addresses = rand(1, 3);
                $num_contacts = rand(1, 5);

                // Create some addresses for the client
                factory(\App\Models\Clients\Address::class, $num_addresses)->create([
                    'client_id' => $client->id,
                ]);

                $client_addresses = $client->addresses;

                // Create some contacts for the client
                factory(\App\Models\Clients\Contact::class, $num_contacts)->create([
                    'client_id' => $client->id,
                    'address_id' => $client_addresses->random()->id,
                ]);

                $client_contacts = $client->contacts;

                // Assign a random address and contact as the main entities for the client
                $client->main_address_id = $client_addresses->random()->id;
                $client->main_contact_id = $client_contacts->random()->id;
                $client->save();
            });

        $this->command->info('Generated ' . $num_clients . ' clients');
        $this->command->info($divider);
    }
}
