<?php
\Core\View::render('blocks/header', ['pageTitle' => 'Registration']);
$errors = $errors ?? [];
?>

    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form class="card mt-5" method="post" action="<?= url('auth/signup') ?>">
                    <div class="card-header">
                        <h3>Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?= $fields['name'] ?? '' ?>" placeholder="Your name">
                        </div>

                        <?= showInputError('name_error', $errors); ?>

                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname"
                                   value="<?= $fields['surname'] ?? '' ?>"
                                   placeholder="Your surname">
                        </div>

                        <?= showInputError('surname_error', $errors); ?>

                        <div class="mb-3">
                            <label for="nickname" class="form-label">Nickname</label>
                            <input type="text" class="form-control" id="nickname" name="user_nm"
                                   value="<?= $fields['user_nm'] ?? '' ?>"
                                   placeholder="Your nickname">
                        </div>

                        <?= showInputError('user_nm_error', $errors); ?>

                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail"
                                   aria-describedby="emailHelp" name="email" value="<?= $fields['email'] ?? '' ?>"
                                   placeholder="Your email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
<!--                        --><?php //= showInputError('email_error', $errors); ?>

                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword" name="password">
                        </div>
                        <?= showInputError('password_error', $errors); ?>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create an account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
\Core\View::render('blocks/footer');