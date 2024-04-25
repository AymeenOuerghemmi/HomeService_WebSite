<?php
include_once "./include/header.php";
include_once "./msg/login.php";
?>
<div class="container " style="background: #f0f0f0;">
    <div class="row justify-content-center">
        <div class="col-md-6" style="background: white; padding: 20px; border-radius: 10px;">
            <!-- Image -->
            <img decoding="async" src="images/contact-img-3.jpg" class="img-fluid c-img" alt="image">
        </div>
        <div class="col-md-6" style="background: white; padding: 20px; border-radius: 10px;">
            <!-- Form --><br><br>
            <div >
                    <div class="border-start border-5 border-primary ps-4 mb-5">
                        <h6 class="text-body text-uppercase mb-2">Contact Us</h6>
                        <h1 class="display-6 mb-0">If You Have Any Query, Please Contact Us</h1>
                    </div>
                    
             </div>   
             <form>
                        <div class="row g-3 ">
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control border-0 bg-light" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0 bg-light" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <textarea class="form-control border-0 bg-light" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
<style>
    .form{
        background: white;
    } 

</style>

<?php include_once "./include/footer.php"; ?>