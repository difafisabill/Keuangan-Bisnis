<?php
include('../../koneksi.php');
require_once("../../dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from customer");
$html = '<center><h3>Daftar Customers</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
			<tr>
				<th>No</th>
				<th>Nama Toko</th>
				<th>Email</th>
				<th>Telp</th>
				<th>Alamat</th>
				<th>Tanggal</th>
			</tr>';
			$no = 1;
			while ($row = mysqli_fetch_array($query)) {
				$html .= "<tr>
				<td>" . $no . "</td>
				<td>" . $row['nama_toko'] . "</td>
				<td>" . $row['email'] . "</td>
				<td>" . $row['Telp'] . "</td>
				<td>" . $row['Alamat'] . "</td>
				<td>" . $row['tanggal'] . "</td>
				</tr>";
				$no++;
			}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-customers.pdf');
