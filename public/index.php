<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <?php
      $meta = array(
        'title' => "Where’s Gov. Greg Abbott? Calendar details his days in office.",
        'description' => 'Since his January inauguration, Abbott has kept himself busy with all manner of state business. But out of the scores of appointments reviewed by the American-Statesman, four main - and unsurprising - themes emerge.',
        'thumbnail' => 'http://projects.statesman.com/news/abbott-calendar/assets/share.jpg',
        'url' => 'http://projects.statesman.com/news/abbott-calendar/',
        'twitter' => 'statesman'
      );
    ?>

    <title>Interactive: <?php print $meta['title']; ?> | Austin American-Statesman</title>
    <link rel="icon" type="image/png" href="//projects.statesman.com/common/favicon.ico">

    <link rel="canonical" href="<?php print $meta['url']; ?>" />

    <meta name="description" content="<?php print $meta['description']; ?>">

    <meta property="og:title" content="<?php print $meta['title']; ?>"/>
    <meta property="og:description" content="<?php print $meta['description']; ?>"/>
    <meta property="og:image" content="<?php print $meta['thumbnail']; ?>"/>
    <meta property="og:url" content="<?php print $meta['url']; ?>"/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@<?php print $meta['twitter']; ?>" />
    <meta name="twitter:title" content="<?php print $meta['title']; ?>" />
    <meta name="twitter:description" content="<?php print $meta['description']; ?>" />
    <meta name="twitter:creator:id" content="15464292" />
    <meta name="twitter:creator:id" content="16235644" />
    <meta name="twitter:image:src" content="<?php print $meta['thumbnail']; ?>" />
    <meta name="twitter:url" content="<?php print $meta['url']; ?>" />

    <link href="dist/style.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lusitana:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,300italic,400italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php /* CMG advertising and analytics */ ?>
    <?php include "includes/advertising.inc";?>
    <?php include "includes/metrics-head.inc";?>
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://www.statesman.com/" target="_blank">
            <img width="273" height="26" src="assets/logo.png" />
          </a>
        </div>
        <ul class="nav navbar-nav navbar-right social hidden-xs">
          <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-facebook-square"></i></a></li>
          <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($meta['url']); ?>&via=<?php print urlencode($meta['twitter']); ?>&text=<?php print urlencode($meta['title']); ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
    </nav>

    <article class="container">
      <div class="header">
        <h4>Insight</h4>
        <h1><?php print $meta['title']; ?></h1>
        <p class="author">By Andrea Ball<br />Presentation by Andrew Chavez<br />Published April 12, 2015</p>
        <p><?php print $meta['description']; ?></p>
        <?php /* <p><span>Related story:</span> <a target="_blank" href="http://www.mystatesman.com/news/news/state-regional-govt-politics/austin-rodeo-fundraising-a-focus-in-21ct-criminal-/nkrrC/#f9bbe8c6.3846074.735700">Austin rodeo fundraising a focus in 21CT criminal probe <i class="fa fa-angle-double-right"></i></a></p> */ ?>
      </div>

      <hr />

      <?php
        $json = file_get_contents('data/entries.json');
        $entries = json_decode($json);
      ?>

      <div class="row">
        <div class="col-sm-5 col-md-4 col-lg-3 hidden-xs calendar">
          <?php include('includes/calendar.inc'); ?>
        </div>

        <div id="entries" class="col-sm-7 col-md-8 col-lg-9">
          <?php $i = 1; ?>
          <?php foreach($entries->entries as $entry): ?>
            <div id="entry-<?php print $i; ?>" class="entry">
              <?php if($i > 1): ?>
                <p class="pull-left arrow hidden-xs"><a class="arrow-prev" href="#"><i class="fa fa-chevron-left"></i> Previous</a></p>
              <?php endif; ?>
              <?php if($i !== count($entries->entries)): ?>
                <p class="pull-right arrow hidden-xs"><a class="arrow-next" href="#">Next <i class="fa fa-chevron-right"></i></a></p>
              <?php endif; ?>
              <h2 class="text-center"><i class="fa fa-calendar"></i><br /><?php print $entry->date; ?></h2>
              <p class="label">What:</p>
              <p class="written"><?php print $entry->what; ?></p>
              <?php if(isset($entry->purpose)): ?>
                <p class="label">Purpose:</p>
                <p class="written"><?php print $entry->purpose; ?></p>
              <?php endif; ?>
              <p class="label">Attire:
              <p class="written"><?php print $entry->attire; ?></p>
              <p class="description"><?php print $entry->description; ?></p>
            </div>
            <?php if($i !== count($entries->entries)): ?>
              <hr class="hidden-sm hidden-md hidden-lg" />
            <?php endif; ?>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </article>

    <div class="clearfix" id="ads">
      <div class="visible-xs hidden-sm hidden-md hidden-lg col-xs-12">
        <div id="div-gpt-ad-1403295829614-3" class="center-block" style="width:320px; height:50px;">
          <script type="text/javascript">
          googletag.cmd.push(function() { googletag.display('div-gpt-ad-1403295829614-3'); });
          </script>
        </div>
      </div>
      <div class="hidden-xs visible-sm visible-md visible-lg col-xs-12">
        <div id="div-gpt-ad-1403295829614-1" class="center-block" style="width:728px; height:90px;">
          <script type="text/javascript">
          googletag.cmd.push(function() { googletag.display('div-gpt-ad-1403295829614-1'); });
          </script>
        </div>
      </div>
    </div>

    <p id="legal" class="center-block text-center"><small>© <?php print date("Y"); ?> <a href="http://www.coxmediagroup.com" target="_blank">Cox Media Group</a>. By using this website, you accept the terms of our <a href="http://www.mystatesman.com/visitor_agreement/" target="_blank">Visitor Agreement</a> and <a target="_blank" href="http://www.mystatesman.com/privacy_policy/">Privacy Policy</a>, and understand your options regarding <a target="_blank" href="http://www.mystatesman.com/privacy_policy/#ad-choices">Ad Choices</a><img src="http://media.cmgdigital.com/shared/img/photos/2012/02/29/d3/da/ad_choices_logo.png" alt="AdChoices">.</small></p>

    <?php /* CMG advertising and analytics */ ?>
    <?php include "includes/project-metrics.inc"; ?>
    <?php include "includes/metrics.inc"; ?>

    <script src="dist/scripts.js"></script>

    <?php if($_SERVER['SERVER_NAME'] === 'localhost'): ?>
      <script src="//localhost:35729/livereload.js"></script>
    <?php endif; ?>
  </body>
</html>
