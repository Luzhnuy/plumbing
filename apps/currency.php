<?php
    $date = R::getCell("SELECT date FROM currency");
    if ($date == "") {
        $usd = json_decode(file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&json"));
        $eur = json_decode(file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=EUR&json"));
        $usd_rate = round($usd[0]->rate, 2);
        $eur_rate = round($eur[0]->rate, 2);
        $newdate = date("d.m");
        $currency = R::dispense("currency");
        $currency->date = $newdate;
        $currency->usd = $usd_rate;
        $currency->eur = $eur_rate;
        R::store($currency);
    } else {
        $newdate = date("d.m");
        if ($date != $newdate) {
            $usd = json_decode(file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&json"));
            $eur = json_decode(file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=EUR&json"));
            if ($usd[0] != NULL and $eur[0] != NULL) {
                $usd_rate = round($usd[0]->rate, 2);
                $eur_rate = round($eur[0]->rate, 2);
                $currencyid = R::getCell("SELECT id FROM currency");
                $currency = R::load("currency", $currencyid);
                $currency->date = $newdate;
                $currency->usd = $usd_rate;
                $currency->eur = $eur_rate;
                R::store($currency);
            }
        }
    }