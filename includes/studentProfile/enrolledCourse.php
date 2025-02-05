<?php

    require './functions/studentFuncs/enrolledCourse.php';

    // print_r($data['data']);


?>

<section class="enrolled-courses">
                <h2 class="section-title">My Enrollment</h2>

                <div class="courses-grid">

                    <?php

                    foreach($data['data'] as $elm){

                        $datetime = new DateTime($elm['enrollment_date']);

                        echo "
                        <div class='course-card'>
                            <div class='course-thumbnail'>
                                <img src='{$elm['thumbnail_url']}' alt='Course'>
                                <span class='course-category'>{$elm['category']}</span>
                            </div>
                            <div class='course-info'>
                                <h3>{$elm['title']}</h3>
                                <p class='instructor'>By {$elm['author_name']}</p>
                                <div class='course-progress'>
                                    <!-- <div class='progress-label'>
                                        <span>Progress</span>
                                        <span>75% Complete</span>
                                    </div> -->
                                    <p>Enrolled: {$datetime->format('M d, Y')}</p>
                                    <br>
                                    <div class='progress-bar'>
                                        <div class='progress' style='width: 75%'></div>
                                    </div>
                                </div>
                                <a href='./learner-enrolled-video.php?cid={$elm['course_id']}&uid={$_SESSION['user_id']}' class='continue-btn'>Continue Learning</a>
                            </div>
                        </div>
                        ";
                    }

                    ?>

                </div>

            </section>
        </div>

    </div>