<?php 
  include ('koneksi.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRODUCT</title>
</head>
<body>
<div class = "container" >
    <h2 align="center">DATA PRODUCT</h2>
        <table style="width:100%" cellspacing="0">
            <tr class="atas">
                <td class="satu">
                    <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "customer.php"; ?>"><b>data customer</b></a>
                        </center>    
                    </td>

                    <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "product.php"; ?>"><b>data product</b></a>
                        </center>    
                    </td>
                </tr>

                <tr class="tengah">
                    <td colspan="2">
                      
                    </td>
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "tambah_product.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>
            
            <tr class="akhir">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <?php 
                        //mengecek apakah proses update dan delete sukses/gagal
                        if (@$_GET['status']!==NULL) {
                        $status = $_GET['status'];
                        if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">BERHASIL</div>';
                        }
                        elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">GAGAL</div>';
                        }

                        }
                    ?>
                <td colspan="6">
                    <table border="1"  style="width:100%" cellspacing="0">
                        <thead>
                            <tr bgcolor="tan" >
                                <th>productCode</th>
                                <th>productName</th>
                                <th>productLine</th>
                                <th>productScale</th>
                                <th>productVendor</th>
                                <th>productDescription</th>
                                <th>quantityInStock</th>
                                <th>buyPrice</th>
                                <th>MSRP</th>
                                <th>action</th>
                            </tr>
                        </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM products";
                  $result = $koneksi->query($query);

                 ?>

                 <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                    <tr>
                                    <td>
                                        <?php 
                                            echo $data['productCode'];  
                                        ?>
                                    </td>
                                        <td>
                                            <?php 
                                                echo $data['productName'];  
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $data['productLine'];  
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $data['productScale'];  
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo $data['productVendor'];  
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $data['productDescription'];  
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $data['quantityInStock'];  
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $data['buyPrice'];  
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $data['MSRP'];  
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo "update_product.php?productCode=".$data['productCode']; ?>">Update</a>
                                            &nbsp;&nbsp;
                                            <a href="<?php echo "hapus_product.php?productCode=".$data['productCode']; ?>"> Delete</a>
                                        </td>
                                </tr>
                    </td>
                </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>