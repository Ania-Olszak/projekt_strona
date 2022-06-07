<?php 
  session_start();
  include_once "php/config.php";
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
$query = "SELECT * FROM `class`";
$query2 = "SELECT * FROM `subject`";
$result2 = mysqli_query($conn, $query);
$result3 = mysqli_query($conn, $query2);
$options = "";
$options1 = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}
while($row3= mysqli_fetch_array($result3))
{
    $options1 = $options1."<option>$row3[1]</option>";
}
?>

<?php include_once "header.php"; 

?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>PasteZSTI</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Imię</label>
            <input type="text" name="fname" placeholder="Podaj imię" required>
          </div>
          <div class="field input">
            <label>Nazwisko</label>
            <input type="text" name="lname" placeholder="Podaj nazwisko" required>
          </div>
        </div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Podaj email" required>
        </div>
        <div class="field input">
          <label>Hasło</label>
          <input type="password" name="password" placeholder="Podaj hasło" required>
          <i class="fas fa-eye"></i>
        </div>
         <div class="field input">
            
        </div>
        <div class="field image">
          <label>Wybierz Zdjęcie</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Zatop się w PasteZSTI">
        </div>
      </form>
      <div class="link">Masz już konto? <a href="login.php">Zaloguj się</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
