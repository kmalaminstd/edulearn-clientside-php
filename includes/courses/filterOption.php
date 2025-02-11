<?php

    require "./functions/categoriyList.php";
    
    // foreach($category as $elm){
    //     print_r($elm->category_name);
    // }

    // echo $_SERVER['PHP_SELF'];

    if(isset($_POST['searchText'])){
        $courseText = $_POST['searchText'];
        header("Location: ./search-course.php?page=1&courseText=" . $courseText);
        exit;
    }

?>


<?php
    
    

?>

<div class="courses-container">
        <aside class="filters-sidebar">

            <div class="search-box">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" name="searchText" placeholder="Search courses...">
                    <span class="c-search-icon">
                        <i class="fas fa-search"></i>
                    </span>
                </form>
                
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
