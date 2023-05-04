<?php include_once("_header.php") ?>

<div class="container my-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="get.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="description" id="description"></textarea>
                            </div>

                            <input type="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            <div class="col-2"></div>
        </div>
</body>
</html>