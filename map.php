<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/header.php'; ?>

<div class="xmove">
    <div id="my-breadcrumbs" class="">
        <div class="container">
            <div class="row">
                <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
                        <a itemprop='item' style='z-index:10' href='/hoian'>
                            <span itemprop='name'>Trang chủ</span>
                        </a>
                        <meta itemprop='position' content='1' />
                        <span class='sperate'></span>
                    </li>
                    <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
                        <a itemprop='item' style='z-index:9' href='map.php'>
                            <span itemprop='name'>Bản đồ</span>
                        </a>
                        <meta itemprop='position' content='2' />
                        <span class='sperate'></span>
                    </li>
                </ul>
                <div class='clearfix'></div>
            </div>
        </div>
        <div class='clearfix'></div>
    </div>



    <div id="main-web-wrapper">

        <div id="page-wrapper">


            <div id="content-center">
                <div class="clearfix"></div>
                <div class="box_containerlienhe">
                    <div class="container">

                        <div class="row hidden-sm hidden-xs">
                            <div class="global-title">
                                <h1>Bản đồ</h1>
                            </div>
                        </div>
                    </div>
                    <div class="content">

                        <section id="contact">

                            <div class="left-map">
                                <div class="map-contact">
                                    <div class="video-wrapper">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2773.005660069868!2d108.32649367150162!3d15.878164432819865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420dd6b64d4243%3A0xe37c5ebd96aefcfc!2zQ2jDuWEgQ-G6p3UgSOG7mWkgQW4!5e0!3m2!1svi!2s!4v1526916865804" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                           

                        </section>


                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <!--end page-wrapper-->
        <div class="clearfix"></div>

        <div class="clearfix"></div>

    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/footer.php'; ?>