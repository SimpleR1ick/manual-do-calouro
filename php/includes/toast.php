<?php 
if (isset($_SESSION['toast'])) : ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">AVISO</strong>
            </div>
            <div class="toast-body">
                <?php echo $_SESSION['toast']; ?>
            </div>
        </div>
    </div>
<?php
endif;

unset($_SESSION['toast']);
?>