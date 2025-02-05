
// const mLoginBtnElm = document.querySelector('.login-btn');
// const loginBtn = document.querySelector('.login-btn');

document.addEventListener('DOMContentLoaded', function() {
    try {
        // Select elements
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');

        // Debug element selection
        // console.log('Hamburger:', hamburger);
        // console.log('Nav Menu:', navMenu);

        // Verify elements exist
        if (!hamburger || !navMenu) {
            throw new Error('Required elements not found');
        }

        // Add click handler with debugging
        hamburger.onclick = function(e) {
            // console.log('Hamburger clicked');
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle classes
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
            
            // Debug class changes
            // console.log('Hamburger classes:', this.classList);
            // console.log('Nav menu classes:', navMenu.classList);
        };

        // Document click handler
        document.onclick = function(e) {
            if (navMenu.classList.contains('active') && 
                !hamburger.contains(e.target) && 
                !navMenu.contains(e.target)) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            }
        };

    } catch (error) {
        console.error('Navigation setup failed:', error);
    }
});

// mLoginBtnElm.addEventListener('click', ()=>{
//     document.location.href = './login.php';
// });



document.addEventListener('DOMContentLoaded', ()=>{
    
    const startLearningBtnElm = document.querySelector('.start-l-b-s');
    const startTutorBtnElm = document.querySelector('.start-i-b-s');
    
    startLearningBtnElm && startLearningBtnElm.addEventListener('click', ()=>{
        window.location.href = './register-student.php';
    })
    
    startTutorBtnElm && startTutorBtnElm.addEventListener('click', ()=>{
        window.location.href = './register-teacher.php';
    })

})