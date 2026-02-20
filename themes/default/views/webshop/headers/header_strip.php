<div class="top-bar top-bar-v<?= $strip_color ?>">
    <div class="" style="margin-right:5%;">
        <ul id="menu-top-bar-left" class="nav menu-top-bar-right">
            <?php
            if(isset($custom_pages['header_strip']) && is_array($custom_pages['header_strip'])){
                foreach ($custom_pages['header_strip'] as $page) {
            ?>
                <?php if($page['page_type']=='text') { ?>
                    <li class="menu-item animate-dropdown"><a href="<?=base_url("webshop/page/".$page['page_key'].'/'.md5($page['id']))?>"><?=$page['page_title']?></a></li>
                <?php } elseif($page['page_type']=='file' && !empty($page['page_file'])) { ?>
                    <li class="menu-item animate-dropdown"><a href="<?=base_url("assets/mdata/$Customer_assets/uploads/webshop/pages/".$page['page_file'])?>" target="new"><?=$page['page_title']?></a></li>
                <?php } ?>

            <?php
                }//end foreach
            }//end if
            ?>
         
            <?php
                if(isset($this->session->webshop) && $this->session->webshop->is_login && $this->session->webshop->user_id) {
            ?>
            <li class="menu-item">
                <a ><i class="tm tm-login-register"></i> Welcome <?=$this->session->webshop->name;?> </a>
            </li>
            <li class="menu-item">
                <a title="Logout" href="<?= base_url('webshop/logout') ?>">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </li>
            <?php } else { ?>
            <li class="menu-item">
                <a title="My Account" href="<?= base_url('webshop/login') ?>">
                    <i class="tm tm-login-register"></i>Register or Sign in</a>
            </li>
            <?php } ?>
            <li class="menu-item float-right">
                <a title="My Cart" href="<?= base_url('webshop/cart') ?>">
                    <i class="tm tm-shopping-bag"></i>My Cart</a>
            </li>
        </ul>
        <!-- .nav -->

    </div>
    <!-- .col-full -->
</div>
