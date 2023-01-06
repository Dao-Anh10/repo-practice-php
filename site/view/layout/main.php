<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Task List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php $baseUrl = $this->getBaseUrl() ?>
    <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>/site/public/css/global.css">
    <script src="<?= $baseUrl ?>/site/public/js/global.js"></script>
    <?php if (isset($this->template['css'])) { ?>
        <link rel="stylesheet" type="text/css" href="<?= $baseUrl . '/' . $this->template['css'] ?>">
    <?php } ?>
    <?php if (isset($this->template['js'])) { ?>
        <script src="<?= $baseUrl . '/' . $this->template['js'] ?>"></script>
    <?php } ?>

</head>

<body>
    <div class="wrapper-page">
        <div class="header">
        </div>

        <div class="main">
            <div id="alert">
                <?php if (!empty($this->data['msgError'])) { ?>
                    <div class="alert-error">
                        <strong><?php echo $this->data['msgError'] ?></strong>
                    </div>
                <?php } ?>

                <?php if (!empty($this->data['msgSuccess'])) { ?>
                    <div class="alert-success">
                        <strong><?php echo $this->data['msgSuccess'] ?></strong>
                    </div>
                <?php } ?>
            </div>

            <div class="container">
                <?php $this->isreplace(); ?>
            </div>
        </div>
        <div class="footer">
        </div>

        <script>
            getBaseUrl('<?= $baseUrl ?>')
            timeoutAlert();
        </script>
    </div>

</body>

</html>