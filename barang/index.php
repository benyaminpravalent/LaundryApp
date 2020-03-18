<script type="text/javascript">
function startCalculate(){
interval=setInterval("Calculate()",10);
}

function Calculate(){
var a=document.form1.stok.value;
var b=document.form1.jumlah.value;
document.form1.stokk.value=(a-b);
}

function stopCalc(){
clearInterval(interval);
}

</script>
<?php

$aksi="barang/proses.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Data Barang</h3> 
                                    </div>  <div class='panel-body'> 
									<p align='right'><a class='btn btn-primary' href='?p=barang&aksi=tambah'><i class='icon-plus'></i>Tambah Barang</a></p>
                                   <hr>
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
                                            <th><i class='icon-terminal'></i> No</th>
                                            <th><i class='icon-time'></i> Nama</th>
                                            <th><i class='icon-signal'></i> Stok</th>
										<th><i class='icon-chevron-right'></i> Tanggal Update Stok</th>
										<th><i class='icon-chevron-right'></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
							$i=1;
							$tp=mysqli_query($konek, "SELECT * FROM barangg ORDER BY id_barang");
							while($r=mysqli_fetch_assoc($tp)){
						    //$hargaa = $r['harga'];
                             echo"<tr>
                                    <td>$i</td>
									<td>$r[nama]</td>
									<td>$r[stok]</td>
                                    <td>".TanggalIndo($r['tgl_update'])."</td>
                                    <td>
								     <a class='btn btn-primary' href='?p=barang&aksi=edit&id=$r[id_barang]&id2=$r[id_supplier]'><i class='icon-edit'></i>Update Stok</a>
									 <a class='btn btn-success' href='?p=barang&aksi=pakai&id=$r[id_barang]'><i class='icon-edit'></i>Pakai</a>
									 <a class='btn btn-danger' href='$aksi?act=hapus&id=$r[id_barang]'><i class='icon-trash'></i>Hapus</td>
                                    
                                </tr>";
								$i=$i+1;
							}
                               
                                        
                        echo"</tbody>
                        </table>
                                     </div><!-- /.box-body -->
          </div><!-- /.box -->   ";    

break;
case "edit":

    $edit = mysqli_query($konek, "SELECT * FROM barangg WHERE id_barang='$_GET[id]'");
    $edit2 = mysqli_query($konek, "SELECT * FROM supplier WHERE id_supplier='$_GET[id2]'");
    $r2 = mysqli_fetch_assoc($edit2);
    $r    = mysqli_fetch_assoc($edit);
echo "<form method='post' action='barang/proses.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Tambah Stok Barang</h3> 
                                    </div>  <div class='panel-body'> 
                    <input type='hidden' name='id' value='$r[id_barang]'>
					 <div class='control-group'>
					 					   <div class='form-group'>
                            <label>Supplier</label>
                            <select class='form-control' name='supplier'><option value='$r2[id_supplier]' readonly>$r2[nama]</option></select>
                        </div>		
					   <div class='form-group'>
                            <label>Nama Barang</label>
                            <div class='span9'><input class='form-control' value='$r[nama]'  type='text' name='nama' readonly/></div>
                        </div>						
					   <div class='form-group'>
                            <label>Harga</label>
                            <div class='span9'><input class='form-control' size='16' type='number' value='$r[harga]' name='harga' readonly/></div>
                        </div>
											   <div class='form-group'>
                            <label>Jumlah Barang</label>
                            <div class='span9'><input class='form-control' size='16' type='number' placeholder='Masukan Jumlah Barang' name='jumlah' /></div>
                        </div>
					<Br>

			<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=barang'>Batal</a>
		  </form>
		</div> 
		                  
		                  
                    </div></div>
					
		";
echo "";
break;

case "tambah":

echo "<form method='post' action='barang/proses.php?act=input' enctype='multipart/form-data'>";
echo '<div class="panel panel-border panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title"><i class="fa fa-list"></i> Tambah Barang</h3> 
                                    </div>  <div class="panel-body"> 
					 <div class="control-group">
					 		<div class="form-group">
                            <label>Supplier</label>
							<select class="form-control" name="supplier">
                            ';
							$tp=mysqli_query($konek, "SELECT id_supplier, nama FROM supplier ORDER BY id_supplier");
							while($r=mysqli_fetch_assoc($tp)){
								echo"<option value='$r[id_supplier]'>$r[nama]</option>";
							}
							echo'
							</select>
							</div>		
					   <div class="form-group">
                            <label>Nama Barang</label>
                            <div class="span9"><input class="form-control" placeholder="Masukan Nama Barang"  type="text" name="nama" /></div>
                        </div>						
					   <div class="form-group">
                            <label>Harga</label>
                            <div class="span9"><input class="form-control" size="16" type="number" placeholder="Masukan Harga Barang" name="harga" /></div>
                        </div>
											   <div class="form-group">
                            <label>Jumlah Barang</label>
                            <div class="span9"><input class="form-control" size="16" type="number" placeholder="Masukan Jumlah Barang" name="jumlah" /></div>
                        </div>				 
					<Br>

			<input type="submit" class="btn btn-primary" value="Tambah"> <a class="btn btn-danger" href="?p=barang">Batal</a>
		  </form>
		  <br>

		</div> 
		                  
                   </div></div> ';
echo "";
break;

case "pakai":
	$edit = mysqli_query($konek, "SELECT * FROM barangg WHERE id_barang='$_GET[id]'");
    $r    = mysqli_fetch_assoc($edit);
	
echo "<form method='post'  name='form1'  action='barang/proses.php?act=pakai' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Pakai Barang</h3> 
                                    </div>  <div class='panel-body'> 
					<input type='hidden' name='id' value='$r[id_barang]'>
					 <div class='control-group'>	
					   <div class='form-group'>
                            <label>Nama Barang</label>
                            <div class='span9'><input class='form-control' value='$r[nama]'  type='text' name='nama' readonly/></div>
                        </div>						
					   <div class='form-group'>
                            <label>Stok</label>
                            <div class='span9'><input class='form-control' size='16' type='number' value='$r[stok]' name='stok' readonly/></div>
                        </div>
						<div class='form-group'>
                            <label>Jumlah Barang</label>
                            <div class='span9'><input onchange='startCalculate()' class='form-control' size='16' type='number' placeholder='Masukan Jumlah Barang yang akan dipakai' name='jumlah' /></div>
                        </div>
						  <div class='form-group'>
                            <label>Sisa Stok</label>
                            <div class='span9'><input class='form-control' size='16' type='number' name='stokk'/></div>
                        </div>
					<Br>

			<input type='submit' class='btn btn-primary' value='Submit'> <a class='btn btn-danger' href='?p=barang'>Batal</a>
		  </form>
		</div> 
		                  
		                  
                    </div></div>
					
		";
echo "";
break;

			}//penutup switch
?>    	


</body>

</html>