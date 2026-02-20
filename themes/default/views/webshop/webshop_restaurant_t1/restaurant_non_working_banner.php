<?php if (!empty($this->data['restaurant_is_active']['show_banner'])) { ?>

<div class="d-flex justify-content-center align-items-center 
<?php
$is_holiday = $this->data['restaurant_is_active']['is_holiday'];
$is_working = $this->data['restaurant_is_active']['is_working'];
$info_text = $this->data['restaurant_is_active']['info_text'];
$show_banner = $this->data['restaurant_is_active']['show_banner'];
// var_dump($this->data['restaurant_is_active'])  ;
// echo ($is_holiday == "Yes" ? 'restaurantOpen' : 'restaurantClosed'); 
echo ($show_banner == "true" ? 'restaurantOpen' : ('restaurantClosed'));
?>">
    <?php echo ($is_working == "false" && $is_holiday == "No") ? '<img src="' . $assets . 'restaurant/img/closed-image.png" class="close-img"/>' : ""; ?>
    <span style="color:black" class="close-text">
        <?php echo $info_text ?>
    </span>
    <!-- <?php echo $info_text ? '<span style="color:black" class="close-text">' . $info_text . '</span>' : ""; ?> -->
</div>

<?php  } ?>