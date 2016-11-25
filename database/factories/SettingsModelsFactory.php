<?php

/*
|--------------------------------------------------------------------------
| Settings Models Factories
|--------------------------------------------------------------------------
*/

// Company Factory
$factory->define(\App\Models\Settings\Company::class, function (Faker\Generator $faker) {
    $company = $faker->company;

    return [
        'name' => $company . ' ' . $faker->companySuffix,
        'short_name' => $company,
        'address_id' => null,
        'telephone' => $faker->phoneNumber,
        'fax' => ($faker->boolean(25) ? $faker->phoneNumber : null),
        'email' => $faker->companyEmail,
        'web' => $faker->url,
        'is_disabled' => $faker->boolean(10),
    ];
});

// Currency Factory
$factory->define(\App\Models\Settings\Currency::class, function (Faker\Generator $faker) {
    $currency_symbols = collect(['$', '€', '¥', '£']);
    $thousand_separator = $faker->randomElement([',', '.', ' ']);
    $decimal_separator = ($thousand_separator == ',' ? '.' : ',');

    return [
        'name' => $faker->currencyCode,
        'currency_symbol' => $currency_symbols,
        'symbol_placement' => $faker->boolean(50),
        'thousand_separator' => $thousand_separator,
        'decimal_separator' => $decimal_separator,
        'decimal_places' => rand(2, 5),
        'is_disabled' => $faker->boolean(10),
    ];
});

// Language Factory
$factory->define(\App\Models\Settings\Language::class, function (Faker\Generator $faker) {

    $locale = $faker->locale;
    $codes = explode('_', $locale);

    return [
        'title' => $locale,
        'lang_code' => $codes[0],
        'country_code' => $codes[1],
        'is_disabled' => $faker->boolean(10),
        'last_update' => \Carbon\Carbon::now()->subDays(rand(5, 20)),
    ];
});
