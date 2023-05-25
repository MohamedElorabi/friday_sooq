<?php
use App\Models\Country;
function concatenatePhoneNumberWithCountryKey($countryId,$phone)
{
    return str_replace("", "", Country::find($countryId)->key) . $phone;
}