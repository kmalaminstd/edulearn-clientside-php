<?php

    require './functions/teacher_courses.php';

    // print_r($data['data']['data']);

?>

<section class="uploaded-courses">
                <h2 class="section-title">My Uploaded Courses</h2>
                
                <div class="courses-grid">

                    <?php

                        if(!$data || $data['data']){
                            echo "<h4>There is not data</h4>";
                            exit;
                        }

                        foreach($data['data']['data'] as $elm){

                            echo "
                            
                                <div class='course-card'>
                                    <div class='course-thumbnail'>
                                        <img src='" . $elm['thumbnail_url'] ."' alt='Course'>
                                        <span class='course-category'>". $elm['category'] ."</span>
                                        <span class='price-badge'> " . ($elm['price'] !== '0.00' ? '$' . $elm['price'] : 'Free') ." </span>
                                    </div>
                                    <div class='course-info'>
                                        <h3> ". $elm['title'] ." </h3>
                                        <div class='course-stats'>
                                            <!-- <span><i class='fas fa-users'></i> 245 Students</span>
                                            <span><i class='fas fa-star'></i> 4.8</span> -->
                                        </div>
                                        <div class='course-status'>
                                            <span class='status-badge active'>Active</span>
                                        </div>
                                        <div class='course-actions'>
                                            <a class='action-btn view' href='./my-course-info.php?id=".$elm['id']. "&tid=" .$_SESSION['user_id'] ."'>
                                                <i class='fas fa-eye'></i> View
                                            </a>
                                            <button class='action-btn edit'>
                                                <i class='fas fa-edit'></i> Edit
                                            </button>
                                            <button class='action-btn delete'>
                                                <i class='fas fa-trash'></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            ";

                        }

                    ?>

                    

                </div>
            </section>
        </div>

    </div>
