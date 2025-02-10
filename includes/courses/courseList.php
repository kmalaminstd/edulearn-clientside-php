<?php

    require './functions/courses/userShowedCourse.php';

    $total_number_of_course;

?>

<main class="courses-content">
            <div class="courses-header">
                <h1>All Courses</h1>
                <select class="sort-select">
                    <option>Most Popular</option>
                    <option>Newest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
            </div>

            <div class="courses-grid">
                <!-- Free Course Card -->
                 <?php

                    if(!$data || !$data['data']){
                        echo "<h4>There is not data</h4>";
                        exit;
                    }

                    foreach($data['data'] as $elm){

                        $dateString = new DateTime($elm['publish_time']);

                        $total_number_of_course = $elm['total_course'];

                        echo "
                        
                            <div class='course-card'>
                                <div class='course-thumbnail'>
                                    <img src='{$elm['thumbnail_url']}'>
                                    
                                    <span class='course-badge free'> <del>$ {$elm['price']}</del>  </span>
                                    
                                </div>
                                <div class='course-content'>
                                    <h3>{$elm['title']}</h3>
                                    <p class='instructor'>By {$elm['username']}</p>
                                    <div class='course-meta'>
                                        <span><i class='fas fa-user'></i> 12k students</span>
                                    </div>
                                    <p class='course-published-date'>Published : {$dateString->format('M d, Y')}</p>
                                    <form method='POST' action='./functions/courses/courseEnroll.php'>
                                        <input name='course_id' value='{$elm['course_id']}' hidden>
                                        <button name='course_enroll_btn'  type='submit' class='enroll-btn'>Enroll Now</button>
                                    </form>
                                </div>
                            </div>
                        ";
                    };
                 ?>

               
                <!-- Paid Course Card -->
                 <!--
                <div class="course-card">
                    <div class="course-thumbnail">
                        <img src="./image/download (1).png" alt="Course">
                        <span class="course-badge paid">$49.99</span>
                    </div>
                    <div class="course-content">
                        <h3>Advanced JavaScript Course</h3>
                        <p class="instructor">By Mike Wilson</p> -->
                        <!-- <div class="course-meta">
                            <span><i class="fas fa-star"></i> 4.9 (1.8k)</span>
                            <span><i class="fas fa-user"></i> 12k students</span>
                        </div> -->
                        <!-- <button class="enroll-btn">Buy Now</button>
                    </div>
                </div> --->

                
            </div>

            <?php

                $frn = ceil($total_number_of_course / 10); 

                $page_number = isset($_GET['page']) ? $_GET['page'] : 1;   

                $i = 1;

            ?>
            

            <div class="cl-pagination">
                
                    <?php
                        echo
                        " 
                          <a href='?page=" . ($i == 1 ? $i=1 : "?page=" . ($i - 1)) . "' class='cl-page-btn cl-prev'>
                            <i class=\"fas fa-chevron-left\"></i>
                          </a>
                        ";
                    ?>
                    
               
                <div class='cl-page-numbers'>

                    <?php
                        while($i < $frn+1){

                            echo "<a href='?page=". $i ."' class='cl-page-btn " . ($page_number == $i ? "cl-active" : "") . "'>$i</a>";

                            $i++;
                        }
                        
                    ?>
                    

                </div>
                <?php

                echo "
                    <a href='" . ($page_number == $frn ? "?page=" . $frn : "?page=" .($page_number+1)) . " ' class='cl-page-btn cl-next'>
                        <i class=\"fas fa-chevron-right\"></i>
                    </a>
                ";

                ?>
                
            </div>

            
            
        </main>
        
    </div>

    
