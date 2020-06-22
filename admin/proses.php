<?php
/**
 *
 */
class ClassSistem
{
  public $koneksi;
  function __construct()
  {
    $this->koneksi = mysqli_connect("localhost","root","","portal");
  }

  public function deleteMobil($id)
  {
    $del = mysqli_query($this->koneksi,"DELETE FROM mobil WHERE id='$id'");
    if ($del) {
    ?>
    <script>
    var cnf = confirm("berhasil menghapus mobil")
    if (cnf) {location.href='awal.php?tambahMobil'}
    </script>
    <?php
    }else{
    echo "gagal menghapus data : ". $query->error;
    }
    return $del;
  }

  public function insertCustomer($namalengkap, $username, $alamat,$telepon,$password,$noktp)
  {
    $query = mysqli_query($this->koneksi,"INSERT INTO siswa(student_id,name,address,phone) VALUES
      ('$student_id', '$name', '$address','$phone','$password',)");
    if ($query) {
      ?>
      <script>
        var cnf = confirm("Akun anda berhasil di buat silahkan Login")
        if (cnf) {location.href='../projek/index.php'}
      </script>
      <?php
    }else{
      echo "gagal menambahkan data : ". $query->error;
    }
  }

  public function selectCustomer($username, $password)
  {
    $query = mysqli_query($this->koneksi,"SELECT * FROM siswa WHERE student_id='student_id' and password='$password'");
    $data = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);

    if ($data > 0){
      session_start();
	  $_SESSION['student_id'] = $row['student_id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['address'] = $row['address'];
      $_SESSION['phone'] = $row['phone'];
      echo "<meta http-equiv='refresh' content='0; url=../projek/index.php'>";
  }else{
    ?>
  <script type="text/javascript">
    alert("Username dan password tidak terdaftar...!!!");
  </script>
<?php
  echo "<meta http-equiv='refresh' content='0; url=../projek/index.php'>";
  }
  }
  public function deleteCustomer($id)
  {
    $del = mysqli_query($this->koneksi,"DELETE FROM siswa WHERE student_id='$student_id'");
    if ($del) {
                        ?>
                        <script>
                          var cnf = confirm("berhasil menghapus user")
                          if (cnf) {location.href='awal.php?daftaruser'}
                        </script>
                        <?php
                      }else{
                        echo "gagal menghapus user : ". $query->error;
                      }
    return $del;
  }
  public function selectAdmin($username, $password)
  {
    $query = mysqli_query($this->koneksi,"SELECT * FROM lg_admin WHERE id='$id' and password='$password'");
    $data = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);

    if ($data > 0){
      session_start();
      $_SESSION['id'] = $row['id'];
      echo "<meta http-equiv='refresh' content='0; url=awal.php'>";
  }else{
    ?>
  <script type="text/javascript">
    alert("Username dan password tidak terdaftar...!!!");
  </script>
<?php
  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  }
  }

}
