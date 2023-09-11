<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Clone</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>   
    <aside class="sidebar">        
        <div class="profile">
            <img src="/img/instagram.png" alt="IG Logo">            
        </div>
        <nav>
            <ul>
            <li class="nav-item">
            <a href="#">
                <img src="/img/home.png" alt="Home Logo" class="nav-icon">
                <span class="nav-text">Home</span>
</a>
            </li>           
            </ul>
        </nav>
    </aside>
   
    <main>
   
</main>



    <div class="right-user-profile">
    <div class="container">
        <div class="user-img-container">
            <img src="/img/default.svg" alt="User Logo" class="user-img">
        </div>
        <div class="user-text">
        <p class="username">apolo.6</p>
            <div class="user-info">
                <span class="full-name">Mr. Apolo</span>
                <a href="#" class="switch-link">Switch</a>
            </div>
        
        </div>
        <button id="openModalButton" class="create_post">
            Create new post
        </button>
    </div>
</div>   

<div id="postModal" class="modal">
    <button id="closeModalButton" class="close-button">&times;</button>
    <button id="cancel_cross" class="close-button" style="display: none;">&times;</button>
    <div class="modal-content">  
    <div class="header">
            <img src="/img/arrow_back.svg" alt="arrow back" class="back-arrow" style="display: none;" id="cancel">
            <div class="modal-title">
                Create new post
            </div>
            <p class="share-text" style="display: none;" id="share_story">Share</p>            
        </div>
        <hr class="title-line">
        <br>
        <br>
        <div id="dropArea" class="drop-area">
            <img src="/img/image.png" alt="gallery" style="width: 96px; height: 77px;">            
            <p>Drag photos here</p>
            <input type="file" id="uploadFile" accept="image/*" multiple style="display: none;">
        </div>                  
        <div class="button-container">
            <button id="selectFromComputer">Select from computer</button>
        </div>
        <div id="imageAndCaption" style="display: none;">            
            <table>
                <tr>
                    <td>
                        <div class="image-container">
                            <img id="selectedImage" src="#" alt="Selected Image" style="max-width: 200px; max-height: 200px;">
                        </div>
                    </td>
                    <td>
                    <div class="useraccount-position">
            <div class="user-img-story">
                <img src="/img/default.svg" alt="User Logo" class="user-img">
            </div>
            <p class="username">apolo.6</p>
        </div>
                        <input type="text" id="captionInput" class="captionText" placeholder="Write a caption...">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id="discardModal" class="modal" style="display: none;">
    <div class="modal-content-discard">
        <p class="discard-text">Discard a post?</p>
        <p class="discard-info">If you leave, your edits won't be saved.</p>
        <hr class="discard-divider">
        <p class="discard-button" id="discardButton">Discard</p>
        <hr class="discard-divider">
        <p class="cancel-discard-button" id="cancelDiscardButton">Cancel</p>
    </div>
</div>

<div id="postSharedModal" class="modal" style="display: none;">
    <button id="closeModalButtonShared" class="close-button">&times;</button>
    <div class="modal-content-shared">       
        <div class="modal-title">
            Post Shared
            <hr class="title-line">
        </div>
        <br>
        <br>
        <br>
        <br>
        <img src="/img/ig_logo_checklist.png" alt="checklist_logo" style="width: 96px; height: 96px;">  
        <p class="notification-text">Your post has been shared</p>
    </div>
</div>


    <footer class="right-footer">
        <div class="container">
        <p class="footer-text">&copy; 2023 Instagram Clone</p>
        </div>
    </footer>
   <script>  
function toggleLike(button) {
    const likeButton = button.querySelector('.like-button');
    
    if (likeButton.src.includes('heart_clicked.png')) {
        likeButton.src = '/img/heart.png';
    } else {
        likeButton.src = '/img/heart_clicked.png';
    }
    button.classList.toggle('clicked');
   
    setTimeout(() => {
        button.classList.remove('clicked');
    }, 200);
}

const shareButton = document.getElementById('share_story');
shareButton.addEventListener('click', () => {     
    imageAndCaption.style.display = 'none';
    cancel.style.display = 'none';
    cancel_cross.style.display = 'none';
    share_story.style.display = 'none';
    closeModalButton.style.display = 'block';
    dropArea.style.display = 'block';
    selectButton.style.display = 'block'; 
    selectButton.classList.add('centered-button');
    postModal.style.display = 'none';
    createNewPost();
});

