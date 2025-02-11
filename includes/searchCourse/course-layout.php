<?php
    
    if(isset($_POST['search-box-btn'])){
        $searchText = $_POST['searchText'];
        header("Location: ./search-course.php?page=1&courseText=" . $searchText);
        exit;
    }

    require './functions/search_course/search_course_by_title.php';

?>

<div class="sr-wrapper">
    <div class="sr-header">
        <div class="sr-search-box">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <input type="text" 
                   class="sr-search-input" 
                   name="searchText"
                   placeholder="Search courses..."
                   value="<?php echo htmlspecialchars($_GET['courseText'] ?? ''); ?>">
                <button name="search-box-btn" class="sr-search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        
        <!--
        <div class="sr-filters">
            <select class="sr-filter">
                <option value="">Category</option>
                <option value="web">Web Development</option>
                <option value="mobile">Mobile Development</option>
            </select>
            <select class="sr-filter">
                <option value="">Price Range</option>
                <option value="free">Free</option>
                <option value="paid">Paid</option>
            </select>
            <select class="sr-sort">
                <option value="">Sort By</option>
                <option value="popular">Most Popular</option>
                <option value="newest">Newest First</option>
            </select>
        </div>
        -->
    </div>

    <div class="sr-results">
        <div class="sr-count">
            <span><?php echo count($sCourseData['data']) ?> results found for "<?php echo isset($_GET['courseText']) ? $_GET['courseText'] : 'Inavlid text' ?>"</span>
        </div>

        <div class="sr-grid">
            <!-- Course Card -->

            <?php

                foreach ($sCourseData['data'] as $elm) {

                    $date = new DateTime($elm['course_publish_date']);

                    echo "
                        <div class='sr-card'>
                            <div class='sr-card-thumb'>
                                <img src='{$elm['thumbnail_url']}' alt='Course'>
                                <span class='sr-price'><del>$ ". $elm['price'] ."</del></span>
                            </div>
                            <div class='sr-card-body'>
                                <span class='sr-category'>". ucfirst($elm['category']) ."</span>
                                <h3>". ucfirst($elm['course_title']) ."</h3>
                                <p class='sr-instructor'>By ". ucfirst($elm['author_name']) ."</p>
                                <div class='sr-meta'>
                                    <p>Published: ". $date->format('M d, Y') ." </p>
                                </div>
                                <button class='sr-enroll-btn'>Enroll Now</button>
                            </div>
                        </div>
                    ";
                }

            ?>
            
        </div>
    </div>
</div>
