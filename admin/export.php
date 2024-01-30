<?php 


  $con = mysqli_connect('localhost','root','','data');
   
  $result = mysqli_query($con, "SELECT * FROM kendaraan");
  

  $content = '<table>
  <th>Nama Pemilik</th>
  <th>Jenis Kendaraan</th>
  <th>Jenis Mobil/Motor</th>
  <th>No Plat</th>
  <th>Tahun Pembuatan</th>
  <th>Nomor Rangka/Mesin</th>
  <th>Masa Pajak</th>
  <th></th>'; 

 
  while($row = mysqli_fetch_array($result))  
  {  
  	  $content .='<tr>';
	    $content .='<td>'.$row['nama'].'</td>';
	    $content .='<td>'.$row['jeniskendaraan'].'</td>';
	    $content .='<td>'.$row['jenismobilmotor'].'</td>';
        $content .='<td>'.$row['nopolisi'].'</td>';
	    $content .='<td>'.date('d-M-Y',strtotime($row['pembuatan'])).'</td>';
        $content .='<td>'.$row['rangka'].'</td>';
        $content .='<td>'.date('d-M-Y',strtotime($row['masapajak'])).'</td>';
	    $content .='<tr>';   
  } 
  $content.='</table>'; 

 
  header('Content-Type:application/xls');  
  header('Content-Disposition: attachment; filename=Data.xls');
  echo $content;
  exit();

?>