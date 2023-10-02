 
<body style="background-color: #FFFFFF;">  
</div>
    <table class="tablettdhd" width='100%' style='margin-right:70px;'> 
        <tr> 
            <th width='10%' rowspan='7'>
            <img src="<?php echo base_url() ?>/assets/assets/img/90x90.jpg" style='width: 100px;'>

        </th>
            <th class='tthd'width='90%'>PEMERINTAH DAERAH PROVINSI JAWA BARAT</th> 
        </tr> 
        <tr> 
            <th class='tthdS'>DINAS PENDIDIKAN</th> 
        </tr> 
        <tr> 
            <th class='tthdS'>CABANG DINAS PENDIDIKAN WILAYAH III</th> 
        </tr> 
        <tr> 
            <th class='tthdS'><b>SMA NEGERI 2 KOTA BEKASI</b></th> 
        </tr>
        <tr> 
            <td class='tthdSm' style="text-align: center; vertical-align: middle;"><i>Jl. Tangkuban Perahu No.1 Perumnas II Kayuringin Jaya Bekasi Selatan Telp. (021) 8843280</i></td> 
        </tr>    
        <tr> 
            <td style="text-align: center; vertical-align: middle;" class='tthdSm'>Faximile: (021) 88853753 website: <b><u>http://www.sman2-bks.sch.id</u></b>  e-mail: <b><u>info@sman2-bks.sch.id</u></b></td> 
        </tr>
        <tr> 
            <td style="text-align: center; vertical-align: middle;" class='tthd'>KOTA BEKASI - 17144</td> 
        </tr>     
    </table>
    <hr class="style2"> 
    <br> 
    <table class="tablettdhd" width='100%'>
		<tr>
            <!-- <th class='tthd' width='100%'>KARTU ULANGAN HARIAN SEMESTER GANJIL</th>  -->
			<th class='tthd' width='100%'>KARTU ULANGAN TENGAH SEMESTER GANJIL</th> 
        </tr>  
        <tr>
            <th class='tthd' width='100%'>TAHUN PELAJARAN 2023/2024</th> 
        </tr>    
    </table>
    <br>

    <table class="tablettd" width='100%'> 
        <tr>
            <td class='tttd' width='38%'>NAMA</td>
            <td class='tttd' width='2%'>:</td>
            <td class='tttd' width='60%'><?php echo $dataregistrasi['nama_lengkap'] ?></td>  
        </tr>
        
        <tr>
            <td class='tttd' width='38%'>KELAS</td>
            <td class='tttd' width='2%'>:</td> 
            <td class='tttd' width='60%'><?php echo $dataregistrasi['kelas'] ?></td> 
        </tr>

		<tr>
            <td class='tttd' width='38%'>NIS / NISN</td>
            <td class='tttd' width='2%'>:</td> 
            <td class='tttd' width='60%'><?php echo $dataregistrasi['nomor_pendaftaran']."/".$dataregistrasi['nisn'] ?></td> 
        </tr>
         
        <tr>
            <td class='tttd' width='38%'>TEMPAT</td>
            <td class='tttd' width='2%'>:</td> 
            <td class='tttd' width='60%'>SMA NEGERI 2 KOTA BEKASI</td> 
        </tr>   
	</table> 
    <br>
    <table class="tablettd" width='100%'> 
		<tr>
            <td class='tttd' width='65%'>Catatan</td> 
			<td class='tttd' >Bekasi, <?php echo tgl_indo(date('Y-m-d')); ?></td> 
        </tr>
        <tr>
            <td class='tttd' width='65%'>Kartu ini tidak boleh hilang / rusak</td> 
			<td class='tttd' >Kepala Sekolah</td> 
        </tr>
        <tr>
            <td class='tttd'>Kartu ini harus dibawa selama ujian berlangsung</td>  
        </tr>  
		<tr>
            <td class='tttd' width='65%' align="left" valign="top">
 				<?php 
				
 					if($dataregistrasi['note']!=""){ 
				?>
				<hr>
				Daftar Mata Pelajaran Yang tidak memenuhi syarat :
				<?php 

						$note = explode(',',$dataregistrasi['note']);
						echo "<ol>";
						foreach ($note as $n) {
							echo "<li>".$n."</li>";
						}
						echo "</ol>";

					}
				?>

			</td> 
			<td class='tttd' >
			<img src="<?php echo base_url() ?>/upload/<?php echo $kepsek['ttd_path'] ?>" style='width: 100px;'>
			<br><br>
			<?php echo $kepsek['nama']; ?></td> 
        </tr>
		<tr>
            <td class='tttd' width='65%'></td> 
			<td class='tttd' >NIP <?php echo $kepsek['nip']; ?></td> 
        </tr>
    </table>
 	<br>
	<hr>
	<table class="tablettdhd" width='100%'>
		<tr> 
			<th class='tthd' width='100%'>JADWAL UTS/STS</th> 
        </tr>  
        <tr>
            <th class='tthd' width='100%'><br><img src="<?php echo base_url() ?>/upload/<?php echo $jadwal['ttd_path'] ?>"></th> 
        </tr>    
    </table>
      
</body> 

<style>
.chgwhite{
    color:white;
}
.table1 {
    font-family: cambria;
    font-size: 11px;
    color: #232323;
    border-collapse: collapse;
}

.table1 , .borderth, .bordertd {
    border: 1px solid #999;
    padding: 3px 15px;
}
.tablettd {
    font-family: cambria;
    font-size: 12px;
    color: #232323;
    border-collapse: collapse;
}
.tablettd , .tttd{ 
    padding: 2px 10px;
}
.tablettdhd {
    font-family: cambria;
    font-size: 13px;
    color: #232323;
    border-collapse: collapse;
}
.tablettdhd , .tthd{ 
    padding: 2px 10px;
}
.tthdS{
    padding: 2px 10px;
    font-family: cambria;
    font-size: 15px;
}
.tthdSm{
    padding: 2px 10px;
    font-family: cambria;
    font-size: 11px;
}
hr.new3 {
  border-top: 1px dotted black !important;
}
hr.style2 {
    height:3px;
	color:black;
}

@page {
    margin: 1.75cm 1cm 1cm 1.75cm !important;
    padding: 0px 0px 0px 0px !important;
    size: auto;
}
.center {
  margin: auto; 
  text-align: center;
}
</style>
