<?php
\Core\View::render('admin/blocks/header', ['pageTitle' => 'Create car']);
$errors = $errors ?? [];
?>
    <div class="container pt-3 pb-5">
        <div class="row">
            <h3>Update Car</h3>
        </div>
        <div class="row"
            <div class="col-1"></div>
            <div class="col-10">
                <form class="card mt-5" method="POST" action="<?= url("admin/cars/{$car->id}/update") ?>">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="park_id" class="form-label">Park id</label>
                            <input type="text" class="form-control" id="park_id" value="<?= $car->park_id ?>" name="park_id">
                        </div>
                        <?= showInputError('model', $errors) ?>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" value="<?= $car->model ?>" name="model">
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="text" class="form-control" id="year" value="<?= $car->year ?>" name="year">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" value="<?= $car->price ?>" name="price">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3 form-check">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php
\Core\View::render('admin/blocks/footer');
