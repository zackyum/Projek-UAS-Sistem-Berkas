<?php 
// menghubungkan dengan dompdf
require_once("../asset/dompdf/dompdf_config.inc.php");

// koneksi database
include '../config/koneksi.php';

$html = '<!DOCTYPE html>';
$html .= '<html>';
$html .= '<head>';
$html .='       <title>Laporan</title>';
$html .= '</head>';
$html .= '<body>';
$html .= '<center><h2>Laporan</h2></center>';



$html .= '<table border="0.1" align="center" cellpadding="5" cellspacing="0" width="100%">';
$html .= '<tr>';
$html .= '<th width="1%">No</th>';
$html .= '<th>Tanggal</th>';
$html .= '<th>Nama Toko</th>';
$html .= '<th>Nama Paket</th>';
$html .= '<th>Kode Invoice</th>';
$html .= '<th>Nama Pelanggan Tetap</th>';
$html .= '<th>Tanggal Bayar</th>';
$html .= '<th>Batas Waktu</th>';
$html .= '<th>Harga</th>';
$html .= '<th>Berat Cucian (Kg)</th>';
$html .= '<th>Biaya Tambahan</th>';
$html .= '<th>Diskon</th>';
$html .= '<th>Pajak</th>';
$html .= '<th>Total Bayar</th>';
$html .= '<th>Status</th>';
$html .= '<th>Status Bayar</th>                               ';
$html .= '</tr>';

                                
$transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id_outlet INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket inner join tb_member on tb_transaksi.id_member=tb_member.id_member inner join tb_user on tb_transaksi.id_user=tb_user.id_user");
 $i=1;
                                
while ($data = mysqli_fetch_array($transaksi)) {

        $html .= '<tr align="center">';
        $html .= '<td>'.$i++.'</td>';
        $html .= '<td>'.$data['tgl'].'</td>';
        $html .= '<td>'.$data['nama_outlet'].'</td>';
        $html .= '<td>'.$data['nama_paket'].'</td>';
        $html .= '<td>'.$data['kode_invoice'].'</td>';
        $html .= '<td>'.$data['nama_member'].'</td>';
        $html .= '<td>'.$data['tgl_bayar'].'</td>';
        $html .= '<td>'.$data['batas_waktu'].'</td>';
        $html .= '<td>Rp.'.$data['harga'].'</td>';
        $html .= '<td>'.$data['qty'].' Kg</td>';
        $html .= '<td>Rp. '.$data['biaya_tambahan'].'</td>';
        $html .= '<td>Rp. '.number_format($data['diskon']).'</td>';
        $html .= '<td>Rp. '.number_format($data['pajak']).'</td>';
        $a = $data['qty'];
                        $b = $data['harga'];
                        $c = $data['biaya_tambahan'];
                        $d = $data['diskon'];
                        $total = $a * $b + $c - $d;

        $html .= '<td>Rp. '.number_format("$total").'</td>';

        $html .= '<td>'.$data['status'].'</td>';
        $html .= '<td>'.$data['dibayar'].'</td>';
        // $html .= '<td>';

        // // if($d['transaksi_status']=="0"){
        // //         $html .= "PROSES";
        // // }else if($d['transaksi_status']=="1"){
        // //         $html .= "DICUCI";
        // // }else if($d['transaksi_status']=="2"){
        // //         $html .= "SELESAI";
        // // }

        // $html .= '</td>';
        $html .= '</tr>';

}

$html .= '</table>';
$html .= '</body>';
$html .= '</html>';



$dompdf = new DOMPDF();         
$dompdf->set_paper('a4','landscape');
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('laporan.pdf', array("Attachment"=>0));
?>
