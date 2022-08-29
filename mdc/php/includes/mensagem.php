<?php
session_start()?>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toastDelete" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">AVISO</strong>
                <small>DELETE<small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                    if (isset($_SESSION['toast'])) {
                        echo $_SESSION['toast']; 
                    }
                ?>
            </div>
        </div>
    </div>
</div>