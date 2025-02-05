<?php

    require './functions/studentFuncs/view-course-video.php';

    // print_r($data['data']['course_id']);

?>

<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

<div class="scv-container">
    <div class="scv-header">
        <!-- <div class="scv-breadcrumb">
            <a href="./student-profile.php">My Learning</a> / <span>Course Name</span>
        </div> -->
    </div>

    <div class="scv-content">
        <div class="scv-video-wrapper">
            <div class="scv-video-container">
                <video id="scv-player" playsinline controls poster="<?php echo $data['data']['thumbnail_url'] ?>">
                    <source src="<?php echo $data['data']['video_url'] ?>" type="video/mp4">
                </video>
            </div>
            <div class="scv-video-info">
                <h2><?php echo $data['data']['title'] ?></h2>
                <p>By KM</p>
                <!--
                <div class="scv-progress-wrapper">
                    <div class="scv-progress-text">
                        <span>Progress</span>
                        <span>25% Complete</span>
                    </div>
                    <div class="scv-progress-bar">
                        <div class="scv-progress" style="width: 25%"></div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="scv-sidebar">
            <div class="scv-chapters">
                <h3>Course Details</h3>
                <div class="scv-chapter-list">
                    <div class="scv-chapter-item scv-active">
                        <div class="scv-chapter-header"> 
                            <!-- <i class="fas fa-play-circle"></i> -->
                            <span><?php echo $data['data']['description'] ?></span>
                            <!-- <span class="scv-duration">15:30</span> -->
                        </div>
                    </div>
                    <!-- <div class="scv-chapter-item scv-completed">
                        <div class="scv-chapter-header">
                            <i class="fas fa-check-circle"></i>
                            <span>Getting Started</span>
                            <span class="scv-duration">20:15</span>
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- <div class="scv-notes">
                <h3>My Notes</h3>
                <textarea placeholder="Take notes for this lesson..."></textarea>
                <button class="scv-save-btn">Save Notes</button>
            </div> -->
        </div>
    </div>
</div>

<script>

    const player = new Plyr('#scv-player');
    

</script>