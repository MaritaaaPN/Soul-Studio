<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tb_artist");
$html = '<center><h3>Data Artist</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Kebangsaan</th>
                <th>Gaya Seni</th>
                <th>Biografi</th>
            </tr>';
$no = 1;
while ($artist = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $artist['nama'] . "</td>
                <td>" . $artist['lahir'] . "</td>
                <td>" . $artist['bangsa'] . "</td>
                <td>" . $artist['gaya'] . "</td>
                <td>" . $artist['bio'] . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-data-artist.pdf');
?>
