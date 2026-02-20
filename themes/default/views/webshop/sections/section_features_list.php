<div class="features-list">
    <?= $is_admin_login ? ' <big title="Section Settings">Features Setting <a href="'.base_url("webshop_settings/elements/section_features_list").'" target="new" ><i class="fa fa-cog text-info"></i></a></big>' : ''; ?>
        
    <div class="features">
        <?php
        foreach ($features as $feature) {
        ?>
            <div class="feature">
                <div class="media">
                    <?php if($feature->icon) { ?>
                    <i class="feature-icon d-flex mr-3 <?=$feature->icon?>"></i>
                    <?php } ?>
                    <div class="media-body feature-text">
                        <h5 class="mt-0"><?=$feature->title?></h5>
                        <span><?=$feature->subtitle?></span>
                    </div>
                </div>
            </div>
            <!-- .feature -->
        <?php
        }
        ?>       
    </div>
    <!-- .features -->
</div>
<!-- /.features list -->