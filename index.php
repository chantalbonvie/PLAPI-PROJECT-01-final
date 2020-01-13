<?php
require_once("conn.php");

function __($input){
    return htmlspecialchars($input, ENT_QUOTES);
}
?>
<!doctype html>
<html lang="en":>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/styles.css">
<link href="https://fonts.googleapis.com/css?family=PT+Serif&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/8751f449d0.js" crossorigin="anonymous"></script>

</head>
<body>
<header>
</header>
<div class="container">
<h3>Collectable Cars - Dynamic Checklist</h3>

<div class="row">
    <div class="col-md-12">
        <form class="input-group" id="search-form">
            <div class="input-group-prepend">
            <select class="custom-select" id="year-select">
                <option selected value="0">Year</option>
                <?php
                //for(i = *; i < *; i++);
                //foreach (array as single);
                //while ( while this statement is true);
            // so since just counting from 1956 to current we selected to make for statement
            
                for($i = 1956; $i <= intval(date("Y")); $i++) {
                        echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            </div>
            <span class="input-group-text">Search</span>
            <input type="search" name="search" placeholder="Enter Car Model"
            clas="form-control" id="search-model">

            <input type="search" name="search" placeholder="Enter Car Nickname"
            clas="form-control" id="search-nickname">

                <div class="input-group-append">
                <button class="btn form-control" type="submit">
                <i class="fas fa-car-side"></i></button>
                </div>
        </form>
    </div>
</div>

<table class="table">

<thead class="mainsearch">
    <th>Make</th>
    <th>Model</th>
    <th>Year</th>
    <th>Nickname</th>
    <th>Action</th>
</thead>
<tbody id="search-results">
 
</tbody>
</table>
</div>


<div class="modal fade" id="deleteCarAlert" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
        Are you sure you want to delete this car?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" data-action="confirm-delete">Delete</button>
      </div>
    </div>
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script src="assets/js/scripts.js"></script>


</body>
</html>
