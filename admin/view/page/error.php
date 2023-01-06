<div id="alert">
    <?php if (isset($this->data['message'])) { ?>
        <div class="alert-page-error">
            <strong>404 <?php echo $this->data['message'] ?></strong>
        </div>
    <?php } ?>
</div>