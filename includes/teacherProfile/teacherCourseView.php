<?php

    require './functions/teacherFuncs/teacher-single-course.php';

?>

<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>


<div class="course-view-container">
    <div class="course-header">
        <div class="breadcrumb">
            <a href="./dashboard.php">Dashboard</a> / <span>Course View</span>
        </div>
        <div class="header-actions">
            <button class="edit-btn"><i class="fas fa-edit"></i> Edit Course</button>
            <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
        </div>
    </div>

    <div class="course-content">
        <div class="video-section">
            <div class="video-container">
                <!-- <video controls poster="<?php echo $data['data']['thumbnail_url'] ?>">
                    <source src="<?php echo $data['data']['video_url'] ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video> -->

                <video id="player" playsinline controls data-poster="<?php echo $data['data']['thumbnail_url'] ?>">
                    <source src="<?php echo $data['data']['video_url'] ?>" type="video/mp4" />

                    <!-- Captions are optional -->
                    <!-- <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default /> -->
                </video>
            </div>
        </div>

        <div class="course-info">
            <h1 class="course-title"><?php echo $data['data']['title'] ?></h1>
            
            <div class="course-stats">
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <span>1,234 Students</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-star"></i>
                    <span>4.8 Rating</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-clock"></i>
                    <span>12 Hours</span>
                </div>
            </div>

            <div class="course-meta">
                <div class="meta-item">
                    <label>Category:</label>
                    <span><?php echo $data['data']['category'] ?></span>
                </div>
                <div class="meta-item">
                    <label>Price:</label>
                    <span>$<?php echo $data['data']['price'] ?></span>
                </div>
                <div class="meta-item">
                    <label>Last Updated:</label>
                    <span><?php $date = new DateTime($data['data']['created_at']);
                        echo $date->format('l, F j, Y');
                    ?></span>
                </div>
            </div>

            <div class="course-description">
                <h2>Course Description</h2>
                <p><?php echo $data['data']['description'] ?></p>
            </div>

            <div class="course-curriculum">
                <h2>Course Content</h2>
                <div class="curriculum-item">
                    <!-- <div class="chapter">
                        <i class="fas fa-play-circle"></i>
                        <span>Introduction to HTML</span>
                        <span class="duration">15:30</span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    const player = new Plyr('#player');
    

</script>