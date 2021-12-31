<!-- <form role="search" method="get" action="" class="my_search">
    <div class="input-group">
        <input type="text" name="search" id="search" class="form-control" placeholder="بنویس چی میخوای؟" value="">
        <span class="input-group-btn">
            <button class="btn btn-default" name="search" type="submit"><i class="fa fa-search"></i></button>
        </span>
    </div>

</form> -->


<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url('/')); ?>">
    <div class="form-group">
        <div class="input-group">
            <label class="screen-reader-text" for="search">جستجو برای:</label>
            <input type="text" class="form-control" placeholder="بنویس چی میخوای؟" value="<?php the_search_query() ?>" name="s" id="s" />
            <input type="submit" class="btn btn-danger" name="sa" id="sa" value="جستجو" />
        </div>
    </div>
</form>