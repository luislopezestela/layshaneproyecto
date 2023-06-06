<div class="wo_ad_header_format list-group-offer sidebar-ad-wrapper-offer pointer rads-<?php echo $wo['sidebar-ad']['bidding']; ?>" id="<?php echo $wo['sidebar-ad']['id']; ?>">
    <div class="sidebar-ad-header-offer sidebar-title-back-offer sponsored"><?php echo $wo['lang']['sponsored'] ?></div>
    <div class="sidebar-ad-body-offer imgs">
        <img src="<?php echo $wo['sidebar-ad']['ad_media']; ?>" alt="Picture">
    </div>
    <div class="sidebar-ad-footer-offer details">
        <p class="ad-title-offer">
            <?php echo $wo['sidebar-ad']['headline']; ?>
        </p>
        <p class="small ad-descrition-offer ">
            <?php echo $wo['sidebar-ad']['description']; ?>
        </p>
        <time>
            <a href="<?php  echo $wo['sidebar-ad']['url'];?>" class="main-offer" target="_blank">
                <?php echo lui_UrlDomain($wo['sidebar-ad']['url']); ?>
            </a>
        </time>
    </div>
</div>