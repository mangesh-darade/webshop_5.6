<style>
    .modal-responsive {
    max-width: 60vw;
    margin: 1.75rem auto;
}

.custom-modal-content {
    border-radius: 8px;
}


/* Responsive adjustments for mobile */
@media (max-width: 768px) {
    .modal-responsive {
        max-width: 95vw;
    }

    .custom-about-content {
        padding: 1rem !important;
    }

    .modal-body {
        padding: 1rem;
    }

    .modal-header,
    .modal-footer {
        padding: 0.75rem 1rem;
    }
}

</style>
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-responsive">
        <div class="modal-content custom-modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body col-md-12 col-lg-12">
                    <div class="container-fluid">
                        <div class="row flex-row-reverse py-3">
                                <div class="about-content px-3 px-md-5 py-4 custom-about-content">
                                    <p class="about-text">
                                        <?= isset($terms_and_conditions->page_text) ? $terms_and_conditions->page_text : '' ?>
                                    </p>
                                </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
