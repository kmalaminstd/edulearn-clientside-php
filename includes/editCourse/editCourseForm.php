<?php
    require './functions/categoriyList.php';
    
    require './functions/teacherFuncs/teacher-single-course.php';

?>

<div class="ce-container">
    <div class="ce-header">
        <h1>Edit Course</h1>
        <p>Update your course information</p>
    </div>

    <form class="ce-form" method="POST" action="./functions/courses/updateCourse.php">
        <div class="ce-form-group">
            <label for="title">Course Title</label>
            <input type="text" id="title" name="title" class="ce-input" value="<?php echo $data['data']['title'] ?>">
            <span class="ce-help-text">Make it clear and compelling</span>
        </div>



        <div class="ce-form-group">
            <label for="category">Category</label>
            <select id="category" name="category" class="ce-input">
                <?php



                    foreach($catList['data'] as $catData){

                        $selected = ($catData['category_name'] == $data['data']['category']) ? "selected" : "";

                        echo "<option value='{$catData['category_name']}' $selected>{$catData['category_name']}</option>";
                    }

                ?>
                
            </select>
        </div>

        <div class="ce-form-group">
            <label for="description">Course Description</label>
            <textarea id="description" name="description" class="ce-input ce-textarea" rows="6"><?php echo $data['data']['description'] ?></textarea>
            <span class="ce-help-text">Minimum 200 characters</span>
        </div>

        <div class="ce-form-row">
            <div class="ce-form-group">
                <label for="price">Price ($)</label>
                <input type="number" id="price" name="price" value="<?php echo $data['data']['price'] ?>" class="ce-input" min="0">
            </div>
        </div>

        <input name="course_id" hidden value="<?php echo $data['data']['id'] ?>" >

        <div class="ce-form-actions">
            <button type="button" class="ce-btn ce-btn-secondary">Cancel</button>
            <button type="submit" class="ce-btn ce-btn-primary">Save Changes</button>
        </div>
    </form>
</div>