function createNewPost() {        
    const captionText = captionInput.value;

    const imageSource = selectedImage.src;

    const postContainer = document.createElement('div');
    postContainer.classList.add('container');
    
    const userTextName = document.createElement('div');
    userTextName.classList.add('user-text-name');

    const userImgShape = document.createElement('div');
    userImgShape.classList.add('user-img-shape');

    const userImg = document.createElement('img');
    userImg.src = '/img/default.svg';
    userImg.alt = 'User Logo';
    userImg.classList.add('user-img');

    userImgShape.appendChild(userImg);

    const username = document.createElement('p');
    username.classList.add('username');
    
    function updateFormattedTime() {
    const currentTime = new Date();
    const timeDifference = Math.floor((currentTime - startTime) / 1000); // Time difference in seconds

    if (timeDifference < 60) {      
        formattedTime = 'a few seconds ago';
    } else if (timeDifference < 3600) {      
        const minutesAgo = Math.floor(timeDifference / 60);
        formattedTime = `${minutesAgo} minute${minutesAgo > 1 ? 's' : ''} ago`;
    } else if (timeDifference < 86400) {       
        const hoursAgo = Math.floor(timeDifference / 3600);
        formattedTime = `${hoursAgo} hour${hoursAgo > 1 ? 's' : ''} ago`;
    } else {      
        const daysAgo = Math.floor(timeDifference / 86400);
        formattedTime = `${daysAgo} day${daysAgo > 1 ? 's' : ''} ago`;
    }
   
    username.innerHTML = `apolo.6 <span class="muted-dot">•</span> ${formattedTime}`;
}

let formattedTime = 'a few seconds ago';
const startTime = new Date();

updateFormattedTime();

setInterval(updateFormattedTime, 1000);

    userTextName.appendChild(userImgShape);
    userTextName.appendChild(username);

    const post = document.createElement('div');
    post.classList.add('post');

    const postImage = document.createElement('img');
    postImage.src = imageSource;
    postImage.alt = 'Post Image';
    postImage.classList.add('post-image');
    postImage.style.width = '468px';
    postImage.style.height = '468px';
    post.appendChild(postImage);

    const likeButton = document.createElement('button');
    likeButton.classList.add('like-button');
    likeButton.onclick = toggleLike;
    likeButton.setAttribute('onclick', 'toggleLike(this)');

    const likeImage = document.createElement('img');
    likeImage.src = '/img/heart.png';
    likeImage.alt = 'Like';
    likeImage.classList.add('like-button');

    likeButton.appendChild(likeImage);

    const caption = document.createElement('div');
    caption.classList.add('caption');
    caption.innerHTML = '<b>apolo.6</b> ' + captionText;
    const hrElement = document.createElement('hr');
    hrElement.style.width = '468px';
    hrElement.style.marginLeft = '46px';

    postContainer.appendChild(userTextName);
    postContainer.appendChild(post);
    postContainer.appendChild(likeButton);
    postContainer.appendChild(caption);
    
    postContainer.appendChild(hrElement);
    const mainContent = document.querySelector('main');
    mainContent.insertBefore(postContainer, mainContent.firstChild);
    captionInput.value = '';    
    showPostSharedModal();
}

function showPostSharedModal() {   
    postSharedModal.style.display = 'block';
}

const postModal = document.getElementById('postModal');
const postSharedModal = document.getElementById('postSharedModal');
const openModalButton = document.getElementById('openModalButton');
const closeModalButton = document.getElementById('closeModalButton');
const closeModalButtonShared = document.getElementById('closeModalButtonShared');
const imageAndCaption = document.getElementById('imageAndCaption');
const selectedImage = document.getElementById('selectedImage');
const captionInput = document.getElementById('captionInput');
const discardModal = document.getElementById('discardModal');
const discardButton = document.getElementById('discardButton');
const cancelDiscardButton = document.getElementById('cancelDiscardButton');
const selectButton = document.getElementById('selectFromComputer');
const cancel = document.getElementById('cancel');
const cancel_cross = document.getElementById('cancel_cross');
const share_story = document.getElementById('share_story');
function openModal() {
    postModal.style.display = 'block';
}


openModalButton.addEventListener('click', openModal);
closeModalButton.addEventListener('click', () => {   
    postModal.style.display = 'none';    
});

closeModalButtonShared.addEventListener('click', () => {   
    postSharedModal.style.display = 'none';
});
cancel.addEventListener('click', () => {   
    discardModal.style.display = 'block';
});

cancel_cross.addEventListener('click', () => {   
    discardModal.style.display = 'block';
});

discardButton.addEventListener('click', () => {  
    discardModal.style.display = 'none';
    imageAndCaption.style.display = 'none';
    cancel.style.display = 'none';
    cancel_cross.style.display = 'none';
    share_story.style.display = 'none';
    closeModalButton.style.display = 'block';
    dropArea.style.display = 'block';
    selectButton.style.display = 'block';
    selectedImage.src = "";    
    selectButton.classList.add('centered-button');
});

cancelDiscardButton.addEventListener('click', () => {   
    discardModal.style.display = 'none';
});

const dropArea = document.getElementById('dropArea');

dropArea.addEventListener('dragenter', preventDefaults, false);
dropArea.addEventListener('dragover', preventDefaults, false);
dropArea.addEventListener('dragleave', preventDefaults, false);

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

dropArea.addEventListener('drop', function (e) {
    e.preventDefault();
    const dt = e.dataTransfer;
    const files = dt.files;

    handleFiles(files);
});

function handleFiles(files) {
    for (const file of files) {
        if (file.type.startsWith('image/')) {     
            const reader = new FileReader();
            reader.onload = function (event) {            
                const selectButton = document.getElementById('selectFromComputer');
                if (selectButton) {                   
                    selectButton.style.display = 'none';                                  
                    imageAndCaption.style.display = 'block';
                    cancel.style.display = 'block';
                    cancel_cross.style.display = 'block';
                    share_story.style.display = 'block';
                    selectedImage.src = event.target.result;
                    dropArea.style.display = 'none';  
                    closeModalButton.style.display = 'none';                       
                }
            };
            reader.readAsDataURL(file);
        }
    }
}

const fileInput = document.getElementById('uploadFile');

selectButton.addEventListener('click', () => {
    fileInput.click();
});

function displaySelectedImage(file) {
    const reader = new FileReader();

    reader.onload = function(event) {
        selectedImage.src = event.target.result;
        imageAndCaption.style.display = 'block';
        cancel.style.display = 'block';
        cancel_cross.style.display = 'block';
        share_story.style.display = 'block';
        dropArea.style.display = 'none';
        selectButton.style.display = 'none';
        closeModalButton.style.display = 'none';         
    };

    reader.readAsDataURL(file);
}

fileInput.addEventListener('change', function() {
    const files = this.files;

    if (files.length > 0) {
        const file = files[0];
        displaySelectedImage(file);
    }
});
</script>
</body>
</html>