<!DOCTYPE<> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/responsive.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.js" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/js/js.js" rel="stylesheet">

 

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/ico/favicon.png">
  </head>
  <body>

<div class="navbar navbar-static-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">Encuestas Uniquindío</a>


      <div class="nav-collapse collapse pull-right">
      <?php $this->widget('zii.widgets.CMenu',array(
             'htmlOptions'=>array("class"=>"nav"),
              'items'=>array(
                array('label'=>'Inicio', 'url'=>array('/site/index')),
                array('label'=>'Ingresar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)),
            )); ?>

 
      </div><!--/.nav-collapse -->

    </div>
  </div>
</div>

 <?php if(isset($this->breadcrumbs)):?>
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
      'links'=>$this->breadcrumbs,
    )); ?><!-- breadcrumbs -->
  <?php endif?>
 
<?php echo $content;?>
  
<footer class="footer bg-ft clearfix pd4">
    <div class="container">
        <!--footer container-->
        <div class="row-fluid">
            <div class="span3">
                <section>
                    <h4><span>Contacto</span></h4>
                    <p>Universidad del Quindío<br>
                       <br>
                        Armenia Colombia<br>
                       <span class="overflow"><strong>email:</strong> <a href="mailto:email@domain.com">Encuestas@uniquindio.edu.co</a></span> </p>
                </section>
                <!--close section-->

                <section>
                    <h4><span>síguenos</span></h4>
                    <div class="social">
                      <a href="#"><i class="icon-facebook facebook"></i></a>
                      <a href="#"><i class="icon-twitter twitter"></i></a>
                      <a href="#"><i class="icon-linkedin linkedin"></i></a>
                      <a href="#"><i class="icon-google-plus google-plus"></i></a>
                    </div>
                </section>
                <!--close section-->
            </div>
            <!-- close .span3 -->

            <!--section containing newsletter signup and recent images-->
            <div class="span5">
                <section>
                    <h4><span>Mejoramiento Continuo</span></h4>
                    <p>El proceso de mejoramiento continuo se sigue por medio de las 
                      directivas del ministerio de educación nacional.</p>
                        <form action="#" method="post">
                          <br>
                              <p> Poner imágen </p>
                          </br>
                    <div class="input-append append-fix custom-append row-fluid">
                     


                    </div></form>
                    <!--close input-append-->
                </section>
                <!--close section-->
            </div>
            <!-- close .span5 -->

            <!--section containing blog posts-->
            <div class="span4">
                <section>
                    <h4><span>Nosotros</span></h4>
                    <p>
                     Somos un grupo de estudiantes que tiene como misión elaborar la plataforma de encuestas
                     versión 2.0 como proyecto del espacio acádemico de ingeniería de software 3
                     </p>
                </section>
            </div>
            <!-- close .span4 -->
        </div>
        <!-- close .row-fluid-->
    </div>
    <!-- close footer .container-->
</footer>


 <section class="footer-credits">
    <div class="container">
        <ul class="clearfix">
            <li>© 2015 All rights reserved.</li>
        </ul>
    </div>
    <!--close footer-credits container-->
</section>

 
  </body>
</html>
