<?php
$source_api_b_ppid='https://sukabumikab.go.id/portal/apikami/berita.php?user=ppidkabsukabumi&APIkey=AzzykneyUkmdu873udnB3rk4hM4nD1R1&keywordsatu=bupa'; //API URL Berita Sukabumi PORTAL
$url_b_ppid=$source_api_b_ppid;
$ch_b_ppid=curl_init($url_b_ppid);
curl_setopt($ch_b_ppid, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch_b_ppid, CURLOPT_RETURNTRANSFER, true);
$result_b_ppid=curl_exec($ch_b_ppid);
curl_close($ch_b_ppid); //ucwords
$json_b_ppid=json_decode($result_b_ppid, true);
if ($json_b_ppid) {
    $nona=1;
    foreach($json_b_ppid["data-berita"] as $item_b_ppid) {
        if ($nona<=4){
            $judul_rev_b_ppid =strtolower($item_b_ppid['judul']);
        $inti_b_ppid      =substr($item_b_ppid['inti'], 0, 150);
        $date_b_ppid      =date_create($item_b_ppid['tanggal']);
        $tanggal_b_ppid   =date_format($date_b_ppid, 'd M Y');
        print '<li><a href="https://sukabumikab.go.id/portal/'.$item_b_ppid['jenis'].'/'.$item_b_ppid['id'].'/'.$item_b_ppid['seo'].'.html" style="color:green; margin: 0 0 0 0;padding:0 0 0 0;font-size:11px">&#8251; 
 '.$item_b_ppid['judul'].'</a><br><p style="padding:0 0 0 0; margin:0 0 0 0;line-height:11px;text-align:left;color:grey;font-size:9px">&#128197;
        '.$tanggal_b_ppid.' &nbsp | '.($item_b_ppid['jenis']).' </p></li>';
        }
        $nona++;
        
    }
    // echo var_dump($json_b_ppid).' hp';
}

else {
    echo "Data API Portal Pemkab.Sukabumi, gagal terhubung";
}