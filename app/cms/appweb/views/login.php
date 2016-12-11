 <style type="text/css">
         .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        margin-top: 30px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.65);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.65);
                box-shadow: 0 1px 2px rgba(0,0,0,.65);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 30px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 20px;
        height: auto;
        margin-top: 15px;
        margin-bottom: 15px;
        padding: 7px 9px;
      
      }

      .box { 

        background:rgb(0, 130, 153);         
        color #fff;
         padding: 5px;
         height: 25px;         
         margin-top: 50px;
         margin-right: auto;
         margin-bottom: 5px;
          margin-left: auto;
           text-align:center;
          } 
    </style>
<body>
     <div class="container">
      <form class="form-signin" action="<?php print base_url();?>index.php/login" method="post">
        <h2 class="form-signin-heading">Ingrese Sus Datos</h2>
        <input type="text" class="input-block-level" placeholder="Usuario" required="required" name="user">
        <input type="password" class="input-block-level" placeholder="Contraseña" required="required" name ="pass">
        <button class="btn btn-large btn-info" type="submit">Identificarme</button>
      </form>
      <div class="box">
        <small style="font-size: 11px;">    
    <p style="text-align:center; backgorund-color:#EDF1F7; color:#fff">
      Bienvenido al Centro de control IanCMS, desde esta aplicación puede administrar su sitio.
    </p>
  </small>
      </div>
    </div> <!-- /container -->