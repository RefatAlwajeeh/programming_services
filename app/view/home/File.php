<?php 

$handle = fopen('File.txt','r');

$data = fread($handle,filesize('File.txt'));

$array = explode(',',$data);

//print_r($array);

foreach ($array as $d){
    
    echo $d."<br>";
}



if (isset($_POST['add_user_cust'])) {
    
function add_user_cust_img() {
    set_include_path('.;C:\xampp\htdocs\programming_services\app\view\home');
    
         $path = "images/persons_images/" . time() . "." . end(explode(".", $_FILES['img']['name']));
        $name = time() . "." . end(explode(".", $_FILES['img']['name']));

        echo 'name:  '.$name."<br>";
        if (move_uploaded_file($_FILES['img']['tmp_name'], $path))
            return $name;
        return "";
    }
    
    echo add_user_cust_img();
}

?>

<html>
    <head>
          <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Mag - Video &amp; Magazine HTML Template</title>

        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="style.css">

        <link rel="stylesheet" type="text/css" href="css/component.css" />

    </head>
    
    <body>
        
<!--         <form id="singin_form" method="post" enctype="multipart/form-data" >
                                       
                                        <div class="box">
                                            <input type="file" name="image_prfile_cust" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" multiple />
                                            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                                        
                                        </div>

                                        <button type="submit" name="addss" class="btn mag-btn mt-30">Create</button>

                                    </form>-->
        

 <form id="singin_form" method="post" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="" name="Fname_cust" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="" name="Lname_cust" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="" name="age_cust" placeholder="Age">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="" name="email_cust" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="password_cust" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control inputstl" id="gender" name="gender_cust">
                                                <option value="" disabled selected hidden>Choose a gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            
                                                
                                                <input type="hidden" class="btn btn-primary" name="person_type_cust"  value="customer">
                                            
                                        </div>
                                        
                                       


                                        <div class="box">
                                            <input type="file" name="img" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" style="display: none;" multiple />
                                            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                                        </div>

                                        <button type="submit" name="add_user_cust" class="btn mag-btn mt-30">Create</button>

                                    </form>
    </body>
</html>