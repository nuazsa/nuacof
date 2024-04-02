<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin/root.css">
    <link rel="stylesheet" href="/css/admin/signin.css">
    <title><?= $model['title']; ?></title>
</head>

<body>
    <section>
        <div class="col">
            <h3>Welcome to Admins pages</h3>
            <h1>NUACOF JUNCTION</h1>
            <img src="/images/ad-login.svg" alt="">
        </div>
        <div class="col">
            <div class="container">
                <h2><?= $model['title']; ?></h2>
                <hr>
                <!-- Form for the signin and signup process -->
                <form action="" method="post">
                    <!-- Display error message if any -->
                    <?php if (!empty($model['error'])) : ?>
                        <p style="color: red;"><?= $model['error']; ?></p>
                    <?php endif; ?>

                    <!-- Email and password inputs -->
                    <input type="email" id="email" name="email" placeholder="Input your email">
                    <input type="password" id="password" name="password" placeholder="Input your password">
                    
                    <!-- Include signup form if the title is "SignUp" -->
                    <?php if (isset($model['title']) && $model['title'] == "SignUp") : ?>
                        <?php require __DIR__ . '/component/signup.php'; ?>
                    <?php endif; ?>

                    <!-- Display terms and conditions -->
                    <p>By tapping "<?= $model['title']; ?>" you agree to our <a href="">Terms of Use</a> and <a href="">Privacy Policy</a></p>

                    <!-- Submit button -->
                    <button name="submit"><?= $model['title']; ?></button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>