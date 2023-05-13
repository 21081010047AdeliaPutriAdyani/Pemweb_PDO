<?php 
  include ('koneksi.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];
    
    //query with PDO
    $query = $conn->prepare("INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit)
     VALUES(:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)"); 

    //binding data
    $query->bindParam(':customerNumber',$customerNumber);
    $query->bindParam(':customerName',$customerName);
    $query->bindParam(':contactLastName',$contactLastName);
    $query->bindParam(':contactFirstName',$contactFirstName);
    $query->bindParam(':phone',$phone);
    $query->bindParam(':addressLine1',$addressLine1);
    $query->bindParam(':addressLine2',$addressLine2);
    $query->bindParam(':city',$city);
    $query->bindParam(':state',$state);
    $query->bindParam(':postalCode',$postalCode);
    $query->bindParam(':country',$country);
    $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
    $query->bindParam(':creditLimit',$creditLimit);

    //eksekusi query
    if ($query->execute()) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Customer</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA CUSTOMER</h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
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
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "tambah_customers.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>
              
                <tr class="akhir">
                    <td colspan="3">
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil disimpan</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal disimpan</div>';
                          }
                        ?>

                      <h2 style="margin: 30px 0 30px 0;">Form Customer</h2>
                      <form action="tambah_customers.php" method="POST">
                      <div class="form-group">
                        <label>customerNumber</label>
                        <input type="text" class="form-control" placeholder="customerNumber" name="customerNumber" required="required">
                      </div>
                      <div class="form-group">
                        <label>customerName</label>
                        <input type="text" class="form-control" placeholder="customerName" name="customerName" required="required">
                      </div>
                      <div class="form-group">
                        <label>contactLastName</label>
                        <input type="text" class="form-control" placeholder="contactLastName" name="contactLastName" required="required">
                      </div>
                      <div class="form-group">
                        <label>contactFirstName</label>
                        <input type="text" class="form-control" placeholder="contactFirstName" name="contactFirstName" required="required">
                      </div>
                      <div class="form-group">
                        <label>phone</label>
                        <input type="text" class="form-control" placeholder="phone" name="phone" require="require">
                      <div class="form-group">
                        <label>addressLine1</label>
                        <input type="text" class="form-control" placeholder="addressLine1" name="addressLine1" required="required">
                      </div>
                      <div class="form-group">
                        <label>addressLine2</label>
                        <input type="text" class="form-control" placeholder="addressLine2" name="addressLine2" required="required">
                      </div>
                      <div class="form-group">
                        <label>cty</label>
                        <input type="text" class="form-control" placeholder="city" name="city" required="required">
                      </div>
                      <div class="form-group">
                        <label>state</label>
                        <input type="text" class="form-control" placeholder="state" name="state" required="required">
                      </div>
                      <div class="form-group">
                        <label>postalCode</label>
                        <input type="text" class="form-control" placeholder="postalCode" name="postalCode" required="required">
                      </div>
                      <div class="form-group">
                        <label>country</label>
                        <input type="text" class="form-control" placeholder="country" name="country" required="required">
                      </div>
                      <div class="form-group">
                        <label>salesRepEmployeeNumber</label>
                        <input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" required="required">
                      </div>
                      <div class="form-group">
                        <label>creditLimit</label>
                        <input type="text" class="form-control" placeholder="creditLimit" name="creditLimit" required="required">
                      </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

  </body>
</html>