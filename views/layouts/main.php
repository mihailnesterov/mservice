<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
    use app\assets\AppAsset;
    
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl(Yii::$app->homeUrl.'web');

    $company = Yii::$app->controller->getCompany('company');
    $services = Yii::$app->controller->getServices('services');
    $complexes = Yii::$app->controller->getComplexes('complexes');
    $footerServices = Yii::$app->controller->getFooterServices('footerServices');
    $footerComplexes = Yii::$app->controller->getFooterComplexes('footerComplexes');
    $metrika = Yii::$app->controller->getYandexMetrika('metrika');
    
    $this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?= Yii::$app->request->url ?>" />
        <meta property="og:title" content="<?= $this->title ?> | <?= Yii::$app->name ?>" />
        <meta property="og:description" content="<?= $this->title ?>" />
        <meta property="og:image" content="<?= Yii::$app->homeUrl ?>web/images/logo.png" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="<?= $this->title ?> | <?= Yii::$app->name ?>" />
        <meta name="twitter:image:src" content="<?= Yii::$app->homeUrl ?>web/images/logo.png" />
        <meta name="twitter:description" content="<?= $this->title ?>" />
        <link rel="image_src" href="<?= Yii::$app->homeUrl ?>web/images/logo.png" />

        <base href="<?= Yii::$app->homeUrl ?>">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> | <?= Html::encode(Yii::$app->name) ?></title>
        
        <?php $this->head(); ?>
        
        <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <?= $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => $directoryAsset . 'favicon.ico']) ?>
        
        <?php            
            AppAsset::register($this);
        ?>
        
    </head>
    <body>
        <?php $this->beginBody(); ?>
        
        <div id="wrapper" class="container-fluid">
		<div class="row">
			<header id="top" class="container hidden-xs" role="banner">
				<div class="row">
					<div id="top-left-block" class="col-sm-5">
						<div class="row">
							<div id="logo" class="col-sm-5 col-md-3">
								<?= Html::a(
									Html::img(
										'images/logo.jpg',
										[
											'alt' => 'logo',
											'class' => 'img-responsive'
										]
										
									), 
									'@web'
								)?>
							</div>
							<div id="slogan" class="col-sm-7 col-md-9">
								<p>Срочные экспертные проверки</p>
								<p>объектов и субъектов</p>
							</div>
						</div>
					</div> <!-- end col -->
					<div id="top-center-block" class="col-sm-2 text-center">
						<a href="<?= Yii::$app->urlManager->createUrl('/') ?>#order" class="scrolling-links btn btn-warning">Заказать проверку</a>
					</div> <!-- end col -->
					<div id="top-right-block" class="col-sm-5 text-center">
						<ul>
							<li><i class="fa fa-phone"></i><?= $company->phone1 ?></li>
							<li><i class="fa fa-mobile"></i><?= $company->phone2 ?></li>
							<li class="mailto"><i class="fa fa-envelope-o"></i><a href="mailto: <?= $company->email ?>"><?= $company->email ?></a></li>
						</ul>
					</div> <!-- end col -->

				</div> <!-- end row -->
			</header> <!-- end header -->
			
			
			<div id="main-menu-container" class="container-fluid">
				<div class="row">
					<div class="container">
						<div class="row">
							<nav role="navigation" id="main-menu" class="navbar navbar-default">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand visible-xs" href="#">M | SERVICE</a>
								</div>
								<div id="navbar" class="navbar-collapse collapse">
									<ul class="nav navbar-nav">
										<li role="presentation" class="dropdown">
											<a href="<?= Yii::$app->urlManager->createUrl('/') ?>" data-target="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
												Услуги
											</a>
												<ul class="dropdown-menu hidden-xs">
													<?php foreach ($services as $key => $service): ?>
														<?php if ($service->description != ''): ?>
															<li><?= Html::a($service->name, '@web/services?id='.$service->id) ?></li>
														<?php endif ?>
													<?php endforeach ?>
												</ul>
											</li>
										<li role="presentation" class="dropdown">
											<a href="<?= Yii::$app->urlManager->createUrl('complexes') ?>" data-target="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
												Рекомендуемые проверки
											</a>
											<ul class="dropdown-menu hidden-xs">
												<?php foreach ($complexes as $key => $complex): ?>
													<li><a href="<?= Yii::$app->urlManager->createUrl('complexes#recommended-block')?><?= $complex->id ?>"><?= $complex->name ?></a></li>
												<?php endforeach ?>
											</ul>
										</li>
										<li class="hidden"><a href="<?= Yii::$app->urlManager->createUrl('blog') ?>">Полезное</a></li>
										<li><a href="<?= Yii::$app->urlManager->createUrl('about') ?>">О нас</a></li>
										<li><a href="<?= Yii::$app->urlManager->createUrl('contacts') ?>">Контакты</a></li>
									</ul>
								</div>
							</nav>
						</div> <!-- end row -->
					</div> <!-- end container -->
				</div> <!-- end row -->
			</div> <!-- end container-fluid -->
			
			<!-- выводим view -->
			<?= $content ?>

			<footer role="contentinfo" class="container-fluid">
				<div class="row">
					<div class="container">
						<div class="row">
							<div class="footer-block col-sm-4">
								<h4>Наши услуги</h4>
								<ul>
									<?php foreach ($footerServices as $key => $service): ?>
										<li><a href="<?= Yii::$app->urlManager->createUrl('services?id='.$service->id) ?>"><?= $service->name ?></a></li>
									<?php endforeach ?>
									<li><a href="<?= Yii::$app->urlManager->createUrl('/#order') ?>">Все услуги <i class="fa fa-angle-double-right"></i></a></li>
								</ul>
							</div> <!-- end col -->
							<div class="footer-block col-sm-4">
								<h4>Рекомендуемые проверки</h4>
								<ul>
									<?php foreach ($footerComplexes as $key => $complex): ?>
										<li><a href="<?= Yii::$app->urlManager->createUrl('complexes#recommended-block').$complex->id ?>"><?= $complex->name ?></a></li>
									<?php endforeach ?>
									<li><a href="<?= Yii::$app->urlManager->createUrl('complexes') ?>">Все проверки <i class="fa fa-angle-double-right"></i></a></li>
								</ul>
							</div> <!-- end col -->
							<div class="footer-block col-sm-4">
								<h4>Контакты</h4>
								<ul>
									<li><i class="fa fa-phone" aria-hidden="true"></i> <?= $company->phone1 ?></li>
									<li><i class="fa fa-mobile" aria-hidden="true"></i> <?= $company->phone2 ?></li>
									<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto: <?= $company->email ?>"><?= $company->email ?></a></li>
									<li><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $company->address ?></li>
								</ul>
							</div> <!-- end col -->
							<div id="copyright" class="footer-block col-xs-12 text-center">
								<p>2008 - <?= date('Y') ?> &copy <?= Html::a($company->name, ['/']) ?> - Экспертные проверки Объектов и Субъектов</p>
								<p>Услуги предоставляются по Москве, Московской области и регионам РФ.</p>
							</div> <!-- end col -->
						</div> <!-- end row -->
					</div> <!-- end container -->
				</div> <!-- end row -->
			</footer> <!-- end footer -->
		
		</div> <!-- end row -->

		

	</div> <!-- end wrapper container-fluid -->
	

	<div id="cart-container" class="fadeInUp animated">
		<div id="cart" class="container">
			<div class="row">
				<div class="col-sm-1 text-center">
					<i class="fa fa-shopping-basket fa-3x"></i>
				</div>
				<div class="col-sm-7">
					<p id="cart-empty-text">Корзина пуста...</p>
					<ol id="cart-list">
					</ol>
				</div>
				<div class="col-sm-4 text-right">
					<div id="sum-block">
						<span id="sum">0</span> 
						<i class="fa fa-rub"></i>
					</div>
					<div id="btn-order-block">
						<a id="go-step3" href="#step3" data-toggle="tab" class="btn btn-danger btn-lg">Заказать</a>
					</div>
				</div>
			</div>	<!-- end row -->
		</div>	 <!-- end container -->
	</div>	 <!-- end cart -->
         
        
        <div id="toTop"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
        <!--<script>ActiveLinksMain('main-menu')</script>-->
        <?= $metrika ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
