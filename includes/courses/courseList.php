<?php

    require './functions/courses/userShowedCourse.php';

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
                    foreach($data->data as $elm){

                        $dateString = new DateTime($elm->publish_time);

                        echo "
                        
                            <div class='course-card'>
                                <div class='course-thumbnail'>
                                    <img src='{$elm->thumbnail_url}'>
                                    
                                    <span class='course-badge free'> <del>$ {$elm->price}</del>  </span>
                                    
                                </div>
                                <div class='course-content'>
                                    <h3>{$elm->title}</h3>
                                    <p class='instructor'>By {$elm->username}</p>
                                    <div class='course-meta'>
                                        <span><i class='fas fa-user'></i> 12k students</span>
                                    </div>
                                    <p class='course-published-date'>Published : {$dateString->format('M d, Y')}</p>
                                    <form method='POST' action='./functions/courses/courseEnroll.php'>
                                        <input name='course_id' value='{$elm->course_id}' hidden>
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

            <div class="cl-pagination">
                <button class="cl-page-btn cl-prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="cl-page-numbers">
                    <button class="cl-page-btn cl-active">1</button>
                    <button class="cl-page-btn">2</button>
                    <button class="cl-page-btn">3</button>
                    <span class="cl-dots">...</span>
                    <button class="cl-page-btn">10</button>
                </div>
                <button class="cl-page-btn cl-next">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </main>
        
    </div>

    