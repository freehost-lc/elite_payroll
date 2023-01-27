<?php 

if(!empty($_SESSION['active'])){
  header('location: index-home.php');
}
?>

<?php
    
    if(!empty($_POST["send"])) {
      $user = $_POST["user"];
      $password = $_POST['password'];

        $sql = "SELECT id FROM `users` WHERE username='$user' AND password='$password'";

         $result = mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)==1){
             $user_id=mysqli_fetch_assoc($result);
             $user_id_show=sprintf ($user_id['id']);
             $_SESSION['active']=$user_id_show;
             header("Location: index-home.php");


      } else {
              header("Location: index.php");
      }
          }
          mysqli_close($conn);
  
?>

  <section id="hero-animated" class="contact hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="assets/img/hero-carousel/ONLINEINsure.png" class="img-fluid animated">
      <h2>Payroll Software</span></h2>

          <div class="col-lg-3">
          </div>

            <div class="col-lg-6">
                <form method="post" action="index.php">
                    <div id="div_login">
                        <h1>Login</h1>
                        <div>
                            <input type="text" class="form-control" name="user" placeholder="Username" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                        <div>
                            <input type="submit" value="Submit" name="send" />
                        </div>
                    </div>
                </form>
            </div>


          <div class="col-lg-3">

          </div>


    </div>
  </section>
