<?php

    require "./functions/categoriyList.php";
    
    // foreach($category as $elm){
    //     print_r($elm->category_name);
    // }

?>


<div class="courses-container">
        <aside class="filters-sidebar">
            <div class="search-box">
                <input type="text" placeholder="Search courses...">
                <span class="c-search-icon">
                    <i class="fas fa-search"></i>
                </span>
            </div>

            <div class="filter-group">
                <h3>Categories</h3>
                <div class="filter-options">
                    <?php

                        if(!$catList){
                            exit();
                        }

                        foreach($catList['data'] as $elm){
                            echo "<label><input type='checkbox'> {$elm['category_name']} </label>";
                        }

                    ?>
                    <!-- <label><input type="checkbox"> Web Development</label>
                    <label><input type="checkbox"> Mobile Development</label>
                    <label><input type="checkbox"> Data Science</label>
                    <label><input type="checkbox"> Design</label> -->
                </div>
            </div>

            <div class="filter-group">
                <h3>Price</h3>
                <div class="filter-options">
                    <label><input type="checkbox"> Free</label>
                    <label><input type="checkbox"> Paid</label>
                </div>
            </div>
            
            <!--
            <div class="filter-group">
                <h3>Level</h3>
                <div class="filter-options">
                    <label><input type="checkbox"> Beginner</label>
                    <label><input type="checkbox"> Intermediate</label>
                    <label><input type="checkbox"> Advanced</label>
                </div>
            </div> -->
        </aside>
