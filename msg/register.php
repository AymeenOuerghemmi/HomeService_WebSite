<?php if (isset($_GET['msg'])): ?>
    <div class="container" style="margin-top: 30px">

        <?php $msg = htmlspecialchars($_GET['msg']); ?>

        <?php if ($msg === 'success'): ?>
            <div class="alert alert-success">
                <h4>Registering</h4>
                <p>Service provider registered.</p>
            </div>

        <?php elseif ($msg === 'failed'): ?>
            <div class="alert alert-danger">
                <h4>Failed</h4>
                <p>Problem while Registering! Please try again later!</p>
            </div>

        <?php elseif ($msg === 'file'): ?>
            <div class="alert alert-danger">
                <h4>Problem While Uploading Photo</h4>
                <p>Problem while Uploading Photo! Please Try again later!</p>
            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>
