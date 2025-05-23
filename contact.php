
<?php

include('header.php');

$con = mysqli_connect('localhost', 'root', '','car_rental_database');

if(!$con){
    die("Connection failed with datase: " . mysqli_connect_error());
}
// else{
//     echo("Conneccted with databse successfully");
// }

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);


$sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES('$name', '$email', '$subject', '$message')";

$rs = mysqli_query($con, $sql);

if($rs){
   echo '<script>alert("Message Sent Successfully")</script>';
   
}

}
?>

<link rel="stylesheet" href="css/contact.css">

    <div class="main-page">
      <div class="background-image"></div>
      <div class="text-container">
        <p>HOME > CONTACT></p>
        <h1>Contact Us</h1>
      </div>
    </div>



    <section>
      <div class="container-wrapper">
        <div class="upper-section-box">
          <p>
            Need help? Contact us to get the support you need. Our customer
            service team is available <br />
            24/7 to answer your question and resolve any issues you may have.
            <br />
          </p>
        </div>


  

        <div class="lower-section-box">
          <div class="lower-section-firstpart">
            <div class="address-detail">
              <p>Address:</p>
              <h4>Sydney 20th street</h4>
              <h4>Australia Aus 0183</h4>
            </div>

            <div class="phone_email-detail">
              <p>Phone:</p>
              <h4>+ 123 456790</h4>
            </div>

            <div class="phone_email-detail">
              <p>Email:</p>
              <h4>carrental2024@gmail.com</h4>
            </div>
          </div>


          <div class="lower-section-secondpart">

     <form action="" method="POST">
            <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
              <input
                type="text"
                placeholder="Enter Email"
                name="email"
                class="form-control"
                required
              />
            </div>

            <div class="form-group">
              <input type="text" name="subject" placeholder="Subject" class="form-control" />
            
            </div>

            <div class="form-msg-group">
              <textarea
                cols="70"
                rows="10"
                placeholder="Message"
                name="message"
                class="form-control"
                required
              ></textarea>
            </div>

            <div class="submit-btn">

            <!-- <input type="submit" class="sub-btn" name="submit" value="Send Message"> -->

            <button class="sub-btn" type="submit" name="submit">Send Message</button>

 
            </div>
          </div>
        </div>






        </form>









      </div>
    </section>