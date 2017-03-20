<?php



function _cariIP($ip)

{

    

    $ch = curl_init();

    

    curl_setopt($ch, CURLOPT_URL, 'http://www.ip-tracker.org/locator/ip-lookup.php?ip=' . $ip . '');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    $resp = curl_exec($ch);

    curl_close($ch);

    preg_match_all("/class='vazno'>(.*?)<\/td>/", $resp, $hsil);

    preg_match_all("/class='tracking lessimpt'>(.*?)<\/td>/", $resp, $CariProv);

    preg_match_all("/<th>Country:<\/th><td>(.*?)<img/", $resp, $negara);

    preg_match_all("/<th>ISP:<\/th><td>(.*?)<\/td>/", $resp, $isp);

    $dataIP = array();

    if (!empty($CariProv[1][0])) {

        $dataIP['provinsi'] = $CariProv[1][0];

    } else {

        $dataIP['provinsi'] = "-";

    }

    if (!empty($hsil[1][0])) {

        $dataIP['kota'] = $hsil[1][0];

    } else {

        $dataIP['kota'] = "-";

    }

    if (!empty($negara[1][0])) {

        $dataIP['negara'] = $negara[1][0];

    } else {

        $dataIP['negara'] = "-";

    }

    if (!empty($isp[1][0])) {

        $dataIP['isp'] = $isp[1][0];

    } else {

        $dataIP['isp'] = "-";

    }

    return $dataIP;

}

// Dibawah ini Contoh Pemakainnya dan output menjadi array
if (isset($_GET) && $_GET['ip'] != null){
	echo print_r(_cariIP($_GET['ip']));
} else {
	echo "?ip=255.255.255.255";
}

?>
