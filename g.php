<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <h3>Popover Example</h3>
  <p>Popovers are not CSS-only plugins, and must therefore be initialized with jQuery: select the specified element and call the popover() method.</p>
  <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a>
  <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover""><i class="bi bi-telephone-fill"></i></a>
</div>
<button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
  Popover on top
</button>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>

</body>
</html>
