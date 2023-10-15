<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
  <title>NotenNest</title>

  <link href="/NotenNest/bootstrap/main.css" rel="stylesheet">
  <link href="/NotenNest/css/index.css" rel="stylesheet">
  <script src="/NotenNest/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <!-- Simple Routing Logic -->
  <!-- The .htaccess file redirects all requests to this file (index.php) where we do our own routing to the individual pages -->
  <!-- This allows us to load components needed on every page (header and footer) -->
  <?php

  // Define the base url of the website
  $BASE_URL = '/NotenNest';

  // Get the request path
  $request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);;

  // Remove the base url from the request path.
  // This allows us to always get the current path no matter in what folder the website is hosted in.
  // This CURRENT_PATH variable can be used on all sub pages.
  $CURRENT_PATH = str_replace($BASE_URL, '', $request);

  // Load utility functions
  require __DIR__ . '/util/utils.php';

  // Load globals
  require __DIR__ . '/util/globals.php';

  // Loade the header
  require __DIR__ . '/header.php';
  
  // Create DB Service
  require __DIR__ . '/util/dbService.php';
  $DB_SERVICE = new dbService();

  // Check current path and load the corresponding page
  // Add routing for new pages here
  switch ($CURRENT_PATH) {
    case '/':
      require __DIR__ . '/pages/home.php';
      break;
    case '/home':
      require __DIR__ . '/pages/home.php';
      break;
    case '/instruments':
      require __DIR__ . '/pages/categories.php';
      break;
    case '/partners':
      require __DIR__ . '/pages/partners.php';
      break;
    case '/contact':
      require __DIR__ . '/pages/contact.php';
      break;
    case '/about':
      require __DIR__ . '/pages/about.php';
      break;
    case '/instruments/articles':
      require __DIR__ . '/pages/articles.php';
      break;
    default:
      require __DIR__ . '/pages/notFound.php';
      break;
  }

  // Load the footer
  require __DIR__ . '/footer.php';
  ?>


</body>

</html>