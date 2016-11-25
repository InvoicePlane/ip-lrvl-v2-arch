<?php

/*
|--------------------------------------------------------------------------
| Client Models Factories
|--------------------------------------------------------------------------
*/

// Address Factory
$factory->define(\App\Models\Clients\Address::class, function (Faker\Generator $faker) {
    $faker->addProvider(new \Faker\Provider\en_US\Address($faker));

    $address = $faker->streetAddress . "\n";
    $address .= $faker->city . ' ' . $faker->state . ' ' . $faker->postcode . "\n";
    $address .= $faker->country;

    return [
        'client_id' => null,
        'address_block' => $address,
        'country_code' => $faker->countryCode,
        'is_disabled' => $faker->boolean(10),
    ];
});

// Client Factory
$factory->define(\App\Models\Clients\Client::class, function (Faker\Generator $faker) {
    $company = $faker->company;

    return [
        'name' => $company . ' ' . $faker->companySuffix,
        'short_name' => $company,
        'main_contact_id' => null,
        'main_address_id' => null,
        'language_id' => \App\Models\Settings\Language::inRandomOrder()->first()->id,
        'company_id' => \App\Models\Settings\Company::inRandomOrder()->first()->id,
        'telephone' => $faker->phoneNumber,
        'fax' => ($faker->boolean(25) ? $faker->phoneNumber : null),
        'email' => $faker->companyEmail,
        'web' => $faker->url,
        'is_company' => $faker->boolean(50),
        'is_vendor' => $faker->boolean(25),
        'is_disabled' => $faker->boolean(10),
    ];
});

// Contact Factory
$factory->define(\App\Models\Clients\Contact::class, function (Faker\Generator $faker) {
    return [
        'title' => ($faker->boolean(33) ? $faker->title : null),
        'forename' => $faker->firstName,
        'surname' => $faker->lastName,
        'client_id' => null,
        'address_id' => null,
        'telephone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'fax' => ($faker->boolean(25) ? $faker->phoneNumber : null),
        'email' => $faker->companyEmail,
        'is_disabled' => $faker->boolean(10),
    ];
});
