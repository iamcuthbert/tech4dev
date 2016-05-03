<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Asingwire Cuthbert Assignment">
    <meta name="author" content="">

    <title>Asingwire Cuthbert - Assignment</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/modern-business.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
            <a class="navbar-brand" href="index.php">Tech4DevAssignment</a>
        </div>
    </div>
    <!-- /.container -->
</nav>

<div class="jumbotron container">
    <h1>Technology for development Assignment</h1><br />
    <h3>by Asingwire Cuthbert</h3>
</div>

<div class="section">

    <div class="container">

        <div class="row-fluid">
            <div class="col-lg-4 col-md-3">
                <h3><i class="fa fa-folder-open"></i> Create To-Do Item</h3>
                <p>Uses the POST super global to create new to-do items in the database. Url: <code>http://52.25.214.227/tech4dev/addtolist.php?todo_name={to-do-item-name--goes-here}</code> </p>
            </div>
            <div class="col-lg-4 col-md-3">
                <h3><i class="fa fa-pencil"></i> Edit To-Do Item</h3>
                <p>Uses the PUT custom method to edit existing to-do items in the database. Url: <code>http://52.25.214.227/tech4dev/deletetodolist.php?list_item={to-do-item-id-goes-here}</code></p>
            </div>
            <div class="col-lg-4 col-md-3">
                <h3><i class="fa fa-eye"></i> Show To-Do Item</h3>
                <p>Uses the GET super global to view a single or multiple items in the database. Url for single item: Url: <code>http://52.25.214.227/tech4dev/gettodolist.php?list_item={to-do-item-id-goes-here}</code>. Url for all items: Url: <code>http://52.25.214.227/tech4dev/gettodolist.php</code></p>
            </div>
            <div class="col-lg-4 col-md-3">
                <h3><i class="fa fa-trash"></i> Delete To-Do Item</h3>
                <p>Uses the DELETE super global to delete an item from the database. Url: <code>http://52.25.214.227/tech4dev/deletetodolist.php{to-do-item-id-goes-her}</code></p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

</div>
<!-- /.section -->

<div class="container">

    <hr>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Cuthbert 2016</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- JavaScript -->
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/modern-business.js"></script>

</body>

</html>
