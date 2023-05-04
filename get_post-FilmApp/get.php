
<?php 

require("_data.php");
require("_functions.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $films = addFilm($films, $name, $description);

}

if (!empty($_GET["q"])) {
    $keyword = $_GET["q"];

    $films = array_filter($films, function($film) use ($keyword) {
        return stristr($film["name"], $keyword) || stristr($film["description"], $keyword);
    });
}

?>
<?php include_once("_header.php") ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="get.php" method="GET" class="d-flex mb-3">
                    <input type="text" name="q" class="form-control me-2">

                    <button type="submit" class="btn btn-success">Search</button>

                </form>
                <div class="my-2">
                    <small>There are <?= count($films) ?> films.</small>
                    <a href="create.php" type="submit" class="btn btn-primary mx-5">+ Add New Film</a>
                </div>
                <?php foreach ($films as $film) : ?>
                    <div class="card mb-3">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $film["name"] ?></h5>
                                        <p><?= $film["description"] . " " ?></p>
                                        <small>
                                            <span class="btn btn-primary">Time: <?= $film["time"] ?> </span>
                                            <span class="btn btn-warning">Likes: <?= $film["likes"] ?> </span>
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-2"></div>
        </div>
</body>

</html>