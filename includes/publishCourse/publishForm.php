<?php

    require './functions/publishcourse/categoryList.php';


?>


<div class="publish-container">
        <div class="publish-wrapper">
            <h1>Create New Course</h1>
            <p class="form-subtitle">Fill in the details to publish your course</p>
            
            <form class="publish-form" enctype="multipart/form-data" method="POST" action="./functions/publishCourse/publishCourse.php">
                <div class="form-section">
                    <h2>Basic Information</h2>
                    <div class="form-group">
                        <label for="course-title">Course Title</label>
                        <input name="title" type="text" id="course-title" placeholder="Enter course title" required>
                    </div>
    
                    <div class="form-group">
                        <label for="course-description">Course Description</label>
                        <textarea name="description" id="course-description" rows="4" 
                            placeholder="Describe what students will learn" required></textarea>
                    </div>
    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="course-category">Category</label>
                            <select name="category" id="course-category" required>
                                <option value='' disabled selected>Select category</option>
                                <?php


                                // print_r($category);
                                    foreach($catList['data'] as $data){

                                        echo "
                                        <option value='{$data['category_name']}'>{$data['category_name']}</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
    
                        
    
                    </div>
                </div>
                <div class="form-group price-input" id="price-field">
                    <label for="course-price">Price ($)</label>
                    <input name="price" value="0" type="number" id="course-price" min="0" step="0.01">
                </div>
    
                <div class="form-section">
                    <h2>Course Media</h2>
                    <div class="form-group">
                        <label>Course Thumbnail</label>
                        <div class="upload-area thumbnail-upload">
                            <img id="thumbnail-preview" src="./assets/placeholder.png" alt="Preview">
                            <div class="upload-content">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Drag & drop thumbnail or</p>
                                <label class="course-upload-btn">
                                    Browse File
                                    <input name="image" type="file" id="thumbnail-upload" accept="image/*" hidden required>
                                </label>
                                <p class="file-hint">Recommended: 1280x720px, Max 2MB</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label>Course Video</label>
                        <div class="upload-area video-upload">
                            <div class="upload-content">
                                <i class="fas fa-video"></i>
                                <p>Drag & drop video or</p>
                                <label class="course-upload-btn">
                                    Browse Video
                                    <input name="video" type="file" id="video-upload" accept="video/*" hidden required>
                                </label>
                                <p class="file-hint">Maximum file size: 1GB</p>
                            </div>
                            <div class="upload-progress" hidden>
                                <div class="progress-bar">
                                    <div class="progress"></div>
                                </div>
                                <span class="progress-text">Uploading... 0%</span>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="form-actions">
                    
                    <button type="submit" name="submit" class="btn-primary">Publish Course</button>
                </div>
            </form>
        </div>
    </div>
